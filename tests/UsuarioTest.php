<?php

use App\Usuario;
use App\Database;

class UsuarioTest extends PHPUnit_Extensions_Database_TestCase
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

    /**
     * Teste para inserir e validar conteudo no banco de dados
     *
     * @return bool
     * @test
     */
	public function insert()
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
	
	/**
	 * Teste para editar e validar conteudo no banco de dados
	 *
	 * @return bool
	 * @test
	 */	
	public function update()
	{
	    $database = new Database($this->getConnection()->getConnection());
	    $usuario = $database->getRows('usuario', array(
            'where' => array(
                'id' => 3
            ),
	        'return_type' => 'single'
        ));
	    
	    $usuario['email'] = 'teste@show';
	    $usuario['password'] = '@show';
	    
	    $database->update('usuario', $usuario, array('id' => 3));
	    
	    $queryTable = $this->getConnection()->createQueryTable(
	        'usuario', 'SELECT * FROM usuario'
        );
	    
	    $expectedTable = $this->createMySQLXMLDataSet("../../data/usuario_expected.xml")->getTable('usuario');
	    
	    
	    return $this->assertTablesEqual($expectedTable, $queryTable);
	}
	
	/**
	 * @test
	 */
	public function delete()
	{
	    $database = new Database($this->getConnection()->getConnection());
	    $database->delete('usuario', array(
	        'id' => 3
	    ));
	    
	    $expectedTable = $this->createMySQLXMLDataSet('../../data/usuario_delete_expected.xml')->getTable('usuario');
	    
	    $queryTable = $this->getConnection()->createQueryTable('usuario', 
	       'SELECT * FROM usuario'
	    );
	    
	    return $this->assertTablesEqual($expectedTable, $queryTable);
	}
	
}