<?php
class OperandFactory{
	static function createLeft($pattern,$left)
	{
		if($pattern==2)
		{
			return new IntegerOperand($left);
		}
		return new StringOperand($left);
	}

	static function createRight($pattern,$right){
		if($pattern==2){
			return new StringOperand($right);
		}
		return new IntegerOperand($right);
	}
}
?>