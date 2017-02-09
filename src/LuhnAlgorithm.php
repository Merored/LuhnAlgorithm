<?php  namespace LuhnAlgorithm;

use InvalidArgumentException;


class LuhnAlgorithm {

	protected $number;
	protected $checkDigitBase;


	public function __construct($number = null){
		$this->number = $number;
	}


	public function checkNumber() {
		$this->checkException();


		$this->parseNumber();
		$checkDigitGenerated = $this->generateCheckDigit($this->number);
		
		return $checkDigitGenerated == $this->checkDigitBase;
	}


	public function getCheckDigit() {
		$this->checkException();

 		$checkDigitGenerated = $this->generateCheckDigit($this->number);
 		return $checkDigitGenerated;		
	}





	public function setNumber($number) {

		$this->number = $number;
		$this->checkException();

	}


	private function checkException() {

		if ( ! (is_string($this->number)) || ($this->number == null) ) {
			throw new InvalidArgumentException;
		}
	}

	private function parseNumber() {

		$this->checkDigitBase = $this->number[strlen($this->number) -1];
		$this->number = substr($this->number, 0, - 1);
	}



	private function generateCheckDigit() {

		$checkDigitGenerated = 10 - ($this->generateHashSumm() % 10);
		if ($checkDigitGenerated == 10) {
			$checkDigitGenerated = 0;
		}

		return $checkDigitGenerated;
	}

	private function generateHashSumm() {

		$lengthOfBaseString = strlen($this->number);
		$hashSumm = 0;	

		for ($i = 1; $i < $lengthOfBaseString - 1; $i++) {

			$num  =  $this->number[$lengthOfBaseString - $i]; 
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
