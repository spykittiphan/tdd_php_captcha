<?php
class Captcha
{
	function __construct($pattern, $left, $operator, $right)
	{
		$this->left = $left;
		$this->operator = $operator;
		$this->right = $right;
		$this->pattern = $pattern;

	}
	
	function operator()
	{
		$_operator = [1=>"+",2=>"-",3=>"*",4=>"/"];
		return $_operator[$this->operator];
		
	}	

	function left()
	{
		$_left =[1=>"ONE",2=>"TWO",3=>"THREE",4=>"FOUR",5=>"FIVE",6=>"SIX",7=>"SEVEN",8=>"EIGHT",9=>"NINE"];
		if($this->pattern==2)
		{
			return $this->left;
		}
		//return 1;
		return $_left[$this->left];
	}

	function right(){
		return $this->right;
	}
}

class CaptchaTest extends PHPUnit_Framework_TestCase 
{
	private $DUMMY_PATTERN = 1;
	private $DUMMY_OPERATOR = 1;
	private $DUMMY_RIGHT = 1;
	private $DUMMY_LEFT = 1;

	function testLeftSecondShouldBeNine(){
		$captcha = new Captcha(2,9,1,1);
		$this->assertEquals('9',$captcha->left());
	}

	function testSecondShouldBeOne(){
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

	function testOperatorShouldBeMultiply(){
		$captcha = new Captcha($this->DUMMY_PATTERN,$this->DUMMY_LEFT,3,$this->DUMMY_RIGHT);
		$this->assertEquals("*",$captcha->operator());
	}

	function testOperatorShouldBeMinus()
	{
		$captcha = new Captcha($this->DUMMY_PATTERN,$this->DUMMY_LEFT,2,$this->DUMMY_RIGHT);
		$this->assertEquals("-",$captcha->operator());
	}

	function testOperatorShouldBePlus()
	{
		$captcha = new Captcha($this->DUMMY_PATTERN,$this->DUMMY_LEFT,1,$this->DUMMY_RIGHT);
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