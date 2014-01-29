<?php

use Illuminate\Database\Migrations\Migration;

class CreateServiceMaster extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_master', function($table) {
		 	$table->increments('id');
	  	   	$table->integer('user_id');
	  	   	$table->integer('booking_id');
	  	   	$table->datetime('start_date');
	  	   	$table->datetime('end_date');
	  	   	$table->string('report');
	  	   	$table->string('total_amt');
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
		Schema::drop('service_master');
	}

}