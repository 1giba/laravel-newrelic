<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class CustomerTableSeeder extends Seeder
{

	const MAX = 100000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Factory::create('pt_BR');    	

    	for ($i = 0; $i < self::MAX; $i++) {
    		$customer = [];
    		$customer['name'] 		= $faker->name;
    		$customer['cnpj_cpf'] 	= $faker->cpf;
    		$customer['birth_date'] = $faker->dateTimeThisCentury->format('Y-m-d');
    		$customer['email'] 		= $faker->email;
    		$customer['address'] 	= json_encode([
    			'street_address' => $faker->streetAddress,
    			'city'			 => $faker->city,
    			'postcode' 		 => $faker->postcode,
    			'state' 		 => $faker->state,    			
    		]);
    		$customer['phones'] 	= json_encode([
    			'phone'      => $faker->phone,
    			'cell_phone' => $faker->cellphoneNumber,
    		]);

    		DB::table('customers')->insert(
        		array_merge($customer, [
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ])
        	);
    	}
    }
}
