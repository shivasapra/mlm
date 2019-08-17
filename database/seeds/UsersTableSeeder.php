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
        $user->name = 'Galaxy Crowd';
        $user->username = 'GCF00001';
        $user->email = 'galaxycrowd@gmail.com';
        $user->admin = 1;
        $user->password = bcrypt('password');
        $user->save();

        $detail = new App\Details;
        $detail->user_id = $user->id;
        $detail->username = 'GCF00001';
        $detail->full_name = 'Galaxy Crowd';
        $detail->country = 'India';
        $detail->mobile = '123456789';
        $detail->invited_by = 'testing';
        $detail->invited_by_email = 'testing@gmail.com';
        $detail->promotional_url = 'http://galaxycrowd.com/GCF00001';
        $detail->security_pin = mt_rand(1000000, 9999999);
        $detail->save();

        $coordinates = new App\Coordinates;
        $coordinates->user_id = $user->id;
        $coordinates->row = 1;
        $coordinates->column = 1000;
        $coordinates->save();

        

        $user = new App\User;
        $user->name = 'Shiva Sapra';
        $user->username = 'GCF00002';
        $user->email = 'shivasapra24@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $detail = new App\Details;
        $detail->user_id = $user->id;
        $detail->username = 'GCF00002';
        $detail->full_name = 'Shiva Sapra';
        $detail->country = 'India';
        $detail->mobile = '9027289261';
        $detail->invited_by = 'GCF00001';
        $detail->invited_by_email = 'galaxycrowd@gmail.com';
        $detail->promotional_url = 'http://galaxycrowd.com/GCF00002';
        $detail->security_pin = mt_rand(1000000, 9999999);
        $detail->save();

        $user = new App\User;
        $user->name = 'Aslam Khan';
        $user->username = 'GCF00003';
        $user->email = 'aslam4276@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $detail = new App\Details;
        $detail->user_id = $user->id;
        $detail->username = 'GCF00003';
        $detail->full_name = 'Aslam Khan';
        $detail->country = 'India';
        $detail->mobile = '123456789';
        $detail->invited_by = 'GCF00002';
        $detail->invited_by_email = 'shivasapra24@gmail.com';
        $detail->promotional_url = 'http://galaxycrowd.com/GCF00003';
        $detail->security_pin = mt_rand(1000000, 9999999);
        $detail->save();

        $user = new App\User;
        $user->name = 'Vineet Chauhan';
        $user->username = 'GCF00004';
        $user->email = 'vineet.chd09@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $detail = new App\Details;
        $detail->user_id = $user->id;
        $detail->username = 'GCF00004';
        $detail->full_name = 'Vineet Chauhan';
        $detail->country = 'India';
        $detail->mobile = '123456789';
        $detail->invited_by = 'GCF00002';
        $detail->invited_by_email = 'shivasapra24@gmail.com';
        $detail->promotional_url = 'http://galaxycrowd.com/GCF00004';
        $detail->security_pin = mt_rand(1000000, 9999999);
        $detail->save();


        $user = new App\User;
        $user->name = 'Deepika Sharwan';
        $user->username = 'GCF00005';
        $user->email = 'deepika.sharwan@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $detail = new App\Details;
        $detail->user_id = $user->id;
        $detail->username = 'GCF00005';
        $detail->full_name = 'Deepika Sharwan';
        $detail->country = 'India';
        $detail->mobile = '123456789';
        $detail->invited_by = 'GCF00002';
        $detail->invited_by_email = 'shivasapra24@gmail.com';
        $detail->promotional_url = 'http://galaxycrowd.com/GCF00005';
        $detail->security_pin = mt_rand(1000000, 9999999);
        $detail->save();


        $user = new App\User;
        $user->name = 'Jagdish Ranjha';
        $user->username = 'GCF00006';
        $user->email = 'jagdishranjha@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $detail = new App\Details;
        $detail->user_id = $user->id;
        $detail->username = 'GCF00006';
        $detail->full_name = 'Jagdish Ranjha';
        $detail->country = 'India';
        $detail->mobile = '123456789';
        $detail->invited_by = 'GCF00002';
        $detail->invited_by_email = 'shivasapra24@gmail.com';
        $detail->promotional_url = 'http://galaxycrowd.com/GCF00006';
        $detail->security_pin = mt_rand(1000000, 9999999);
        $detail->save();


        $user = new App\User;
        $user->name = 'Sonu Mahanto';
        $user->username = 'GCF00007';
        $user->email = 'sonu.mahanto@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        $detail = new App\Details;
        $detail->user_id = $user->id;
        $detail->username = 'GCF00007';
        $detail->full_name = 'Sonu Mahanto';
        $detail->country = 'India';
        $detail->mobile = '123456789';
        $detail->invited_by = 'GCF00002';
        $detail->invited_by_email = 'shivasapra24@gmail.com';
        $detail->promotional_url = 'http://galaxycrowd.com/GCF00007';
        $detail->security_pin = mt_rand(1000000, 9999999);
        $detail->save();

        // for ($i = 0; $i < 10; $i++) { 
        //     $user = new App\User;
        //     $user->name = $faker->name;
        //     $user->email = $faker->email;
        //     $user->password = bcrypt('password');
        //     $user->save();

        //     $detail = new App\Details;
        //     $detail->user_id = $user->id;
        //     $detail->username = $faker->username;
        //     $detail->full_name = $user->name;
        //     $detail->country = $faker->country;
        //     $detail->mobile =  mt_rand(1000000, 9999999);
        //     $detail->invited_by = 'galaxycrowd';
        //     $detail->invited_by_email = 'shivasapra24@gmail.com';
        //     $detail->promotional_url = 'http://galaxycrowd.com/'.$detail->username;
        //     $detail->security_pin = mt_rand(1000000, 9999999);
        //     $detail->save();
        // }
        
        

    }
}
