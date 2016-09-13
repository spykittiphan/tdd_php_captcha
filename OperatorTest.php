<?php

class Operator
{
	function __construct($type)
	{
		$this->type =  $type;
	}

	function toString(){
		return "+";
	}

}

class OperatorTest extends PHPUnit_Framework_TestCase 
{
	function testOperatorShoudBePlus()
	{
		$operator = new Operator(1);
		$this->assertEquals("+",$operator->toString());
	}
}