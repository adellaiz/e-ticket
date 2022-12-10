<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ticket::factory()->createMany([
            [
                'event_id' => 1,
                'title' => 'Gold VIP - Normal (Free Seating)',
                'price' => '600000',
                'description' => '[1,2,3]',
            ],
            [
                'event_id' => 1,
                'title' => 'Diamond VVIP - Normal (Free Seating)',
                'price' => '700000',
                'description' => '[1,2,3]',
            ],
            [
                'event_id' => 1,
                'title' => 'Silver - Normal (Standing)',
                'price' => '500000',
                'description' => '[1,2,3]',
            ]
        ]);
    }
}
