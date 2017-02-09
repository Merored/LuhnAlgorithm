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

	private function generateControlNumber() {
		$ltnghOfBaseString = strlen($this->strNumber);
		$hashSumm = 0;	
		for ($i = 1; $i < $ltnghOfBaseString-1; $i++) {
			$num  =  $this->strNumber[$ltnghOfBaseString - $i]; 
			if ($i % 2 == 0) {
				$num = $num * 2;
				if ($num > 9) {
					$num = $num - 9;
				}

			}

			$hashSumm += $num;
		}


		$controlNumbergenerated = 10 - ($hashSumm % 10);
		if ($controlNumbergenerated == 10) {
			$controlNumbergenerated = 0;
		}
		return $controlNumbergenerated;
	
	}




	public function checkNumber() {

		$controlNumberBase = $this->strNumber[strlen($this->strNumber) - 1]	;
		$this->strNumber  = substr($this->strNumber, 0, -1);
		$controlNumbergenerated = $this->generateControlNumber($this->strNumber);
		
		return $controlNumbergenerated == $controlNumberBase;
	}





	public function getControlNumber() {

 		$controlNumbergenerated = $this->generateControlNumber($this->strNumber);
 		return $controlNumbergenerated;		
	}
}
