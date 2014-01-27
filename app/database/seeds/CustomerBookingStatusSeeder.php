<?php

use Illuminate\Database\Migrations\Migration;

class CustomerBookingStatusSeeder extends Seeder {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function run()
	{
        $customer_bookings_status =               array(
                                array(
                                        'title' => 'pending',
                                        'owner'  => 'dealer_customer'
                                ),
                                array(
                                        'title' => 'modify',
                                        'owner'  => 'dealer_customer'
                                ),
                                array(
                                       'title' => 'cancel',
                                        'owner'  => 'dealer_customer'
                                ),
                                array(
                                       'title' => 'approve',
                                        'owner'  => 'dealer'
                                ),
                                array(
                                       'title' => 'confirm',
                                        'owner'  => 'customer'
                                ),
                             
                       );
	   DB::table('customer_bookings_status')->insert($customer_bookings_status);

    }

}