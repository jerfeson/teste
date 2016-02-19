<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://local.teste/");
  }

  public function testMyTestCase()
  {
    $this->open("view-source:http://local.teste/src/acesso.php");
    $this->open("/view/html/form.html");
    $this->click("css=button.btn.btn-default");
    $this->waitForPageToLoad("30000");
    $this->assertEquals("Faltou informar o email", $this->getText("css=div.mensagem"));
  }
}
?>