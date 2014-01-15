<?php
 
class ServiceCenterTableSeeder extends Seeder {
 
  public function run()
  {
  		$service_center = [
  			['title' => 'Hosur Road', 'manufacturer_id' => 1],
  			['title' => 'Mahadevapura' , 'manufacturer_id' => 2], 
  			['title' => 'Whitefield' , 'manufacturer_id' => 4],
  			['title' => 'Marathahalli', 'manufacturer_id' => 3],
  		
  		];
  
  		DB::table('models')->insert($service_center);
  }
 
}