<?php

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;

class OcorrenciaDbTest extends PHPUnit_Extensions_Database_TestCase
{
	/**
     * @var RemoteWebDriver
     */
    protected $webDriver;

	public function setUp()
	{
	    $this->webDriver = RemoteWebDriver::create('http://local.sis21/', DesiredCapabilities::firefox());
	}

	public function tearDown()
	{
		if ($this->webDriver) {
	    	$this->webDriver->quit();
		}
	}
	
	/**
	 * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
	 */
	public function getConnection()
	{
		$pdo = new PDO(
			'mysql:host=localhost;dbname=cradf', 
			'root', 'root', 
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
		));

		return $this->createDefaultDBConnection($pdo, 'ross_testing');
	}
	
	protected function getDataSet()
	{
		return $this->createArrayDataSet(array(
			'guestbook' => array(
				array('id' => 1, 'content' => 'Hello buddy!', 'user' => 'joe'),
				array('id' => 2, 'content' => 'I like it!',   'user' => null),
			),
		));
	}
}