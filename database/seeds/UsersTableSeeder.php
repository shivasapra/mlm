<?php

use Illuminate\Database\Seeder;
use Faker\Generator;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $user = new App\User;
        $user->name = 'Shiva Sapra';
        $user->email = 'shivasapra24@gmail.com';
        $user->admin = 1;
        $user->password = bcrypt('password');
        $user->save();

        $detail = new App\Details;
        $detail->user_id = $user->id;
        $detail->username = 'shivasapra';
        $detail->full_name = 'Shiva Sapra';
        $detail->country = 'India';
        $detail->mobile = '9027289261';
        $detail->invited_by = 'testing';
        $detail->invited_by_email = 'testing@gmail.com';
        $detail->promotional_url = 'http://galaxycrowd.com/shivasapra';
        $detail->security_pin = mt_rand(1000000, 9999999);
        $detail->save();

        $coordinates = new App\Coordinates;
        $coordinates->user_id = $user->id;
        $coordinates->row = 1;
        $coordinates->column = 1000;
        $coordinates->save();

        for ($i = 0; $i < 10; $i++) { 
            $user = new App\User;
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = bcrypt('password');
            $user->save();

            $detail = new App\Details;
            $detail->user_id = $user->id;
            $detail->username = $faker->username;
            $detail->full_name = $user->name;
            $detail->country = $faker->country;
            $detail->mobile =  mt_rand(1000000, 9999999);
            $detail->invited_by = 'shivasapra';
            $detail->invited_by_email = 'shivasapra24@gmail.com';
            $detail->promotional_url = 'http://galaxycrowd.com/'.$detail->username;
            $detail->security_pin = mt_rand(1000000, 9999999);
            $detail->save();
        }
        

    }
}
