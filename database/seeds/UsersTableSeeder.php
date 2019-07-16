<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\user;
        $user->name = 'Shiva Sapra';
        $user->email = 'shivasapra24@gmail.com';
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
        $detail->promotional_url = 'http://test.com/shivasapra';
        $detail->save();

    }
}
