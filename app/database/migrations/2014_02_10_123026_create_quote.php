<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuote extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('quotes', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('user_id');
	  	   	$table->integer('service_id');
		   	$table->datetime('quotedate', 50);
		   	$table->enum('status', array('pending', 'approved', 're-open'));
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
		Schema::drop('quotes');
	}

}
