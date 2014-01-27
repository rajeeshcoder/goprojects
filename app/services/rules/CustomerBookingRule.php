<?php namespace App\Services\Rules;

class CustomerBookingRule extends BookingRule {
	
	private $user_object;

	//The main rule. This needs to be specified.
	//time based rule is still pending.
	protected $rule = array("pending" => array("cancel", "modify"), 
							"modify"  => array("cancel", "modify"),
							"confirm" => NULL,
							"approve" => array("confirm"),
							"cancel"  => NULL
							);
	protected $rule_timing = array( "cancel"  => "12", 
									"modify"  => "24", 
									"confirm" => "12" ,
									);

	function __construct()
    {
        parent::__construct($this->rule, $this->rule_timing);
        $this->user_object = "customer";
    }

}