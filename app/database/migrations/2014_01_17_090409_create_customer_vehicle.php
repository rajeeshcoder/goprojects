<?php

use Illuminate\Database\Migrations\Migration;

class CreateCustomerVehicle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_vehicles', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('user_id');
	  	   	$table->integer('model_id');
		   	$table->string('reg_no', 50);
		   	$table->string('chasis_no', 50);
		    $table->string('engine_no', 50);
		    $table->date('reg_date');
		    $table->string('color', 20);
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
		Schema::drop('customer_vehicles');
	}

}