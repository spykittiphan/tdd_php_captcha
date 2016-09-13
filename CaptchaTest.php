<?php
class Captcha
{
	function __construct($pattern, $left, $operator, $right)
	{
		$this->left = $left;
		$this->operator = $operator;
	}
	
	function operator()
	{
		if($this->operator==2)
		{
			return "-";
		}else if($this->operator == 1) {
			return "+";
		}
		
	}	

	function left()
	{
		$_left =[1=>"ONE",2=>"TWO",3=>"THREE",4="FOUR",5="FIVE",6=>"SIX",7=>"SEVEN",8=>"EIGHT",9=>"NINE"];
		
		return $_left[$this->left];
	}
}

class CaptchaTest extends PHPUnit_Framework_TestCase 
{
	private $DUMMY_PATTERN = 1;
	private $DUMMY_OPERATOR = 1;
	private $DUMMY_RIGHT = 1;

	function testOperatorShouldBeMinus()
	{
		$captcha = new Captcha(1,1,2,1);
		$this->assertEquals("-",$captcha->operator());
	}

	function testOperatorShouldBePlus()
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