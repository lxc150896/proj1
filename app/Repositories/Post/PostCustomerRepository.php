<?php
namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class PostCustomerRepository extends EloquentRepository implements PostCustomerInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\LoyalCustomer::class;
    }

    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getLoyalCustomer($request)
    {
        return $this->_model::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
}
