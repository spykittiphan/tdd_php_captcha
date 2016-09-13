<?php
require "OperatorTest.php";
class Captcha
{
	
	function __construct($pattern, $left, $operator, $right)
	{
		$this->left = $left;
		$this->right = $right;
		$this->pattern = $pattern;
		$this->operator = new Operator($operator);
	}
	
	function operator()
	{
		return $this->operator;
	}	

	function left()
	{
		if($this->pattern==2)
		{
			return $this->left;
		}
		return $this->NUMBER_TO_TEXT[$this->left];
	}

	function right(){
		if($this->pattern==2){
			return $this->NUMBER_TO_TEXT[$this->right];
		}
		return $this->right;
	}

	function toString() {
		return $this->left().' '.$this->operator->toString().' '.$this->right();
	}

}


class CaptchaTest extends PHPUnit_Framework_TestCase 
{
	private $DUMMY_PATTERN = 1;
	private $DUMMY_OPERATOR = 1;
	private $DUMMY_RIGHT = 1;
	private $DUMMY_LEFT = 1;

	function testCaptchaPatternTwoToString() 
	{
		$captcha = new Captcha(2,1,1,1);
		$this->assertEquals("1 + ONE", $captcha->toString());
	}

	function testCaptchaToString() 
	{
		$captcha = new Captcha(1,1,1,1);
		$this->assertEquals("ONE + 1", $captcha->toString());
	}

	function testSecondPatternRightSecondShouldBeNine()
	{
		$captcha = new Captcha(2,1,1,9);
		$this->assertEquals("NINE",$captcha->right());
	}

	function testSecondPatterRightSecondShouldBeOne()
	{
		$captcha = new Captcha(2,1,1,1);
		$this->assertEquals("ONE",$captcha->right());
	}

	function testSecondPatternLeftShouldBeNine(){
		$captcha = new Captcha(2,9,1,1);
		$this->assertEquals('9',$captcha->left());
	}

	function testSecondPatternLeftShouldBeOne(){
		$captcha = new Captcha(2,1,1,1);
		$this->assertEquals('1', $captcha->left());
	}

	function testRightShouldBeFive() {
		$captcha = new Captcha($this->DUMMY_PATTERN,$this->DUMMY_LEFT,$this->DUMMY_OPERATOR,5);
		$this->assertEquals('5', $captcha->right());
	}

	function testRightShouldBeNine() {
		$captcha = new Captcha($this->DUMMY_PATTERN,$this->DUMMY_LEFT,$this->DUMMY_OPERATOR,9);
		$this->assertEquals("9", $captcha->right());
	}

	function testRightShouldBeONE(){
		$captcha=new Captcha($this->DUMMY_PATTERN,$this->DUMMY_LEFT,$this->DUMMY_OPERATOR,1);
		$this->assertEquals("1",$captcha->right());
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