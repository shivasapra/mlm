<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('row')->nullable(); // row coordinate 
            $table->integer('column')->nullable(); // column coordinate
            $table->integer('super_duper_parent')->nullable(); //user_id of superDuperParent
            $table->integer('super_parent')->nullable(); //user_id of superparent
            $table->integer('parent')->nullable(); //user_id of parent
            $table->integer('self_position_wrt_parent')->nullable(); // SELF POSITION W.R.TO PARENT i.e 1 or 2 or 3 or 4 or 5
            $table->string('children')->nullable(); // This will be the array of user_id's of this users's children  separated bt commas i.e [2,4,6,8,8] maximum 5 id's
            $table->string('super_children')->nullable(); // This will be the array of user_id's of this users's children's children i.e [2,4,6,8,8,...] maximum 25 id's
            $table->longText('super_duper_children')->nullable(); // This will be the array of user_id's of this users's children's children i.e [2,4,6,8,8,...] maximum 125 id's
            $table->boolean('eligible_for_reward')->default(0);
            $table->boolean('reward_one_achieved')->default(0);
            $table->boolean('reward_two_achieved')->default(0);
            $table->boolean('reward_three_achieved')->default(0);
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
        Schema::dropIfExists('coordinates');
    }
}
