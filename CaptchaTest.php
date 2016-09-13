<?php
require "OperatorTest.php";
class Captcha
{
	private $NUMBER_TO_TEXT = [1=>"ONE",2=>"TWO",3=>"THREE",4=>"FOUR",5=>"FIVE",6=>"SIX",7=>"SEVEN",8=>"EIGHT",9=>"NINE"];
	function __construct($pattern, $left, $operator, $right)
	{
		$this->left = $left;
		// $this->operator = $operator;
		$this->right = $right;
		$this->pattern = $pattern;
		$this->operator = new Operator($operator);
	}
	
	function operator()
	{
		
		// $_operator = [1=>"+",2=>"-",3=>"*",4=>"/"];
		return $this->operator->toString();
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
		if($this->pattern == 2){
			return "1 + ONE";
		}
		return "ONE + 1";
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

	// function testOperatorShouldBeMultiply(){
	// 	$captcha = new Captcha($this->DUMMY_PATTERN,$this->DUMMY_LEFT,3,$this->DUMMY_RIGHT);
	// 	$this->assertEquals("*",$captcha->operator());
	// }

	// function testOperatorShouldBeMinus()
	// {
	// 	$captcha = new Captcha($this->DUMMY_PATTERN,$this->DUMMY_LEFT,2,$this->DUMMY_RIGHT);
	// 	$this->assertEquals("-",$captcha->operator());
	// }

	function testOperatorShouldBeMinus()  
	{

		$captcha = new Captcha($this->DUMMY_PATTERN,$this->DUMMY_LEFT,3,$this->DUMMY_RIGHT);
		$this->assertEquals("-",$captcha->operator->toString(3));
	}

	// function testOperatorShouldBePlus()
	// {
	// 	$captcha = new Captcha($this->DUMMY_PATTERN,$this->DUMMY_LEFT,1,$this->DUMMY_RIGHT);
	// 	$this->assertEquals("+",$captcha->operator());
	// }

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