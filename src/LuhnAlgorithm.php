<?php  namespace LuhnAlgorithm;

use InvalidArgumentException;


class LuhnAlgorithm {

	protected $number;
	protected $checkDigitBase;

	protected $template;
	protected $numbersForTemplate;


	public function __construct($numberOrTemplate = null){
		$this->number = $numberOrTemplate;
		$this->template = $numberOrTemplate;
		$this->numbersForTemplate = '';
	}


	public function checkNumber() {
		$this->checkNumberException();


		$this->parseNumber();
		$checkDigitGenerated = $this->generateCheckDigit($this->number);
		
		return $checkDigitGenerated == $this->checkDigitBase;
	}


	public function getCheckDigit() {
		$this->checkNumberException();

 		$checkDigitGenerated = $this->generateCheckDigit($this->number);
 		return $checkDigitGenerated;		
	}










	public function generateValidNumbersFromTemplate() {
		$this->numbersForTemplate = $this->generateNumbersFromTemplate();
		$arrayOfAllNumbersFromTemplate = $this->setNumberInTemplate();
		return $this->checkArrayOfNumbersFromTemplate($arrayOfAllNumbersFromTemplate);

	}









	public function setNumber($number) {

		$this->number = $number;
		$this->checkNumberException();

	}

	public function setTemplate($template) {

		$this->template = $template;
		$this->checkTemplateException();
	}









	private function checkNumberException() {

		if ( ! (is_string($this->number)) || ($this->number == null) || ( ! is_numeric($this->number))) {
			throw new InvalidArgumentException;
		}
	}

	private function checkTemplateException() {

		if ( ! (is_string($this->template)) || ($this->template == null)) {
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






	private function generateNumbersFromTemplate() {

		$pullSize = 0;
		for ($i = 0; $i < strlen($this->template); $i++){
			if (! is_numeric($this->template[$i])) {
				$pullSize++;
			}
		}
		return $this->generateArrayOfNubersForTemplate($pullSize);
	}

	private function generateArrayOfNubersForTemplate($pullSize) {
		for ($i=0; $i<=(10**$pullSize - 1); $i++) { 
			
			$array[] = sprintf("%0".$pullSize."u",$i); 
			}
		return $array;
	}


	private function setNumberInTemplate() {
		for ($i = 0; $i < sizeof($this->numbersForTemplate); $i++) {
			$numOfX = 0; $localTemplate = $this->template;
			for ($j = 0; $j < strlen($localTemplate); $j++){
				if ( ! is_numeric($localTemplate[$j])) {
					$localTemplate[$j] = $this->numbersForTemplate[$i][$numOfX];
					$numOfX++;
				}
			}
			$arrayOfNumbersFromTemplate[] = $localTemplate;
		}
		return $arrayOfNumbersFromTemplate;
	}


	private function checkArrayOfNumbersFromTemplate($arrayOfAllNumbersFromTemplate) {
		for ($i = 0; $i < sizeof($arrayOfAllNumbersFromTemplate); $i++) {
			$this->setNumber($arrayOfAllNumbersFromTemplate[$i]);
			if ($this->checkNumber()) {
				$arrayOfValidNumbersfromTemplate[] = $arrayOfAllNumbersFromTemplate[$i];
			}
		}
		return $arrayOfValidNumbersfromTemplate;
	}


}
