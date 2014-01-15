<?php
 
class DealerTableSeeder extends Seeder {
 
  public function run()
  {
  		$dealer = [
  			['title' => 'Tekno', 'manufacturer_id' => 3],
  			['title' => 'Bimal' , 'manufacturer_id' => 1], 
  			['title' => 'Pratham' , 'manufacturer_id' => 1],
  			['title' => 'KHT', 'manufacturer_id' => 3],
  		];
  
  		DB::table('dealers')->insert($dealer);
  }
 
}