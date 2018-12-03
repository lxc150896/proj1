<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;

class CategoryController extends Controller
{
    //
    public function getAllCategories()
    {
        $data['categorylist'] = Category::all();

        return view('backend.category', $data);
    }

    public function postAllCategories(AddCateRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
        ]);
        $request->session()->flash('status', trans('remember.Addcate'));
        
        return back();
    }

    public function getEditCategories($id)
    {
        $data['category'] = Category::findOrFail($id);

        return view('backend.editcategory', $data);
    }

    public function postEditCategories(EditCateRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();
        $request->session()->flash('status', trans('remember.Editcate'));

        return redirect()->intended('admin/category');
    }

    public function getDeleteCategories(Request $request, $id)
    {
        Category::destroy($id);
        $request->session()->flash('status', trans('remember.Deletecate'));

        return back();
    }
}
