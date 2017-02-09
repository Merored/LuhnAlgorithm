<?php  namespace LuhnAlgorithm;

use InvalidArgumentException;


class LuhnAlgorithm {

	protected $strNumber;

	public function numberSetter($number){

		if (!is_string($number)) {
			throw new InvalidArgumentException;
		}
		$this->strNumber = $number;

	}

	private function checkHashLuhn() {
		$N = strlen($this->strNumber);
		$summ = 0;	
		for ($i = 1; $i < $N-1; $i++) {
			$num  =  $this->strNumber[$N - $i]; 
			if ($i % 2 == 0) {
				$num = $num * 2;
				if ($num > 9) {
					$num = $num - 9;
				}

			}

			$summ += $num;
		}


		$summ = 10 - ($summ % 10);
		if ($summ == 10) {
			$summ = 0;
		}
		return $summ;
	
	}




	public function checkLuhn() {

		$Hash = $this->strNumber[strlen($this->strNumber) - 1]	;
		$this->strNumber  = substr($this->strNumber, 0, -1);
		$summ = $this->checkHashLuhn($this->strNumber);
		if ($summ == $Hash) {
			return true;
		}
		return false;
	}





	public function getLuhn() {

 		$summ = $this->checkHashLuhn($this->strNumber);
 		return $summ;		
	}
}
