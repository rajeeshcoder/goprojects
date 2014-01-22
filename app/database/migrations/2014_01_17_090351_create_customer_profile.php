<?php

use Illuminate\Database\Migrations\Migration;

class CreateCustomerProfile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_profiles', function($table) {
	  	   	$table->increments('id');
	  	   	$table->integer('user_id');
		   	$table->string('primary_phone', 20);
		   	$table->string('secondary_phone', 20);
		    $table->string('address', 300);
		    $table->string('city', 20);
		    $table->string('state', 20);
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
		Schema::drop('customer_profiles');
	}

}