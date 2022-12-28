<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */  
    public function run()
    { 
        $users = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'admin' => '1',
            'password' => bcrypt('password')
        ]);

        Profile::create([
            'user_id'   => $users->id,
            'about'     => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.Omnisacere sequi laboriosam architecto quas totam quam? Aliquid cumque ex odit?',
            'facebook'  => 'facebook.com',
            'youtube'   => 'toutube.com',
        ]);
    } 
}



