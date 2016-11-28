<?php

use App\Database;
use App\Usuario;

class DbTest extends PHPUnit_Extensions_Database_TestCase
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

	/**
	 * Define como deve ser o estado inicial do banco de dados 
	 * antes de cada teste ser executado
	 * 
	 * Pode ser gerado por linha de comando
	 * mysqldump --xml -t -u [username] --password=[password] [database] [table] > /path/to/file.xml
	 * 
	 * {@inheritDoc}
	 * @see PHPUnit_Extensions_Database_TestCase::getDataSet()
	 */
	protected function getDataSet()
	{
		return $this->createMySQLXMLDataSet('../../data/fixture.xml');
	}
	
	public function testInsert()
	{
		$usuario = new Usuario();
		$usuario->setId(4);
		$usuario->setEmail('04@gmail.com');
		$usuario->setPassword('0404');
		
		$database = new Database($this->getConnection()->getConnection());
		$database->insert('usuario', $usuario->toArray());
		
		$queryTable = $this->getConnection()->createQueryTable(
			'usuario', 'SELECT * FROM usuario'
		);
		
		$expectedTable = $this->createMySQLXMLDataSet("../../data/expected.xml")->getTable('usuario');
		
		return $this->assertTablesEqual($expectedTable, $queryTable);
	}
}