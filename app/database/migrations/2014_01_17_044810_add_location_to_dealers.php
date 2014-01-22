<?php

use Illuminate\Database\Migrations\Migration;

class AddLocationToDealers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('service_centers', function($table) {
			$table->integer('user_id');
			$table->string('location');
			$table->string('city');
			$table->string('state');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('service_centers', function($table)
        {
        	$table->dropColumn('user_id');
            $table->dropColumn('location');
            $table->dropColumn('city');
            $table->dropColumn('state');
        });
	}

}