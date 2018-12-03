<?php
namespace App\Repositories\Post;

interface PostBillInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAddBill($request, $idBill, $total, $discount, $afterDiscount);
}
