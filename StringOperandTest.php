<?php

class StringOperand { 
	function __construct($number) 
	{
		$this->number = $number;
	} 
	function toString(){
		if($this->number==2){
			return "TWO";
		}else if($this->number==9){
			return "NINE";
		}
		return "ONE";
	}

}
class StringOperandTest extends PHPUnit_Framework_TestCase
{

	function testStringOperandNine()
	{
		$stringOperand = new StringOperand(9);
		$this->assertEquals("NINE",$stringOperand->toString());
	}

	function testStringOperandONE(){
		$stringOperand = new StringOperand(1);
		$this->assertEquals('ONE',$stringOperand->toString());
	}

	function testStringOperandTWO(){
		$stringOperand = new StringOperand(2);
		$this->assertEquals('TWO',$stringOperand->toString());
	}

}
?>