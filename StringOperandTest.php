<?php
class Operand {
	function toString(){
		return "ONE";
	}
}
class StringOperandTest extends PHPUnit_Framework_TestCase
{
	function testStringOperand(){
		$stringOperand = new Operand(1);
		$this->assertEquals('ONE',$stringOperand->toString());
	}
}
?>