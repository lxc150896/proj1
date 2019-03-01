<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Mail;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Status;
use App\LoyalCustomer;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Repositories\Post\PostCustomersRepository;
use App\Repositories\Post\PostBillRepository;
use App\Repositories\Post\PostBillDetailRepository;
use App\Repositories\Post\PostStatusRepository;
use App\Repositories\Post\PostEloquentRepository;

class CartController extends Controller
{
    protected $postCustomers, $postBill, $postBillDetail, $postStatus, $postRepository;

    public function __construct(PostCustomersRepository $postCustomers, PostBillRepository $postBill, PostBillDetailRepository $postBillDetail, PostStatusRepository $postStatus, PostEloquentRepository $postRepository)
    {
        $this->postCustomers = $postCustomers;
        $this->postBill = $postBill;
        $this->postBillDetail = $postBillDetail;
        $this->postStatus = $postStatus;
        $this->postRepository = $postRepository;
    }

    public function getAddCart($id)
    {
        $product = Product::findOrFail($id);
        Cart::add([
            'id' => $id,
            'name' => $product->name_product,
            'quantity' => config('constant.one'),
            'price' => $product->price,
            'attributes' => array(
                'img' => $product->img,
            )
        ]);

        return redirect('cart/show');
    }

    public function getShowCart()
    {
        if (Auth::guard('loyal_customer')->check()) {
            $user = Auth::guard('loyal_customer')->id();
            $data['arrs'] = LoyalCustomer::ShowCart()
            ->where('loyal_customers.id', $user)
            ->get();
            $items = LoyalCustomer::ShowCart()
            ->where('loyal_customers.id', $user)
            ->value('point');
            $data['check'] = $items;
            $promotion = $items;
            $promotionLevel = (integer) ($promotion / config('constant.oneHundred'));
            if ($promotionLevel > 5) {
                $data['checkPoint'] = config('constant.five');
            } elseif ($promotionLevel > 0 && $promotionLevel <= 5) {
                $data['checkPoint'] = $promotionLevel;
            }
        }

        $data['total'] = Cart::getTotal();
        $data['items'] = Cart::getcontent();

        return view('frontend.cart', $data);
    }

    public function getDeleteCart($id)
    {
        if ($id == trans('frontend.all')) {
            Cart::clear();
        } else {
            Cart::remove($id);
        }

        return back();
    }

    public function getUpdateCart (Request $request)
    {
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity,
            ),
        ));
    }

    public function postComplete(Request $request)
    {
        $data['total'] = Cart::getTotal(); 
        $data['cart'] = Cart::getcontent();

        if (Auth::guard('loyal_customer')->check()) {
            $user = LoyalCustomer::findOrFail(Auth::guard('loyal_customer')->id());
            $email = $user->email;
            $id = $user->id;
            $data['info'] = $request->all();
            if ($request->discount == null || $request->discount == 100000) {
                $data['discount'] = config('constant.oneHundredThousand');
            } else {
                $data['discount'] = ($request->discount) - config('constant.oneHundredThousand');
            }
            
            $data['after_discount'] = $data['total'] - $data['discount'];
            if ($data['discount'] != config('constant.oneHundredThousand')) {
                $points = LoyalCustomer::ShowCart()
                ->where('loyal_customers.id', $id)
                ->first();
                if ($points != null) {
                    foreach ($points as $key => $value) {
                        $point = $points['point'] - ($data['discount'] / config('constant.oneThousand'));
                        if ($point > config('constant.zero')) {
                            $this->postRepository->update($points['id'], $point);
                        } else {
                            $point = config('constant.zero');
                            $this->postRepository->update($points['id'], $point);
                        }
                    }
                }
            } else {
                $point = (integer) ($data['total'] / config('constant.oneHundredThousand'));
                if ($point > config('constant.zero')) {
                    $points = LoyalCustomer::ShowCart()
                    ->where('loyal_customers.id', $id)
                    ->first();
                    if ($points != null) {
                        foreach ($points as $key => $value) {
                            $pointDiscount = $points['point'] + $point;
                            $this->postRepository->update($points['id'], $pointDiscount);
                        }
                    }
                }
            }

        } else {
            $data['info'] = $request->all();
            $email = $request->email;
            $id = null;
            $data['discount'] = config('constant.zero');
            $data['after_discount'] = $data['total'];
        }

        $customer = $this->postCustomers->getAddCustomers($request, $id);
        $idBill = $customer->id;

        $bill = $this->postBill->getAddBill($request, $idBill, $data['total'], $data['discount'], $data['after_discount']);
        $idStatus = $bill->id;

        $this->postStatus->getAddStatus($idStatus);

        foreach ($data['cart'] as $key => $value) {           
            $this->postBillDetail->getAddBillDetail($idStatus, $key, $value['quantity'], $value['price'], $value['name']);
        }

        Mail::send('frontend.email', $data, function ($message) use ($email) {
            $message->from(trans('frontend.emailAdmin'), trans('frontend.shop'));
            $message->to($email, $email);
            $message->cc(trans('frontend.emailShop'), trans('frontend.nameShop'));
            $message->subject(trans('frontend.confirms'));
        });
        
        Cart::clear();

        return redirect('complete');
    }

    public function getComplete()
    {
        return view('frontend.complete');
    }

    function fetchDiscount(Request $request)
    {
        if($request->get('query'))
        {
            $user = Auth::guard('loyal_customer')->id();
            $point = LoyalCustomer::ShowCart()
            ->where('loyal_customers.id', $user)
            ->value('point');
            $content = Cart::getTotal();
            $query = ($request->get('query')) - config('constant.oneHundredThousand');
            if ($query / 10000 < $point) {
                $data = $content - $query;

                return $data;
            } else {
                
                return $content;
            }
        }
        $query = $query->get('query');
    }
}
