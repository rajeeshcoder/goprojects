<?php namespace App\Services\Rules;

class DealerServiceRule extends ServiceRule {
	
	private $user_object;

	//The main rule. This needs to be specified.
	//time based rule is still pending.
	protected $rule = array("pickup-source"    => array("started"), 
							"started"          => array("finished"),
							"finished"         => array("payment-due"),
							"payment-due"      => array("payment-complete"),
							"payment-complete" => array("feedback"),
							"feedback"         => array("completed")
							);
	function __construct()
    {
        parent::__construct($this->rule);
        $this->user_object = "dealer";
    }

}