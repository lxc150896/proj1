<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Configuration;
use DB;

class ProductController extends Controller
{
    //
    public function getProduct()
    {
        $data['product_list'] = DB::table('categories')
        ->join('products', 'categories.id', '=', 'products.category_id')
        ->select('products.id', 'products.name_product', 'products.price', 'products.img', 'categories.name', 'categories.slug')
        ->orderBy('products.id', 'desc')
        ->get();

        return view('backend.product', $data);
    }

    public function getAddProduct()
    {
        $data['category_list'] = Category::all();

        return view('backend.addproduct', $data);
    }

    public function postAddProduct(AddProductRequest $request)
    {
        $nameimg = $request->img->getClientOriginalName();
        Product::create([
            'name_product' => $request->name,
            'slug' => str_slug($request->name),
            'price' => $request->price,
            'img' => $nameimg,
            'warranty' => $request->warranty,
            'accessories' => $request->accessories,
            'condition' => $request->condition,
            'promotion' => $request->promotion,
            'status' => $request->status,
            'description' => $request->description,
            'featured' => $request->featured,
            'category_id' => $request->category,
            'screen' => $request->screen,
            'operating' => $request->operating,
            'camera_after' => $request->after,
            'camera_before' => $request->before,
            'cpu' => $request->cpu,
            'ram' => $request->ram,
            'memory' => $request->memory,
            'memory_stick' => $request->stick,
            'sim' => $request->sim,
            'battery_capacity' => $request->battery,
        ]);
        $request->img->move(config('constant.avatar'), $nameimg);
        $request->session()->flash('status', trans('remember.addProduct'));
        
        return back();
    }

    public function getEditProduct($id)
    {
        $data['product'] = Product::findOrFail($id);
        $data['list_category'] = Category::all();

        return view('backend.editproduct', $data);
    }

    public function postEditProduct(Request $request, $id)
    {
        $product = new Product;
        $arr['name_product'] = $request->name;
        $arr['slug'] = str_slug($request->name);
        $arr['price'] = $request->price;
        $arr['warranty'] = $request->warranty;
        $arr['accessories'] = $request->accessories;
        $arr['condition'] = $request->condition;
        $arr['status'] = $request->status;
        $arr['promotion'] = $request->promotion;
        $arr['description'] = $request->description;
        $arr['featured'] = $request->featured;
        $arr['category_id'] = $request->category;
        $arr['screen'] = $request->screen;
        $arr['operating'] = $request->operating;
        $arr['camera_after'] = $request->after;
        $arr['camera_before'] = $request->before;
        $arr['cpu'] = $request->cpu;
        $arr['ram'] = $request->ram;
        $arr['memory'] = $request->memory;
        $arr['memory_stick'] = $request->stick;
        $arr['sim'] = $request->sim;
        $arr['battery_capacity'] = $request->battery;
        if ($request->hasFile('img')) {
            $img = $request->img->getClientOriginalName();
            $arr['img'] = $img;
            $request->img->move(config('constant.avatar'), $img);
        }
        $product::where('id', $id)->update($arr);
        $request->session()->flash('status', trans('remember.editProduct'));

        return redirect('admin/product');
    }

    public function getDeleteProduct(Request $request, $id)
    {
        Product::destroy($id);
        $request->session()->flash('status', trans('remember.deleteProduct'));

        return back();
    }
}
