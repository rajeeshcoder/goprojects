<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesParts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotes_parts', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('quote_id');
	  	   	$table->integer('part_id');
	  	   	$table->integer('user_id');
	  	   	$table->integer('qty');
		   	$table->datetime('entrydate', 50);
		   	$table->enum('parttype', array('free', 'warranty', 'paid'));
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
		Schema::drop('quotes_parts');
	}

}
