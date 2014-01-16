<?php

use Illuminate\Database\Migrations\Migration;

class AddUseridToDealers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dealers', function($table) {
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
		Schema::table('dealers', function($table)
        {
            $table->dropColumn('user_id');
        });
	}

}