<?php
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
}

?>