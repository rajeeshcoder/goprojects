<?php

use Illuminate\Database\Migrations\Migration;

class CreateServiceStat extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_master_status', function($table) {
	  	   	$table->increments('id');
		   	$table->string('title', 50);
		   	$table->enum('owner', array('dealer'));
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
		Schema::drop('service_master_status');
	}

}