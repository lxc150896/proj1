<?php
namespace App\Repositories\Post;

interface PostProductInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getSearchProduct($request);
}
