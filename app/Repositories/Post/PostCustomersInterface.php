<?php
namespace App\Repositories\Post;

interface PostCustomersInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAddCustomers($request, $id);
}
