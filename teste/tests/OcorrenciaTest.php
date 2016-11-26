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
    $this->setBrowserUrl("http://local.sis21/");
  }

  public function testAlterarOcorrencia()
  {
   	$this->url("/cradf/site/"); 	
  	$this->timeouts()->implicitWait(10000);

  	$this->waitUntil(function($testCase) {
  		return $testCase->byCssSelector('div.login-logo')->displayed();
  	}, 10000);
  	
  	// login
   	$this->byCssSelector('#login')->value('cradf');
   	$this->byCssSelector('#senha')->value('p21&show');
   	$this->byCssSelector('button#confirmar')->click();
  	$this->waitUntil(function($testCase) {
  		return $testCase->byCssSelector('div.logo-default')->displayed();
  	}, 10000);
   	
   	$this->url('/cradf/site/admin.php?acao=Qjc2RTI4RDlPOjEwOiJTaXMyMV9BY2FvIjo5OntzOjE1OiIAKgBwcm9wcmllZGFkZXMiO086MTA6IkxpYjIxQXJyYXkiOjE6e3M6MTc6IgBMaWIyMUFycmF5AGFycmF5IjthOjM6e3M6MTQ6ImNsYXNzZUNvbnRyb2xlIjtzOjI0OiJDcmFMaXN0YUNvZGlnb09jb3JyZW5jaWEiO3M6OToiY2xhc3NlUGFpIjtzOjE4OiJDcmFNZW51Q3JhQ2FkYXN0cm8iO3M6MTA6InRpcG9GdW5jYW8iO2k6Mjt9fXM6OToiACoAY29kaWdvIjtOO3M6MTA6IgAqAGFjYW9QYWkiO047czoxMToiACoAbWVuc2FnZW0iO047czoxNToiACoAbWVuc2FnZW1FcnJvIjtOO3M6OToiACoAdGl0dWxvIjtzOjEyOiJPY29ycsOqbmNpYXMiO3M6MjQ6IgAqAGNhbWluaG9SZWxhdGl2b0ltYWdlbSI7TjtzOjE1OiIAKgBhY2Vzc29OZWdhZG8iO2I6MDtzOjc6IgAqAGxpbmsiO047fQ%3D%3D');
  	$this->waitUntil(function($testCase) {
  		return $this->byCssSelector('div.page-title')->displayed();
  	}, 10000);

  	$this->byCssSelector('a[data-id="18"][data-original-title="Alterar"]')->click();

  	$this->waitUntil(function($testCase) {
  		return $this->byCssSelector('div.page-title')->displayed();
  	}, 10000);
  	
  	$this->byCssSelector('input#operacaoManual[value="1"]')->click();
  	$this->byCssSelector('input#cobrarCustas[value="1"]')->click();
  	$this->byCssSelector('#labelCustas')->value('Label Show');
  	$this->byCssSelector('button#confirmar')->click();
  	
//     $submit->click();
//     $this->timeouts()->implicitWait(3000);
// 	$mensagem = $this->byCssSelector(".mensagem");
//     return $this->assertEquals("Faltou informar o email", $mensagem->text());
  }
}