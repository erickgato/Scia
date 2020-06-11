<!DOCTYPE html>
<html>
<head>
	<title>SCIA - Login</title>
	<link rel="stylesheet" type="text/css" href="<?php openPublic('Resources/css/estilos.css') ?>"/>
	<link rel="shortcut icon" href="Images/icone.ico" />
</head>
<body class="corpo">
	<header>
		<?php
			include_once openResource('/Cabecalhos/menuresponsavel.php');
			menu(0)
		?>
	</header>
	<div class="painel">
		<form action="#" method="get">
			<label class="titulo">
				Logar
			</label>
			<br/>
			<br/>
			<label class="subtitulo">
				CPF
			</label>
			<input class="caixa" type="text" name="usu_cpf" required/>
			<br/>
			<br/>
			<label class="subtitulo">
				Tipo de usuário
			</label>
			<select class="caixa" name="Tp_User">
				<option class="opcsele" value="1">Coordenador</option>
				<option class="opcsele" value="2">Responsável</option>
				<option class="opcsele" value="3">Orientador</option>
				<option class="opcsele" value="5">Comercial</option>
				<option class="opcsele" value="4">Monitor</option>
			</select>
			<br/>
			<br/>
			<label class="subtitulo">
				Senha
			</label>
			<input class="caixa" type="password" password name="usu_pass" required/>
			<br/>
			<input type="submit" value="Entrar" class="botao" name='btn_enviar'/>
		</form>
		<?php 
			if(isset($_GET['btn_enviar'])){
				$Usuario = array("CPF" => $_GET['usu_cpf'], "TYPE" => $_GET['Tp_User'],"PASS" => $_GET['usu_pass'] );
				var_dump($Usuario);
			}
		?>
	</div>
</body>
</html>