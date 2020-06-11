<!DOCTYPE html>
<html>
<head>
	<title>SCIA - Login</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
	<link rel="shortcut icon" href="Images/icone.ico" />
</head>
<body class="corpo">
	<header>
		<?php
			include_once 'menu.login.php';
			menu(0)
		?>
	</header>
	<div class="painel">
		<form action="#" method="post">
			<label class="titulo">
				Logar
			</label>
			<br/>
			<br/>
			<label class="subtitulo">
				CPF
			</label>
			<input class="caixa" type="text" name=""/>
			<br/>
			<br/>
			<label class="subtitulo">
				Tipo de usuário
			</label>
			<select class="caixa" name="">
				<option class="opcsele">Responsável</option>
				<option class="opcsele">Administrador</option>
				<option class="opcsele">Monitor</option>
			</select>
			<br/>
			<br/>
			<label class="subtitulo">
				Senha
			</label>
			<input class="caixa" type="password" password name=""/>
			<br/>
			<input type="submit" value="Entrar" class="botao"/>
		</form>
	</div>
</body>
</html>