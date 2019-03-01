<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Status;
use DB;

class OrderController extends Controller
{
    public function getOrder()
    {
        $data['orders'] = Customer::all();
        
        return view('backend.order', $data);
    }
    public function getDetailOrder($id)
    {
        $data['orders'] = Customer::customer()->where('customers.id', $id)->get();

        return view('backend.detail', $data);
    }

    public function getStatusOrder($id)
    {
        $status = DB::table('status')->where('id', $id)->select('status')->first();
        $data = $status->status + config('constant.one');
        $product = new Status;
        $arr['status'] = $data;
        $product::where('id', $id)->update($arr);

        return back();
    }

    public function getDeleteOrder(Request $request, $id)
    {
        Customer::destroy($id);
        $request->session()->flash('status', trans('remember.messageOrder'));

        return back();
    }
}
