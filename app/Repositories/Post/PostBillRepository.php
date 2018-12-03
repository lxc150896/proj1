<?php
namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class PostBillRepository extends EloquentRepository implements PostBillInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Bill::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAddBill($request, $idBill, $total, $discount, $afterDiscount)
    {
        return $this->_model::create([
            'customer_id' => $idBill,
            'total' => $total,
            'note' => $request->note,
            'discount' => $discount,
            'after_discount' => $afterDiscount,
        ]);
    }
}
