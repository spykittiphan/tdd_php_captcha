<?php

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