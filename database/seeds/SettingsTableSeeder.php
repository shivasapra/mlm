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
        $settings->basic_amount = 10000;
        $settings->admin_amount = 5000;
        $settings->level_one_percentage = 2500;
        $settings->level_two_percentage = 1250;
        $settings->level_three_percentage = 625; 
        $settings->upgrade_wallet_amount = 20000;
        
        
        $settings->standard_amount = 20000;
        $settings->admin_amount_standard = 10000;
        $settings->level_one_percentage_standard = 5000;
        $settings->level_two_percentage_standard = 2500;
        $settings->level_three_percentage_standard = 1250;
        $settings->upgrade_wallet_amount_standard = 40000;
        
        
        $settings->premium_amount = 40000;
        $settings->admin_amount_premium = 20000;
        $settings->level_one_percentage_premium = 10000;
        $settings->level_two_percentage_premium = 5000;
        $settings->level_three_percentage_premium = 2500;
        $settings->upgrade_wallet_amount_premium = 80000;
        
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
