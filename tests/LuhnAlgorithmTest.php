<?php

class LuhnAlgorithmTest extends PHPUnit\Framework\TestCase
{

	protected $luhnAlgorithm;
	
	protected function setUp() {
		$this->luhnAlgorithm = new LuhnAlgorithm\LuhnAlgorithm;
	}


	public function testCheckThrowsException() {
		$this->expectException(InvalidArgumentException::class);	
		$this->luhnAlgorithm->setNumber(1);
	}

		public function testCheckThrowsExceptionIfNotNumber() {
		$this->expectException(InvalidArgumentException::class);	
		$this->assertTrue( $this->luhnAlgorithm->checkNumber()); 
	}

	public function testCheckReturnsCorrectAnswer() {
		$this->luhnAlgorithm->setNumber("4561261212345467");
		$this->assertTrue( $this->luhnAlgorithm->checkNumber()); 
	}


	public function testGenerateReturnsCorrectAnswer() {
		$this->luhnAlgorithm->setNumber("456126121234546");
		$this->assertEquals("7", $this->luhnAlgorithm->getCheckDigit()); 
	}

	

}