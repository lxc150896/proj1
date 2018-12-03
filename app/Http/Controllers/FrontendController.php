<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Repositories\Post\PostProductRepository;

class FrontendController extends Controller
{
    protected $postProduct;

    public function __construct(PostProductRepository $postProduct)
    {
        $this->postProduct = $postProduct;
    }

    public function getHome()
    {
        $data['featured'] = Product::where('featured', config('constant.one'))->orderBy('id', 'desc')->take(config('constant.eight'))->get();
        $data['new_product'] = Product::orderBy('id', 'desc')->take(config('constant.sixteen'))->get();

        return view('frontend.home', $data);
    }

    public function getDetail($id)
    {
        $item = Product::findOrFail($id);
        $comments = Comment::where('product_id', $id)->get();
        $products = Product::where([
            ['price', '>=', $item->price],
            ['id', '<>', $id],
            ['category_id', '=', $item->category_id],
        ])->OrderBy('price', 'ASC')->take(config('constant.for'))->get();

        return view('frontend.details', compact('item', 'products', 'comments'));
    }

    public function getCategory($id)
    {
        $data['categoryName'] = Category::findOrFail($id);
        $data['items'] = Product::where('category_id', $id)->orderBy('category_id', 'desc')->paginate(config('constant.eight'));

        return view('frontend.category', $data);
    }

    public function postComment(Request $request, $id)
    {
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->content = $request->content;
        $comment->product_id = $id;
        $comment->save();

        return back();
    }

    public function getSearch(Request $request)
    {
        $result = $request->result;
        $data['keyWord'] = $result;
        $result = str_replace(' ', '%', $result);
        $data['items'] = Product::where('name_product', 'like', '%' . $result . '%')->get();

        return view('frontend.search', $data);
    }

    public function getSearchAjax(Request $request)
    {
        $products = $this->postProduct->getSearchProduct($request);

        return response()->json($products);
    }
}
