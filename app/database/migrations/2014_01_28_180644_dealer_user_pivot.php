<?php

use Illuminate\Database\Migrations\Migration;

class DealerUserPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_service', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('user_id');
	  	   	$table->integer('service_center_id');
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
		Schema::drop('user_service');
		
	}

}