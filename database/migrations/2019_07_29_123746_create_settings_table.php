<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('level_one_percentage')->nullable();
            $table->float('level_two_percentage')->nullable();
            $table->float('level_three_percentage')->nullable();
            $table->float('admin_amount')->nullable();
            $table->float('basic_amount')->nullable();

            $table->float('level_one_percentage_standard')->nullable();
            $table->float('level_two_percentage_standard')->nullable();
            $table->float('level_three_percentage_standard')->nullable();
            $table->float('admin_amount_standard')->nullable();
            $table->float('standard_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
