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
		$this->luhnAlgorithm->checkLuhn(1);
	}

	public function testCheckReturnsCurrectAwnser() {
		$this->assertEquals("true", $this->luhnAlgorithm->checkLuhn("4561261212345467")); 
	}

	public function testGetThrowsException() {
		$this->expectException(InvalidArgumentException::class);	
		$this->luhnAlgorithm->getLuhn(1);
	}

	public function testGetReturnsCurrectAwnser() {
		$this->assertEquals("7", $this->luhnAlgorithm->getLuhn("4561261212345464")); 
	}

	

}