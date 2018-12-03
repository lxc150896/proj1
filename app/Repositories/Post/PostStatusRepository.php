<?php
namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class PostStatusRepository extends EloquentRepository implements PostStatusInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Status::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAddStatus($idStatus)
    {
        return $this->_model::create([
            'bill_id' => $idStatus,
            'status' => config('constant.one'),
            'note' => '',
        ]);
    }
}
