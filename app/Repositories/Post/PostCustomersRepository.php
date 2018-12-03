<?php
namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class PostCustomersRepository extends EloquentRepository implements PostCustomersInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Customer::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getAddCustomers($request, $id)
    {
        return $this->_model::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->add,
            'phone' => $request->phone,
            'note' => $request->note,
            'loyal_id' => $id,
        ]);
    }
}
