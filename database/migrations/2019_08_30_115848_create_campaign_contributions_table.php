<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignContributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_contributions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('campaign_id');
            $table->float('amount');
            $table->string('currency');
            $table->string('order_id');
            $table->string('name');
            $table->string('email');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('district');
            $table->string('postal_code');
            $table->string('mobile');
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('campaign_contributions');
    }
}
