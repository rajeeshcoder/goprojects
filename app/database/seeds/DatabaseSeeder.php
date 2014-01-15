<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//$this->call('ManufacturerTableSeeder');
		//$this->call('ModelTableSeeder');
		//$this->call('DealerTableSeeder');
		//$this->call('ServiceCenterTableSeeder');
		$this->call('SentrySeeder');
	}

}