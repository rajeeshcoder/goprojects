<?php

use Illuminate\Database\Migrations\Migration;

class AddTitleToCustomerProfile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customer_profiles', function($table) {
			$table->string('title');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('customer_profiles', function($table)
        {
            $table->dropColumn('title');
        });
	}

}