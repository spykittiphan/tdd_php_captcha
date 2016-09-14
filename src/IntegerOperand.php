<?php
class IntegerOperand{

	function __construct($value)
	{
		$this->value = $value;
	}

	function toString(){
		return $this->value;
	}
}
?>