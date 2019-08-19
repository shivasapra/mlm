<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRewardsColumnToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->longText('reward_one_prize')->nullable();
            $table->longText('reward_two_prize')->nullable();
            $table->longText('reward_three_prize')->nullable();
            $table->longText('reward_one_tc')->nullable();
            $table->longText('reward_two_tc')->nullable();
            $table->longText('reward_three_tc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
}
