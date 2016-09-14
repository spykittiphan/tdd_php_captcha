<?
class Captcha
{
	function __construct($pattern, $left, $operator, $right)
	{
		$this->left = OperandFactory::createLeft($pattern,$left);
		$this->right = OperandFactory::createRight($pattern,$right);
		$this->operator = new Operator($operator);
	}
	
	function operator()
	{
		return $this->operator;
	}

	function left(){
		return $this->left;
	}

	function right(){
		return $this->right;
	}

	function toString() {
		return $this->left()->toString().' '.$this->operator->toString().' '.$this->right()->toString();
	}

}
?>