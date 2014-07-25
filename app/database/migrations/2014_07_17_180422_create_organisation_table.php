<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Field List
        Schema::create('organisation', function($table)
        {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('owner_id')->unsigned();
            $table->string('slug')->default('');
            $table->string('name')->default('');
            $table->boolean('listed')->default(false);
            $table->boolean('featured')->default(false);
            $table->string('about')->default('');
            $table->string('location')->default('');
            $table->string('phone')->default('');
            $table->string('web')->default('');
            $table->string('twitter')->default('');
            $table->string('facebook')->default('');
            $table->string('tags')->nullable();
            $table->string('logo')->nullable();
            $table->timestamp('disabled')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('organisation');
	}

}
