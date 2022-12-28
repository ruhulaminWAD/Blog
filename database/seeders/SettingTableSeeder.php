<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name' => 'Test Website',
            'contact_number' => '017********',
            'contact_email' => 'site_name@contact.com',
            'address' => 'Dhaka, Bangladesh',
        ]);
    }
}
