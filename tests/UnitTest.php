<?php

class UnitTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @test
	 */
    public function pedraEhIgualPedra()
    {
        $this->assertEquals('pedra', 'pedra');
    }
    
    /**
     * @test
     */
    public function pedraEhDiferenteDeMadeira()
    {
    	$this->assertNotEquals('pedra', 'madeira');
    }
}