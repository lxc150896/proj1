<?php
namespace App\Repositories\Post;

interface PostBillDetailInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAddBillDetail($idBillDetail, $key, $quantity, $price, $name);
}
