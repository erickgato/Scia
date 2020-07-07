<!DOCTYPE html>
<html>
<head>
	<title>SCIA - Login</title>
	<link rel="stylesheet" type="text/css" href="App/Public/Resources/css/LAdmin.css"/>
	<link rel="shortcut icon" href="Images/icone.ico" />
</head>
<body class="corpo">
	<header>
		<?php
			include_once 'Resources/Cabecalhos/Menu.php';
			//MENU::LOGIN();
		?>
		 <script src="App/Public/Resources/js/estilos.js"></script>
	</header>
	<div class="painel">
		<form action="" method="post">
		<span class="text-center">Admin</span>
		         
		<div class="input-container">
				<label class="subtitulo"> CPF </label>
			<input type="text" name="usu_cpf" required placeholder = "Digite Seu CPF"onkeydown="javascript: fMasc( this, mCPF )" maxlength="14"/>
			</div>
			
			<input type="hidden" name="codtpusr" value="3">

		<div class="input-container">	
			<label class="subtitulo">Senha</label>
			<input type="password" password name="usu_pass" required placeholder = "Digite Sua Senha"/>
			</div>
			
			<input type="submit" value="Entrar" class="botao" name='btn_enviar'/>
		</form>
		<div class="response-Message">
                <?php
					if(isset($_GET['message'])){
						echo "<p>Usuario e / ou senha incorretos</p>";
					}
					if(isset($_POST['btn_enviar'])){
                        include PUBLICPATH . '/login.php';
                    }
				?>
                </div>
	</div>
</body>
</html>