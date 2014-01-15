<?php

use Illuminate\Database\Migrations\Migration;

class CreateModelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('models', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('manufacturer_id');
		   	$table->string('title', 20);
		   	$table->integer('cost');
		   	$table->integer('cylinders');
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
		Schema::drop('models');
	}

}