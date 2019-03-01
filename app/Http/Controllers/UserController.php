<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use Auth;
use App\Repositories\Post\PostCustomerRepository;
use App\Repositories\Post\PostEloquentRepository;

class UserController extends Controller
{
    protected $postCustomer, $postRepository;

    public function __construct(PostCustomerRepository $postCustomer, PostEloquentRepository $postRepository)
    {
        $this->postCustomer = $postCustomer;
        $this->postRepository = $postRepository;
    }

    public function getLogin()
    {
        return view('frontend.login');
    }

    public function postLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember == trans('frontend.remember')) {
            $remember = true;
        } else {
            $remember = false;
        }
        
        if (Auth::guard('loyal_customer')->attempt($arr)) {

            return redirect()->intended('/');
        } else {

            return back()->withInput()->with('login', trans('frontend.error'));
        }
    }

    public function getlogout()
    {
        Auth::guard('loyal_customer')->logout();

        return redirect()->intended('/');
    }

    public function getRegister()
    {
        return view('frontend.register');
    }

    public function postRegister(CustomerRequest $request)
    {
        $loyalCustomer = $this->postCustomer->getLoyalCustomer($request);
        $id = $loyalCustomer->id;
        $this->postRepository->getPostHost($request, $id);
        $request->session()->flash('login', trans('frontend.messageLogin'), ['mau' => 'info']);
        
        return redirect('user');
    }
}
