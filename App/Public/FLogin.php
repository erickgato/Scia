<!DOCTYPE html>
<html>

<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="App/Public/Resources/css/FLogin.css" />
    <link rel="shortcut icon" href="<?php echo RESOCS; ?>/images/icons/logo/favicon.ico" type="image/x-icon" />
</head>

<body class="corpo">
    <header>
        <?php
			include_once 'App/Public/Resources/Cabecalhos/Menu.php';
            //MENU::LOGIN();
		?>
        <script src="App/Public/Resources/js/estilos.js"></script>

    </header>
    <main>

        <div class="painel">
            <form action="" method="post">
                <span class="text-center">login</span>
                <!-- Input para o login.php indicando que nesta página só podem ser cadastrados
				Usuarios do tipo 2(Responsáveis) -->
                <input type="hidden" name="codtpusr" value="2">
                <div class="input-container">
                    <label class="subtitulo"> CPF </label>
                    <input type="text" name="usu_cpf" required placeholder="Digite Seu CPF"
                        onkeydown="javascript: fMasc( this, mCPF )" maxlength="14" />
                </div>

                <div class="input-container">
                    <label class="subtitulo">Senha</label>
                    <input type="password" password name="usu_pass" required placeholder="Digite Sua Senha" />
                    <?php if(isset($_GET['message'])):?>
                        <a href="alterar-senha">Esqueceu senha ?</a>
                    <?php endif; ?>
                </div>

                <input type="submit" value="Entrar" class="botao" name='btn_enviar' />
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
    </main>
</body>

</html>