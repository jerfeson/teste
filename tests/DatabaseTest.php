<?php

abstract class DatabaseTest extends PHPUnit_Extensions_Database_TestCase
{
	/**
	 * @var PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
	 */
	protected $connection;
	
	/**
	 * Permite que a limpeza e o carregamento de funcionalidades 
	 * do ambiente funcionem
	 * 
	 * {@inheritDoc}
	 * @see PHPUnit_Extensions_Database_TestCase::getConnection()
	 */
	public function getConnection()
	{
		if (! $this->connection) {
			$pdo = new \PDO(
				'mysql:host=localhost;dbname=cradf',
				'root', 'root', 
				array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
			));
			$this->connection = $this->createDefaultDBConnection($pdo, 'ross_testing');
		}
		
		return $this->connection;
	}
}