<?php

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;

class IrregularidadeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var RemoteWebDriver
     */
    protected $webDriver;
    
    protected $url;
    
    public function setUp()
    {
        $this->url = 'http://local.sis21/cradf/site/';
        $host = 'http://localhost:4444/wd/hub';
        $driver = DesiredCapabilities::firefox();
        $this->webDriver = RemoteWebDriver::create($host, $driver);
    }
    
    public function tearDown()
    {
        if ($this->webDriver) {
            $this->webDriver->quit();
        }
    }
    
    public function testAlterarIrregularidade()
    {
        $this->webDriver->get($this->url);
         
        $this->webDriver->wait(10, 300)->until(function ($webDriver) {
            try {
                $webDriver->findElement(WebDriverBy::cssSelector('div.login-logo'));
                return true;
            } catch(NoSuchElementException $ex) {
                return false;
            }
        });
             
        $this->webDriver->findElement(WebDriverBy::name('login'))->sendKeys('cradf');
        $this->webDriver->findElement(WebDriverBy::name('senha'))->sendKeys('p21&show');
        $this->webDriver->findElement(WebDriverBy::id('confirmar'))->click();        
        
    
        
        $this->webDriver->wait(10, 300)->until(function ($webDriver) {
            try {
                $this->webDriver->findElement(WebDriverBy::cssSelector('.logo-default'));
                return true;
            } catch(NoSuchElementException $ex) {
                return false;
            }
        });
        
        $this->webDriver->get('http://local.sis21/cradf/site/admin.php?acao=QkZEMzI5MDRPOjE3OiJTaXMyMV9BY2FvQWx0ZXJhciI6OTp7czoxNToiACoAcHJvcHJpZWRhZGVzIjtPOjEwOiJMaWIyMUFycmF5IjoxOntzOjE3OiIATGliMjFBcnJheQBhcnJheSI7YToyOntzOjE0OiJjbGFzc2VDb250cm9sZSI7czozMToiQ3JhQ2FkYXN0cm9Db2RpZ29JcnJlZ3VsYXJpZGFkZSI7czoyMjoiaWRDb2RpZ29pcnJlZ3VsYXJpZGFkZSI7aToyNDt9fXM6OToiACoAY29kaWdvIjtzOjIyOiJMaWIyMUVudW1BY3Rpb25fVXBkYXRlIjtzOjEwOiIAKgBhY2FvUGFpIjtPOjEwOiJTaXMyMV9BY2FvIjo5OntzOjE1OiIAKgBwcm9wcmllZGFkZXMiO086MTA6IkxpYjIxQXJyYXkiOjE6e3M6MTc6IgBMaWIyMUFycmF5AGFycmF5IjthOjM6e3M6MTQ6ImNsYXNzZUNvbnRyb2xlIjtzOjI4OiJDcmFMaXN0YUNvZGlnb0lycmVndWxhcmlkYWRlIjtzOjk6ImNsYXNzZVBhaSI7czoxODoiQ3JhTWVudUNyYUNhZGFzdHJvIjtzOjEwOiJ0aXBvRnVuY2FvIjtpOjI7fX1zOjk6IgAqAGNvZGlnbyI7TjtzOjEwOiIAKgBhY2FvUGFpIjtOO3M6MTE6IgAqAG1lbnNhZ2VtIjtOO3M6MTU6IgAqAG1lbnNhZ2VtRXJybyI7TjtzOjk6IgAqAHRpdHVsbyI7czoxNToiSXJyZWd1bGFyaWRhZGVzIjtzOjI0OiIAKgBjYW1pbmhvUmVsYXRpdm9JbWFnZW0iO047czoxNToiACoAYWNlc3NvTmVnYWRvIjtiOjA7czo3OiIAKgBsaW5rIjtOO31zOjExOiIAKgBtZW5zYWdlbSI7TjtzOjE1OiIAKgBtZW5zYWdlbUVycm8iO047czo5OiIAKgB0aXR1bG8iO3M6NzoiQWx0ZXJhciI7czoyNDoiACoAY2FtaW5ob1JlbGF0aXZvSW1hZ2VtIjtOO3M6MTU6IgAqAGFjZXNzb05lZ2FkbyI7YjowO3M6NzoiACoAbGluayI7TzoxMzoiTGliMjFIdG1sTGluayI6MjQ6e3M6MzE6IgBMaWIyMUh0bWxMaW5rAHZldG9yVmFyaWF2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%3D');
        
        $this->webDriver->wait(10, 300)->until(function ($webDriver) {
            try {
                $this->webDriver->findElement(WebDriverBy::id('motivo'));
                return true;
            } catch(NoSuchElementException $ex) {
                return false;
            }
        });
               
        $this->webDriver->findElement(WebDriverBy::id('motivo'))->clear()->sendKeys('TESTE SHOW');
        $this->webDriver->findElement(WebDriverBy::id('confirmar'))->click();
        
        $this->webDriver->wait(10, 300)->until(function ($webDriver) {
            try {
                $this->webDriver->findElement(WebDriverBy::cssSelector('.table'));
                return true;
            } catch(NoSuchElementException $ex) {
                return false;
            }
        });
    }
}