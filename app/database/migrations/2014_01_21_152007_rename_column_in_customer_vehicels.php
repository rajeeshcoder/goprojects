<?php

use Illuminate\Database\Migrations\Migration;

class RenameColumnInCustomerVehicels extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customer_vehicles', function(Blueprint $table) {
   		 $table->string('regdate')->after('engine_no');
		});

		DB::table('customer_vehicles')->update(array('regdate' => DB::raw('reg_date')));
		
		Schema::table('customer_vehicles', function(Blueprint $table) {
    		$table->dropColumn('reg_date');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}