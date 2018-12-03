<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use Datatables;
use Validator;
use DB;

class SuperAdminController extends Controller
{
    public function getSuperAdmin()
    {
        $data['admins'] = User::all();

        return view('backend.super', $data);
    }

    public function postAddAdmin(Request $request)
    {
        $users = User::user()->where('email', '=', $request->email)->first();
        if ($users->email == config('constant.one')) {
            $request->session()->flash('status', trans('remember.existEmail'));
        } else {
            User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => $request->level,
            ]);
            $request->session()->flash('status', trans('remember.Addcate'));
        }

        return back();
    }

    public function getDeleteAdmin(Request $request, $id)
    {
        User::destroy($id);
        $request->session()->flash('status', trans('remember.deletedAdmin'));

        return back();
    }
}
