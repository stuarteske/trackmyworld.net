<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSocialAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Field List
        Schema::create('user_social_account', function($table)
        {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->default(null)->nullable();
            $table->string('social_user_id')->default('');
            $table->string('network')->default('');
            $table->string('token')->default('');
            $table->string('refresh_token')->default(null)->nullable();
            $table->integer('expire')->default(null)->nullable(); //60 days in seconds
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
        Schema::drop('user_social_account');
	}

}
