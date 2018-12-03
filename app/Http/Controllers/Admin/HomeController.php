<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class HomeController extends Controller
{
    //
    public function getHome()
    {
        $data['product'] = DB::table('products')->count();
        $data['comment'] = DB::table('comments')->count();
        $data['category'] = DB::table('categories')->count();
        
        return view('backend.index', $data);
    }
    
    public function getLogout()
    {
        Auth::logout();

        return redirect()->intended('login');
    }
}
