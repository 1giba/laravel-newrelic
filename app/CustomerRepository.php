<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerRepository
{
    protected $customer = null;

    public function __construct(Customer $customer)
    {
    	$this->customer = $customer;
    }

    public function all()
    {
        return $this->customer->all();
    }

    public function paginate($limit)
    {
        return $this->customer->paginate($limit);
    }

    public function get($id)
    {
    	return $this->customer->find($id);
    }
}
