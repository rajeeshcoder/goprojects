<?php

use Illuminate\Database\Migrations\Migration;

class CreateBookingStatusPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('booking_status', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('customer_booking_id');
	  	   	$table->integer('customer_booking_status_id');
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
		Schema::drop('booking_status');
	}

}