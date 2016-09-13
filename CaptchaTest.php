<?php
require "OperatorTest.php";
require "StringOperandTest.php";
require "IntegerOperandTest.php";
class Captcha
{
	private $NUMBER_TO_TEXT = [1=>"ONE",2=>"TWO",3=>"THREE",4=>"FOUR",5=>"FIVE",6=>"SIX",7=>"SEVEN",8=>"EIGHT",9=>"NINE"];
	function __construct($pattern, $left, $operator, $right)
	{
		$this->left = $this->createLeft($pattern,$left);
		$this->right = $right;
		$this->pattern = $pattern;
		$this->operator = new Operator($operator);
	}
	
	function operator()
	{
		return $this->operator;
	}

	function left(){
		return $this->left;
	}

	function createLeft($pattern,$left)
	{
		if($pattern==2)
		{
			return new IntegerOperand($left);
		}
		return new StringOperand($left);
	}

	function right(){
		if($this->pattern==2){
			return new StringOperand($this->right);
		}
		return new IntegerOperand($this->right);
	}

	function toString() {
		return $this->left()->toString().' '.$this->operator->toString().' '.$this->right()->toString();
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
		$this->assertEquals("NINE",$captcha->right()->toString());
	}

	function testSecondPatterRightSecondShouldBeOne()
	{
		$captcha = new Captcha(2,1,1,1);
		$this->assertEquals("ONE",$captcha->right()->toString());
	}

	function testSecondPatternLeftShouldBeNine(){
		$captcha = new Captcha(2,9,1,1);
		$this->assertEquals('9',$captcha->left()->toString());
	}

	function testSecondPatternLeftShouldBeOne(){
		$captcha = new Captcha(2,1,1,1);
		$this->assertEquals('1', $captcha->left()->toString());
	}

	function testRightShouldBeFive() {
		$captcha = new Captcha($this->DUMMY_PATTERN,$this->DUMMY_LEFT,$this->DUMMY_OPERATOR,5);
		$this->assertEquals('5', $captcha->right()->toString());
	}

	function testRightShouldBeNine() {
		$captcha = new Captcha($this->DUMMY_PATTERN,$this->DUMMY_LEFT,$this->DUMMY_OPERATOR,9);
		$this->assertEquals("9", $captcha->right()->toString());
	}

	function testRightShouldBeONE(){
		$captcha=new Captcha($this->DUMMY_PATTERN,$this->DUMMY_LEFT,$this->DUMMY_OPERATOR,1);
		$this->assertEquals("1",$captcha->right()->toString());
	}

	function testLeftShouldBeONE() 
	{

		$captcha = new Captcha($this->DUMMY_PATTERN, 1, $this->DUMMY_OPERATOR, 
			$this->DUMMY_RIGHT);
		$this->assertEquals("ONE", $captcha->left()->toString());
	}

	function testLeftShouldBeTWO() 
	{
		$captcha = new Captcha($this->DUMMY_PATTERN, 2, $this->DUMMY_OPERATOR, $this->DUMMY_RIGHT);
		$this->assertEquals("TWO", $captcha->left()->toString());
	}


}