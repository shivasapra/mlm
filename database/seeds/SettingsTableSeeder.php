<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = new App\Settings;
        $settings->basic_amount = 2500;
        $settings->admin_amount = 600;
        $settings->level_one_percentage = 500;
        $settings->level_two_percentage = 500;
        $settings->level_three_percentage = 500;
        $settings->upgrade_wallet_amount = 400;
        $settings->upgrade_to_standard = 50000; 
        
        
        $settings->standard_amount = 5000;
        $settings->admin_amount_standard = 1200;
        $settings->level_one_percentage_standard = 1000;
        $settings->level_two_percentage_standard = 1000;
        $settings->level_three_percentage_standard = 1000;
        $settings->upgrade_wallet_amount_standard = 800;
        $settings->upgrade_to_premium = 100000;
        
        
        $settings->premium_amount = 10000;
        $settings->admin_amount_premium = 2800;
        $settings->level_one_percentage_premium = 2400;
        $settings->level_two_percentage_premium = 2400;
        $settings->level_three_percentage_premium = 2400;
        $settings->upgrade_wallet_amount_premium = 200000;
        
        $settings->facilitation_percentage = 5;
        $settings->save();

        $cause = new App\Cause;
        $cause->name = 'Education';
        $cause->save();

        $cause = new App\Cause;
        $cause->name = 'Holiday';
        $cause->save();
    }
}
