<?php

use Illuminate\Database\Migrations\Migration;

class AddUserIdToManufacturersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('manufacturers', function($table) {
			$table->integer('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::table('manufacturers', function($table)
        {
            $table->dropColumn('title');
        });
	}

}