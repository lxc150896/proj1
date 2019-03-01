<?php
namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class DeviceRepository extends EloquentRepository implements DeviceInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Device::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getDevice()
    {
        return $this->_model::all();
    }
}
