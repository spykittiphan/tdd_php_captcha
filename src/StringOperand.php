<?php
class StringOperand { 
	private $NUMBER_TO_TEXT = [1=>"ONE",2=>"TWO",3=>"THREE",4=>"FOUR",5=>"FIVE",6=>"SIX",7=>"SEVEN",8=>"EIGHT",9=>"NINE"];

	function __construct($number) 
	{
		$this->number = $number;
	} 
	function toString(){

		return $this->NUMBER_TO_TEXT[$this->number];
	}

}
?>