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
			default:
				return "/";
				break;
		}
	
	}

}

class OperatorTest extends PHPUnit_Framework_TestCase 
{
	function testOperatorShoudBePlus()
	{
		$operator = new Operator(1);
		$this->assertEquals("+",$operator->toString());
	}

	function testOperatorShouldBeMultiply()
	{
		$operator =new Operator(2);
		$this->assertEquals("*",$operator->toString());
	}
}