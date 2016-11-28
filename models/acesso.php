<!DOCTYPE html>
<html>
<body>
<?php

require 'Usuario.php';

if (!$_POST['email']) {
	echo '<div class="mensagem">Faltou informar o email</div>';
} else if (!$_POST['pwd']) {
	echo 'Faltou informar o password';
} else {
	$usuario = new Usuario();
	$usuario->setEmail($_POST['email']);
	$usuario->setPassword($_POST['pwd']);
	echo 'Dados informados com sucesso';
}
?>
</body>
</html>