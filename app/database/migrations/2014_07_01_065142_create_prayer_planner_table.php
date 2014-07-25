<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrayerPlannerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Field List
        Schema::create('planner', function($table)
        {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('slot_duration')->default(3600)->unsigned();
            $table->string('title')->default('');
            $table->string('description')->default('');
            $table->boolean('public')->default(true);
            $table->boolean('listed')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('allow_anonymous')->default(false);
            $table->string('password')->nullable();
            $table->string('tags')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('planner');
	}

}
