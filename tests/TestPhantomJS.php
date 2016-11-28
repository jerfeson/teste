<?php


class TestPhantomJS extends PHPUnit_Extensions_Selenium2TestCase 
{
	
	protected function setUp() 
	{
		$this->setBrowser('phantomjs');
		$this->setBrowserUrl('http://local.teste');
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