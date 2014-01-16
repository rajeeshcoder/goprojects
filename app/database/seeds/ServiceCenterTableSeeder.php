<?php
 
class ServiceCenterTableSeeder extends Seeder {
 
  public function run()
  {
  		$service_center = [
  			['title' => 'Hosur Road', 'dealer_id' => 1],
  			['title' => 'Mahadevapura' , 'dealer_id' => 2], 
  			['title' => 'Whitefield' , 'dealer_id' => 4],
  			['title' => 'Marathahalli', 'dealer_id' => 3],
  		
  		];
  
  		DB::table('service_centers')->insert($service_center);
  }
 
}