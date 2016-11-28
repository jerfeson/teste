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
    $this->setBrowser("firefox");
    $this->setBrowserUrl("http://local.teste");
  }

  public function testMyTestCase()
  {
   	$this->url("/view/html/form.html");
 	$submit = $this->byCssSelector('.btn-default');
    $submit->click();
    $this->timeouts()->implicitWait(3000);
	$mensagem = $this->byCssSelector(".mensagem");
    return $this->assertEquals("Faltou informar o email", $mensagem->text());
  }
}