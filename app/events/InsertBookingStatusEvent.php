class InsertBookingStatusEvent {
 
    CONST EVENT = 'status.update';
 
    public function handle($data)
    {
        $redis = Redis::connection();
        $redis->publish(self::CHANNEL, $data);
    }
}