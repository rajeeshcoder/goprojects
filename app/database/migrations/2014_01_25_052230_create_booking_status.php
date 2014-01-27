<?php

use Illuminate\Database\Migrations\Migration;

class CreateBookingStatus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_bookings_status', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('customer_booking_id');
		   	$table->string('title', 50);
		   	$table->enum('owner', array('dealer', 'customer', 'dealer_customer'));
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
		Schema::drop('customer_bookings_status');
	}

}