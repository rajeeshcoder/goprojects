<?php

use Illuminate\Database\Migrations\Migration;

class AddProfileIdToBooking extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customer_bookings', function($table) {
			$table->integer('customer_profile_id');
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