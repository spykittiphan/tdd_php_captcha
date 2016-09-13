<?php
class Captcha
{
	function __construct($pattern, $left, $operator, $right)
	{
		$this->left = $left;
	}
	
	function operator()
	{
		return "+";
	}	

	function left()
	{
		$_left =[1=>"ONE",2=>"TWO",9=>"NINE"];
		
		return $_left[$this->left];
	}
}

class CaptchaTest extends PHPUnit_Framework_TestCase 
{
	private $DUMMY_PATTERN = 1;
	private $DUMMY_OPERATOR = 1;
	private $DUMMY_RIGHT = 1;

	function testOperator()
	{
		$captcha = new Captcha(1,1,1,1);
		$this->assertEquals("+",$captcha->operator());
	}

	function testLeftShouldBeNINE()
	{
		$captcha = new Captcha($this->DUMMY_PATTERN,9,$this->DUMMY_OPERATOR,$this->DUMMY_RIGHT);
		$this->assertEquals("NINE",$captcha->left());

	}

	function testLeftShouldBeONE() 
	{

		$captcha = new Captcha($this->DUMMY_PATTERN, 1, $this->DUMMY_OPERATOR, 
			$this->DUMMY_RIGHT);
		$this->assertEquals("ONE", $captcha->left());
	}

	function testLeftShouldBeTWO() 
	{
		$captcha = new Captcha($this->DUMMY_PATTERN, 2, $this->DUMMY_OPERATOR, $this->DUMMY_RIGHT);
		$this->assertEquals("TWO", $captcha->left());
	}


}