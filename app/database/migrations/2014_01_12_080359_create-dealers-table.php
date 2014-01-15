<?php

use Illuminate\Database\Migrations\Migration;

class CreateDealersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dealers', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('manufacturer_id');
		   	$table->string('title', 20);
		   	$table->timestamps();
	   });
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dealers');
	}

}