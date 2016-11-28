# Teste
Testes automatizados com phpunit, selenium e dbunit

Instalação do Xdebug no windows de forma simples
http://xdebug.org/wizard.php

Instalação do xdebug no eclipse
http://stackoverflow.com/questions/31619777/getting-phpunit-tests-to-work-in-eclipse-with-pdt-and-makegood

Plugins para eclipse PDT - PHPUnit, CodeSniffer
http://phpsrc.org/

Baixando o phpunit para ser executado na aplicação
Utilizar o composer
Última versão estável do plugin phpunit-selenium
{
    "require-dev": {
    	"phpunit/phpunit": "5.*",
    	"phpunit/phpunit-selenium": "3.*"
    }
}

Escrevendo testes com phpunit
https://phpunit.de/manual/current/pt_br/writing-tests-for-phpunit.html

Escrevendo testes com phpunit-selenium
https://phpunit.de/manual/current/pt_br/selenium.html#selenium.selenium2testcase

Executar o phpunit com selenium é necessário ter um servidor selenium em execução
http://www.seleniumhq.org/download/
Executar da seguinte forma:
java -jar selenium-server-standalone-3.0.1.jar

Driver para executar selenium 3.*
https://github.com/mozilla/geckodriver/releases
Exemplo para executar o .jar com o driver: 
java -Dwebdriver.gecko.driver="C:\selenium\driver\geckodriver.exe" -jar selenium-server-standalone-3.0.1.jar

Documentação para facebook webdriver (selenium)
https://github.com/facebook/php-webdriver

Browser sem interface para automação
Para instalar, somente descompactar e configurar o path até o /bin
http://phantomjs.org/download.html

DBUNIT - Instruções para trabalhar com DBUnit no PHP
https://phpunit.de/manual/current/pt_br/database.html

Comando para gerar o XML à partir do MySQL
mysqldump --xml -t -u [username] --password=[password] [database] [table] > /path/to/file.xml

Autoload de classes da aplicação para executar o phpunit pelo composer
App = namespace
models = diretório
"autoload": {
	"psr-4": {
		"App\\": "models/"
	}
}
