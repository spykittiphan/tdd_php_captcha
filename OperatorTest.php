<?php

class OperatorTest extends PHPUnit_Framework_TestCase 
{
	function testOperatorShouldBeDivider(){
		$operator = new Operator(4);
		$this->assertEquals("/",$operator->toString());
	}
	function testOperatorShouldBeminus(){
		$operator = new Operator(3);
		$this->assertEquals("-",$operator->toString());
	}
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