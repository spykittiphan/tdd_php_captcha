<?php

class Operator
{
	function __construct($type)
	{
		$this->type =  $type;
	}

	function toString(){
		switch ($this->type) {
			case 1:
				return "+";
				break;
			case 2:
				return "*";
				break;
			case 3:
				return "-";
				break;
			case 4:
				return "/";
				break;
		}
	
	}

}
?>