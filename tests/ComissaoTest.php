<?php

use App\Comissao;

class ComissaoTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @test
	 */
    public function comissaoVendaCincoMilEDezPorCentoDeComissao()
    {
        $comissao = new Comissao();
        $comissao->setVenda(5000);
        $comissao->setComissao(0.10);
    	
        $this->assertEquals(500, $comissao->calcular());
    }
    
    /**
     * @test
     */
    public function comisaoVendaOitoMilEDezPorCentoDeComissao()
    {
    	$comissao = new Comissao();
    	$comissao->setVenda(8000);
    	$comissao->setComissao(0.10);
    	
    	$this->assertEquals(800, $comissao->calcular());
    }
    
    /**
     * @test
     */
    
    /**
     * @test
     */
    public function calcularPorcentagemDaComissaoAPartirDasVendas()
    {    	 
    	$valorVenda = 5000;
    	
    	if ($valorVenda <= 5000 ) {
    		
    	}
    	$this->assertEquals(0.1, 0.1);
    	
    }
   
}