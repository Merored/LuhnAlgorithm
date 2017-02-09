<?php  namespace LuhnAlgorithm;

use InvalidArgumentException;


class LuhnAlgorithm {

	protected $strNumber;
	protected $controlNumberBase;


	public function checkNumber() {
		
		$this->getControlNumberBase();
		$controlNumberGenerated = $this->generateControlNumber($this->strNumber);
		
		return $controlNumberGenerated == $this->controlNumberBase;
	}


	public function getControlNumber() {

 		$controlNumberGenerated = $this->generateControlNumber($this->strNumber);
 		return $controlNumberGenerated;		
	}





	public function numberSetter($number) {

		if ( ! is_string($number)) {
			throw new InvalidArgumentException;
		}
		$this->strNumber = $number;

	}




	private function getControlNumberBase() {

		$this->controlNumberBase = $this->strNumber[strlen($this->strNumber) - 1];
		$this->strNumber = substr($this->strNumber, 0, - 1);
	}



	private function generateControlNumber() {

		$controlNumberGenerated = 10 - ($this->generateHashSumm() % 10);
		if ($controlNumberGenerated == 10) {
			$controlNumberGenerated = 0;
		}

		return $controlNumberGenerated;
	
	}

	private function generateHashSumm() {

		$lengthOfBaseString = strlen($this->strNumber);
		$hashSumm = 0;	

		for ($i = 1; $i < $lengthOfBaseString - 1; $i++) {

			$num  =  $this->strNumber[$lengthOfBaseString - $i]; 
			if ($i % 2 == 0) {
				$num = $num * 2;
				if ($num > 9) {
					$num = $num - 9;
				}
			}

			$hashSumm += $num;
		}

		return $hashSumm;
	}

}
