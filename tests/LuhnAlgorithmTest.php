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

	public function testItThrowsException() {
		$this->expectException(InvalidArgumentException::class);	
		$this->luhnAlgorithm->checkHashLuhn(1);
	}

	public function testItReturnsCurrectStringAfterDoubleIfEven() {
		$this->assertEquals("2264", $this->luhnAlgorithm->checkHashLuhn("1234")); 
	}

	public function testItReturnsCurrectStringAfterDoubleIfNoEven() {
		$this->assertEquals("14385", $this->luhnAlgorithm->checkHashLuhn("12345")); 
	}

	public function testItReturnsCurrectStringAfterDoubleIfMoreThanNine() {
		$this->assertEquals("2254", $this->luhnAlgorithm->checkHashLuhn("1274")); 
	}
	public function testItReturnsCurrectStringAfterMakeup() {
		$this->assertEquals("13", $this->luhnAlgorithm->checkHashLuhnResult("1274")); 
	}

}