<?php

use Illuminate\Database\Migrations\Migration;

class CreateServiceCentersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_centers', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('dealer_id');
		   	$table->string('title', 20);
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
		//Schema::drop('service_centers');
	}

}