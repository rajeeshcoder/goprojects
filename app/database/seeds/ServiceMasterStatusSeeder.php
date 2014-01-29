<?php

use Illuminate\Database\Migrations\Migration;

class ServiceMasterStatusSeeder extends Seeder {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function run()
	{
        $service_master_status =  array(
                                array(
                                        'title' => 'pickup-source',
                                        'owner'  => 'dealer'
                                ),
                                array(
                                        'title' => 'started',
                                        'owner'  => 'dealer'
                                ),
                                array(
                                       'title' => 'finished',
                                        'owner'  => 'dealer'
                                ),
                                array(
                                       'title' => 'payment-due',
                                        'owner'  => 'dealer'
                                ),
                                array(
                                       'title' => 'payment-complete',
                                        'owner'  => 'dealer'
                                ),
                                array(
                                       'title' => 'pickup-delivery',
                                        'owner'  => 'dealer'
                                ),
                                array(
                                       'title' => 'feedback',
                                        'owner'  => 'dealer'
                                ),
                                array(
                                       'title' => 'completed',
                                        'owner'  => 'dealer'
                                ),
                       );
	   DB::table('service_master_status')->insert($service_master_status);

    }

}