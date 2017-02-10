<?php

class LuhnAlgorithmTest extends PHPUnit\Framework\TestCase
{

	protected $luhnAlgorithm;
	
	protected function setUp() {
		$this->luhnAlgorithm = new LuhnAlgorithm\LuhnAlgorithm;
	}


	public function testSetterThrowsException() {
		$this->expectException(InvalidArgumentException::class);	
		$this->luhnAlgorithm->setNumber(1);
		$this->luhnAlgorithm->setTemolate(1);
	}

	public function testCheckThrowsExceptionIfNotNumber() {
		$this->expectException(InvalidArgumentException::class);	
		$this->assertTrue( $this->luhnAlgorithm->checkNumber()); 
		$this->assertEquals("7", $this->luhnAlgorithm->getCheckDigit()); 
	}

	public function testCheckReturnsCorrectAnswer() {
		$this->luhnAlgorithm->setNumber("4561261212345467");
		$this->assertTrue($this->luhnAlgorithm->checkNumber()); 
		$this->luhnAlgorithm->setNumber("45612612123454");
		$this->assertTrue($this->luhnAlgorithm->checkNumber());
		$this->luhnAlgorithm->setNumber("4561261212345");
		$this->assertFalse($this->luhnAlgorithm->checkNumber());
		$this->luhnAlgorithm->setNumber("45612612123");
		$this->assertFalse($this->luhnAlgorithm->checkNumber());
	}


	public function testGenerateReturnsCorrectAnswer() {
		$this->luhnAlgorithm->setNumber("456126121234546");
		$this->assertEquals("7", $this->luhnAlgorithm->getCheckDigit()); 
		$this->luhnAlgorithm->setNumber("456126121234");
		$this->assertEquals("1", $this->luhnAlgorithm->getCheckDigit());
		$this->luhnAlgorithm->setNumber("65466465");
		$this->assertEquals("5", $this->luhnAlgorithm->getCheckDigit());
		$this->luhnAlgorithm->setNumber("78899253232632556");
		$this->assertEquals("2", $this->luhnAlgorithm->getCheckDigit());
	}

	public function testNumberSetterThrowsExceptionIfTemplate() {
		$this->expectException(InvalidArgumentException::class);	
		$this->luhnAlgorithm->setNumber("1234-+ES55");
	}



	public function testGenerateValidNumbersFromTemplateReturnArray() {
		$this->luhnAlgorithm->setTemplate("4561261212345467");
		$this->assertEquals(["4561261212345467"],$this->luhnAlgorithm->generateValidNumbersFromTemplate()); 
		$this->luhnAlgorithm->setTemplate("124X5");
		$this->assertEquals(["12435"],$this->luhnAlgorithm->generateValidNumbersFromTemplate()); 
	}



}