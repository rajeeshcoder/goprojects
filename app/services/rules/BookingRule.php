<?php namespace App\Services\Rules;
use Carbon\Carbon;

abstract class BookingRule {

	protected $rule;
	protected $rule_timing;

	function __construct($rule=null, $rule_timing=null) {

		$this->rule = $rule;
		$this->rule_timing = $rule_timing;
	} 

	private function getRule() {
		return $this->rule;
	}

 	private function getRuleValues($rulevalue) {
 		if (array_key_exists($rulevalue, $this->rule)) {
 			return $this->rule["$rulevalue"];
 		}
 	}

 	public function findEligibility($servicedate, $rulevalue = "pending") {

 		$rule_values  = $this->getRuleValues($rulevalue);
 		$hour_diff = $this->findHourDiff($servicedate);

 		if ($rule_values) {
	 		foreach($rule_values as $rule) {
	 			$rule_due = $this->rule_timing["$rule"];
	 			if ($hour_diff < $rule_due) {
	 				$idx = array_search("$rule", $rule_values);
	 				unset($rule_values[$idx]);
	 			} 
	 		}
	 		return $rule_values;
	 	}	
 	} 


 	private function findHourDiff($servicedate) {
 		$current_time = Carbon::now('Asia/Calcutta'); //Current Time with Timezone
 		$service_date = Carbon::createFromFormat('d-m-Y H:i:s', $servicedate, 'Asia/Calcutta'); //Service date with timezone
 		//return $current_time . "<BR>" .  $service_date;
 		return $current_time->diffInHours($service_date, false); //find the difference in hours

 	}

 	public function getUserObject() {
 		return $this->user_object;
 	}

}