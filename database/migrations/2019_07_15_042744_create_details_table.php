<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('username')->nullable();
            $table->string('full_name')->nullable();
            $table->string('cause')->nullable();
            $table->string('invited_by')->nullable();
            $table->string('invited_by_email')->nullable();
            $table->string('promotional_url')->nullable();
            $table->string('sex')->nullable();
            $table->Date('DOB')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->string('campaign_category')->nullable();
            $table->string('skype_id')->nullable();
            $table->string('pan_no')->nullable();
            $table->bigInteger('security_pin')->nullable();
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
        Schema::dropIfExists('details');
    }
}
