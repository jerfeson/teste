<?php

/**
 * PHPUnit_Extensions_SeleniumTestCase
 * 
 * A extensão de caso de teste PHPUnit_Extensions_SeleniumTestCase 
 * implementa o protocolo cliente/servidor
 * para conversar com o Servidor Selenium
 * assim como métodos de asserção especializados para testes web
 * 
 * @author Junior
 */
class AcessoTest extends PHPUnit_Extensions_SeleniumTestCase
{
	protected $captureScreenshotOnFailure = TRUE;
	protected $screenshotPath = 'D:\Junior\Sistemas\source\local.teste\teste\screenshots';
	protected $screenshotUrl = 'http://local.teste/screenshots';
	
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://local.teste');
    }

	/**
	 * @test
	 */
    public function title()
    {
        $this->open('http://local.teste/view/html/form.html');
        $this->assertTitle('Acesso');
    }
    
    /**
     * @test
     */
    public function faltouEmail()
    {
    	$this->open('http://local.teste/view/html/form.html');
    	$this->waitForPageToLoad(10000);
    	$this->click("css=button.btn.btn-default");
    	$this->waitForPageToLoad(10000);
    	$mensagem = $this->getText("css=div.mensagem");
    	//$this->waitForPageToLoad("30000");
    	$this->assertEquals("Faltou informar o email", $mensagem);
    }
}