<?php
 
class ModelTableSeeder extends Seeder {
 
  public function run()
  {
  		$models = [
  			['title' => 'Palio', 'manufacturer_id' => 2],
  			['title' => 'Punto' , 'manufacturer_id' => 2], 
  			['title' => 'Linea' , 'manufacturer_id' => 2],
  			['title' => 'Swift', 'manufacturer_id' => 1],
  			['title' => 'Alto', 'manufacturer_id' => 1],
  			['title' => 'SX4', 'manufacturer_id' => 1]
  		];
  
  		DB::table('models')->insert($models);
  }
 
}