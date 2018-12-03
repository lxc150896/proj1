<?php
namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class PostEloquentRepository extends EloquentRepository implements PostRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\InformationCustomer::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getPostHost($request, $id)
    {
        return $this->_model::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'point' => config('constant.ten'),
            'loyal_id' => $id,
        ]);
    }

    public function update($id, $point)
    {
        $result = $this->findId($id);
        if ($result) {
            $result->update(['point' => $point]);

            return $result;
        }

        return false;
    }
}
