<?php  namespace LuhnAlgorithm;

use InvalidArgumentException;

class LuhnAlgorithm {
	private function checkHashLuhn($str_number) {
		$i = 1;

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
		$summ = 0;
		for ($i = 0; $i < strlen($str_number); $i++) {
			$summ += $str_number[$i];

		}
		return $summ;
			
	}




	public function checkLuhn($str_number) {
		$luhnAlgorithm = new LuhnAlgorithm;

		if (!is_string($str_number)) {
			throw new InvalidArgumentException;
		}


		$summ = $luhnAlgorithm->checkHashLuhn($str_number);
		if ($summ % 10 == 0) {
			return "true";
		}
		return "false";
	}





	public function getLuhn($str_number) {
		$luhnAlgorithm = new LuhnAlgorithm;
		
		if (!is_string($str_number)) {
			throw new InvalidArgumentException;
		}


		$summ = $luhnAlgorithm->checkHashLuhn($str_number);
		$summ = 10 - ($summ % 10);
		if ($summ == 10) {
			$summ = 0;
		}
		$summ = $str_number[strlen($str_number)-1] + $summ;		

		return $summ;		
	}
}
