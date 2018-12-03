<?php
namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class PostBillDetailRepository extends EloquentRepository implements PostBillDetailInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\BillDetail::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAddBillDetail($idBillDetail, $key, $quantity, $price, $name)
    {
        return $this->_model::create([
            'bill_id' => $idBillDetail,
            'product_id' => $key,
            'quantity' => $quantity,
            'unit_price' => $price,
            'name_product' => $name,
        ]);
    }
}
