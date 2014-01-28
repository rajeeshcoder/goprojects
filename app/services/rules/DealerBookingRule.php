<?php namespace App\Services\Rules;

class DealerBookingRule extends BookingRule {
	
	private $user_object;

	//The main rule. This needs to be specified.
	//time based rule is still pending.
	protected $rule = array("pending" => array("cancel", "modify", "approve"), 
							"modify"  => array("cancel", "modify", "approve"),
							"confirm" => NULL,
							"approve" => NULL,
							"cancel"  => NULL
							);
	protected $rule_timing = array( "cancel"  => "12", 
									"modify"  => "24", 
									"approve" => "8" ,
									);

	function __construct()
    {
        parent::__construct($this->rule, $this->rule_timing);
        $this->user_object = "dealer";
    }

}