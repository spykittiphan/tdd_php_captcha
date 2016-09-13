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


class IntegerOperandTest extends PHPUnit_Framework_TestCase 
{
	function testShouldBeOne(){
		$operand = new IntegerOperand(1);
		$this->assertEquals("1",$operand->toString()); 
	}

	function testShouldBeNine()
	{
		$operand = new IntegerOperand(9);
		$this->assertEquals("9",$operand->toString());
	}
}

