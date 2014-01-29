<?php namespace App\Events;

use App\Models\ServiceMaster;

use Sentry;

class InsertServiceMasterEvent {
 
    public function handle($booking)
    {
        $service = new ServiceMaster;
        $service->booking_id = $booking->id;
        $service->user_id = Sentry::getUser()->id;
        $service->start_date = $booking->raw_servicedate();
        var_dump($booking->raw_servicedate());
        $service->save();
    }
}