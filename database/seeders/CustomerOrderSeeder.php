<?php

namespace Database\Seeders;

use App\Models\CustomerOrder;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CustomerOrder::factory()->createMany([
           [
               'order_id' => 1,
               'name' => 'Muhammad Dzulfiqar',
               'gender' => 'M',
               'type' => Order::TYPE_CUSTOMER,
               'email' => 'fiqar@gmail.com',
               'phone_number' => '08123456789',
           ],
            [
                'order_id' => 1,
                'name' => 'Muhammad Dzulfiqar',
                'gender' => 'M',
                'type' => Order::TYPE_CUSTOMER,
                'email' => 'fiqar@gmail.com',
                'phone_number' => '08123456789',
                'ktp_number' => '1234567890',
            ]
        ]);
    }
}
