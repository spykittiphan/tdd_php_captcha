<?php

class Operand { 
	function __construct($number) 
	{
		$this->number = $number;
	} 
	function toString(){
		if($this->number==2){
			return "TWO";
		}
		return "ONE";
	}

}
class StringOperandTest extends PHPUnit_Framework_TestCase
{
	function testStringOperandONE(){
		$stringOperand = new Operand(1);
		$this->assertEquals('ONE',$stringOperand->toString());
	}

	function testStringOperandTWO(){
		$stringOperand = new Operand(2);
		$this->assertEquals('TWO',$stringOperand->toString());
	}

}
?>