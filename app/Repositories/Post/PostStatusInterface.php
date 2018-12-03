<?php
namespace App\Repositories\Post;

interface PostStatusInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAddStatus($idStatus);
}
