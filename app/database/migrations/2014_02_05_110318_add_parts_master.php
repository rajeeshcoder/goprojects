<?php

use Illuminate\Database\Migrations\Migration;

class AddPartsMaster extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parts_master', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('model_id');
		   	$table->string('part_number', 50);
		   	$table->string('description', 300);
		   	$table->integer('price');
		   	$table->enum('unit', array('num', 'ltr', 'kg'));
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
		Schema::drop('parts_master');
	}
}