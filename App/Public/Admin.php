<!DOCTYPE html>
<html>
<head>
	<title>SCIA - Login</title>
	<link rel="stylesheet" type="text/css" href="Resources/css/estilos.css"/>
	<link rel="shortcut icon" href="Images/icone.ico" />
</head>
<body class="corpo">
	<header>
		<?php
			include_once 'Resources/Cabecalhos/Menu.php';
			MENU::LOGIN();
		?>
		 <script src="Resources/js/estilos.js"></script>
	</header>
	<div class="painel">
		<form action="login.php" method="post">
			<label class="titulo">
				Logar
			</label>
			<br/>
			<br/>
			<label class="subtitulo">
				CPF
			</label>
			<input class="caixa" type="text" name="usu_cpf" required placeholder = "Digite Seu CPF"onkeydown="javascript: fMasc( this, mCPF )" maxlength="14"/>
			<br/>
			<br/>
			<label class="subtitulo">
				Tipo de usuário
			</label>
			<select class="caixa" name="codtpusr">
				<option class="opcsele" value="1">Coordenador</option>
				<option class="opcsele" value="3">Orientador</option>
				<option class="opcsele" value="5">Comercial</option>
				<option class="opcsele" value="4">Monitor</option>
			</select>
			<br/>
			<br/>
			<label class="subtitulo">
				Senha
			</label>
			<input class="caixa" type="password" password name="usu_pass" required placeholder = "Digite Sua Senha"/>
			<br/>
			<input type="submit" value="Entrar" class="botao" name='btn_enviar'/>
		</form>
		<?php
				if(isset($_GET['message'])){
					echo "Usuario e / ou senha não existe";
				}
		?>
	</div>
</body>
</html>