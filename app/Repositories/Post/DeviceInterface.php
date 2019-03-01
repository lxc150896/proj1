<?php
namespace App\Repositories\Post;

interface DeviceInterface
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getDevice();
}
