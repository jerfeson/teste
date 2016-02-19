<?php

/**
 * PHPUnit_Extensions_Selenium2TestCase
 * 
 * O caso de teste PHPUnit_Extensions_Selenium2TestCase 
 * permite a você usar a API WebDriver (parcialmente implementada).
 * 
 * É como se executasse no background, sem necessariamente 
 * abrir e executar pela interface
 * 
 * @author Junior
 */
class AcessoDriverTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://local.teste/view/html/form.html');
    }

	/**
	 * @test
	 */
    public function title()
    {
        $this->open('http://local.teste/view/html/form.html');
        $this->assertTitle('Acesso');
    }
}