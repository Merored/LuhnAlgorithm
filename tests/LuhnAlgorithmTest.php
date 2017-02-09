<?php

class LuhnAlgorithmTest extends PHPUnit\Framework\TestCase
{

	protected $luhnAlgorithm;
	
	protected function setUp() {
		$this->luhnAlgorithm = new LuhnAlgorithm\LuhnAlgorithm;
	}

	public function testLuhnAlgoritmExists() {
		$this->assertInstanceOf(LuhnAlgorithm\LuhnAlgorithm::class, $this->luhnAlgorithm);
	}

	public function testCheckThrowsException() {
		$this->expectException(InvalidArgumentException::class);	
		$this->luhnAlgorithm->numberSetter(1);
	}

	public function testCheckReturnsCorrectAnswer() {
		$this->luhnAlgorithm->numberSetter("4561261212345467");
		$this->assertTrue( $this->luhnAlgorithm->checkNumber()); 
	}

	public function testGetThrowsException() {
		$this->expectException(InvalidArgumentException::class);	
		$this->luhnAlgorithm->numberSetter(1);
	}

	public function testGetReturnsCorrectAnswer() {
		$this->luhnAlgorithm->numberSetter("456126121234546");
		$this->assertEquals("7", $this->luhnAlgorithm->getControlNumber()); 
	}

	

}