<!DOCTYPE html>
<html>

<head>
    <title>SCIA - Login</title>
    <link rel="stylesheet" type="text/css" href="Resources/css/estilos.css" />
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
    <main>

        <div class="painel">
            <form action="login.php" method="post">
                <h2 class="titulo">
                    Logar
                </h2>
                <!-- Input para o login.php indicando que nesta página só podem ser cadastrados
				Usuarios do tipo 2(Responsáveis) -->
                <input type="hidden" name="codtpusr" value="2">
                <label class="subtitulo"> CPF </label>
                <input class="caixa input-login" type="text" name="usu_cpf" required placeholder="Digite Seu CPF"
                    onkeydown="javascript: fMasc( this, mCPF )" maxlength="14" />
                <label class="subtitulo">Senha</label>
                <input class="caixa input-login" type="password" password name="usu_pass" required
                    placeholder="Digite Sua Senha" />
                <input type="submit" value="Entrar" class="botao" name='btn_enviar' />
            </form>
            <div class="response-Message">
                <?php
					if(isset($_GET['message'])){
						echo "<p>Usuario e / ou senha incorretos</p>";
						}
				?>
                </div>
        </div>
    </main>
</body>

</html>