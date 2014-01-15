<?php

use Illuminate\Database\Migrations\Migration;

class CreateDealersLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*
		Schema::create('dealers_locations', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('dealer_id');
		   	$table->string('title', 20);
		   	$table->string('address', 300);
		   	$table->timestamps();
	   });
	*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	//	Schema::drop('dealers_locations');
	}

}