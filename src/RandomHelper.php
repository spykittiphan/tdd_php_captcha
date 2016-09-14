<?php
	class RandomHelper 
	{
		function randomPattern(){
			$pattern = rand(1,2);
			return $pattern;
		}
		function randomValue(){
			$value = rand(1,9);
			return $value;
		}
		function randomOperator(){
			$operator = rand(1,4);
			return $operator;
		}
	}
?>