<?php
namespace App\Repositories\Post;

interface PostCustomerInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getLoyalCustomer($request);
}
