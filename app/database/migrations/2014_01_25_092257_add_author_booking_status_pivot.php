<?php

use Illuminate\Database\Migrations\Migration;

class AddAuthorBookingStatusPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table('booking_status', function($table) {
			$table->enum('owner', array('d', 'c', 's'));
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