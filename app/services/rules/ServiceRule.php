<?php namespace App\Services\Rules;
use Carbon\Carbon;

abstract class ServiceRule {

	protected $rule;

	function __construct($rule=null, $rule_timing=null) {

		$this->rule = $rule;
	} 

	private function getRule() {
		return $this->rule;
	}

 	public function getRuleValue($rulevalue = "pickup-source") {
 		if (array_key_exists($rulevalue, $this->rule)) {
 			return $this->rule["$rulevalue"];
 		}
 	}

 	public function getUserObject() {
 		return $this->user_object;
 	}

}