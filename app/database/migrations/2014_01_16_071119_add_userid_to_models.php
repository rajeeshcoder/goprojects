<?php

use Illuminate\Database\Migrations\Migration;

class AddUseridToModels extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('models', function($table) {
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
		 Schema::table('models', function($table)
        {
            $table->dropColumn('title');
        });
	}

}