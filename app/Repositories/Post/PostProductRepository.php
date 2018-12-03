<?php
namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class PostProductRepository extends EloquentRepository implements PostProductInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getSearchProduct($request)
    {
        return $this->_model::where('name_product', 'like', '%' . $request->value . '%')->take(config('constant.five'))->get();
    }
}
