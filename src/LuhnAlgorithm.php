<?php  namespace LuhnAlgorithm;

use InvalidArgumentException;



class LuhnAlgorithm {
	public function checkHashLuhn($str_number) {
		$i = 1;
		if (!is_string($str_number)) {
			throw new InvalidArgumentException;
		}
		if (strlen($str_number) % 2 == 0) {
			$i = 0;
		}

		
		for ($i; $i < strlen($str_number); $i++) {
			$num  =  $str_number[$i] * 2; 

			if ($num > 9) {
				$num = $num - 9;
			}

			$str_number[$i] = $num;
			$i++;  
		}

		
		
		return $str_number;
	}
	public function checkHashLuhnResult($str_number) {
		$luhnAlgorithm = new LuhnAlgorithm;
		$str_number = $luhnAlgorithm->checkHashLuhn ($str_number);
		$summ = 0;
		for ($i = 0; $i < strlen($str_number); $i++) {
			$summ += $str_number[$i];

		}
		return $summ;
	}
}
