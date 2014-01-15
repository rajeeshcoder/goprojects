<?php
 
class ManufacturerTableSeeder extends Seeder {
 
  public function run()
  {
  		$manufacturers = [
  			['title' => 'Maruti'],
        ['title' => 'Hyundai'],
  			['title' => 'Fiat'],
  			['title' => 'Chevorlet'],
  			['title' => 'Tata'],
  			['title' => 'Renault']
  		];
  
  		DB::table('manufacturers')->insert($manufacturers);
  }
 
}