<?php  namespace LuhnAlgorithm;

use InvalidArgumentException;


class LuhnAlgorithm {
	private function checkHashLuhn($strNumber) {
		$N = strlen($strNumber);
		$summ = 0;	
		for ($i = 1; $i < $N-1; $i++) {
			$num  =  $strNumber[$N - $i]; 
			if ($i % 2 == 0) {
				$num = $num * 2;
				if ($num > 9) {
					$num = $num - 9;
				}

			}

			$summ += $num;
			$sum = $summ;
		}


		$summ = 10 - ($summ % 10);
		if ($summ == 10) {
			$summ = 0;
		}
		return $summ;
	
	}




	public function checkLuhn($strNumber) {

		if (!is_string($strNumber)) {
			throw new InvalidArgumentException;
		}

		$Hash = $strNumber[strlen($strNumber) - 1]	;
		$strNumber  = substr($strNumber, 0, -1);
		$summ = $this->checkHashLuhn($strNumber);
		if ($summ == $Hash) {
			return true;
		}
		return false;
	}





	public function getLuhn($strNumber) {
		
		
		if (!is_string($strNumber)) {
			throw new InvalidArgumentException;
		}


 		$summ = $this->checkHashLuhn($strNumber);
 		return $summ;		
	}
}
