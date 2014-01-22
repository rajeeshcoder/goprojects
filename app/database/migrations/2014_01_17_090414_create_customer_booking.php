<?php

use Illuminate\Database\Migrations\Migration;

class CreateCustomerBooking extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_bookings', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('user_id');
	  	   	$table->integer('vehicle_id');
	  	   	$table->integer('service_center_id');
	  	   	$table->integer('total_km');
		   	$table->enum('choices', array('free', 'paid', 'accident', 'reapir'));
		   	$table->enum('dispatch', array('pick-up', 'walk-in'));
		    $table->date('service_date');
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
		Schema::drop('customer_bookings');
	}

}