<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory()->createMany([
            [
                'title' => 'AIR SUPPLY IN JAKARTA',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(3),
                'image_path' => '/images/home-background.png',
                'publish_date' => Carbon::now(),
                'event_date' => Carbon::now()->addDays(3),
                'event_time' => '15:00',
                'location' => 'Marina Convention Center, Jakarta',
                'description' => '<h2>Penukaran Tiket</h2>
                    <ol>
                    <li>Tunjukkan e-tiket yang telah diterima melalui email kepada petugas di lapangan.</li>
                    <li>Wajib menunjukan kartu identitas asli</li>
                    <li>Pengunjung wajib memakai masker dan mematuhi seluruh protokol kesehatan selama event</li>
</ol>
<h2>Terms and Condition</h2>
                    <ol>
                    <li>Harga sudah termasuk pajak</li>
                    <li>Tiket tidak dapat direfund</li>
                    <li>Tiket tidak dapat direschedule</li>
                    <li>Pengunjung wajib menggunakan masker selama acara</li>
                    <li>Pengunjung wajib vaksin lengkap</li>
</ol>',
                'created_by' => 1,
            ],
            [
                'title' => 'AIR SUPPLY IN JAKARTA',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(3),
                'image_path' => '/images/home-background.png',
                'publish_date' => Carbon::now(),
                'event_date' => Carbon::now()->addDays(3),
                'event_time' => '15:00',
                'location' => 'Marina Convention Center, Jakarta',
                'description' => '<h2>Penukaran Tiket</h2>
                    <ol>
                    <li>Tunjukkan e-tiket yang telah diterima melalui email kepada petugas di lapangan.</li>
                    <li>Wajib menunjukan kartu identitas asli</li>
                    <li>Pengunjung wajib memakai masker dan mematuhi seluruh protokol kesehatan selama event</li>
</ol>
<h2>Terms and Condition</h2>
                    <ol>
                    <li>Harga sudah termasuk pajak</li>
                    <li>Tiket tidak dapat direfund</li>
                    <li>Tiket tidak dapat direschedule</li>
                    <li>Pengunjung wajib menggunakan masker selama acara</li>
                    <li>Pengunjung wajib vaksin lengkap</li>
</ol>',
                'created_by' => 1,
            ],
            [
                'title' => 'AIR SUPPLY IN JAKARTA',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(3),
                'image_path' => '/images/home-background.png',
                'publish_date' => Carbon::now(),
                'event_date' => Carbon::now()->addDays(3),
                'event_time' => '15:00',
                'location' => 'Marina Convention Center, Jakarta',
                'description' => '<h2>Penukaran Tiket</h2>
                    <ol>
                    <li>Tunjukkan e-tiket yang telah diterima melalui email kepada petugas di lapangan.</li>
                    <li>Wajib menunjukan kartu identitas asli</li>
                    <li>Pengunjung wajib memakai masker dan mematuhi seluruh protokol kesehatan selama event</li>
</ol>
<h2>Terms and Condition</h2>
                    <ol>
                    <li>Harga sudah termasuk pajak</li>
                    <li>Tiket tidak dapat direfund</li>
                    <li>Tiket tidak dapat direschedule</li>
                    <li>Pengunjung wajib menggunakan masker selama acara</li>
                    <li>Pengunjung wajib vaksin lengkap</li>
</ol>',
                'created_by' => 1,
            ],
            [
                'title' => 'AIR SUPPLY IN JAKARTA',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(3),
                'image_path' => '/images/home-background.png',
                'publish_date' => Carbon::now(),
                'event_date' => Carbon::now()->addDays(3),
                'event_time' => '15:00',
                'location' => 'Marina Convention Center, Jakarta',
                'description' => '<h2>Penukaran Tiket</h2>
                    <ol>
                    <li>Tunjukkan e-tiket yang telah diterima melalui email kepada petugas di lapangan.</li>
                    <li>Wajib menunjukan kartu identitas asli</li>
                    <li>Pengunjung wajib memakai masker dan mematuhi seluruh protokol kesehatan selama event</li>
</ol>
<h2>Terms and Condition</h2>
                    <ol>
                    <li>Harga sudah termasuk pajak</li>
                    <li>Tiket tidak dapat direfund</li>
                    <li>Tiket tidak dapat direschedule</li>
                    <li>Pengunjung wajib menggunakan masker selama acara</li>
                    <li>Pengunjung wajib vaksin lengkap</li>
</ol>',
                'created_by' => 1,
            ],
        ]);
    }
}
