<?php

use Illuminate\Database\Migrations\Migration;

class ServiceStatus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_status', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('service_master_id');
	  	   	$table->integer('service_master_status_id');
	  	   	$table->string('description', 50);
	  	   	$table->integer('user_id');
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
		Schema::drop('service_status');
	}

}