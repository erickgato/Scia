<!DOCTYPE html>
<html>

<head>
    <title>Trocar Senha</title>
    <link rel="stylesheet" type="text/css" href="App/Public/Resources/css/FLogin.css" />
    <link rel="shortcut icon" href="<?php echo RESOCS; ?>/images/icons/logo/favicon.png" type="image/x-icon" />
</head>

<body class="corpo">
    <header>
        <script src="App/Public/Resources/js/estilos.js"></script>
    </header>
    <main>

        <div class="painel">
            <form action="" method="post">
                <span class="text-center">Alterar Senha</span>
                <!-- Input para o login.php indicando que nesta página só podem ser cadastrados
				Usuarios do tipo 2(Responsáveis) -->
                <input type="hidden" name="codtpusr" value="2">
                <div class="input-container">
                    <label class="subtitulo"> CPF </label>
                    <input type="text" name="usu_cpf" required placeholder="Digite Seu CPF"
                        onkeydown="javascript: fMasc( this, mCPF )" maxlength="14" />
                </div>

                <div class="input-container">
                    <label class="subtitulo">Última Senha</label>
                    <input type="password" password name="lspsw" required placeholder="Digite Sua Última Senha" />
                </div>
                <a class="OMetodo" href="#">Tente de outro jeito.</a>
                <input type="submit" value="Entrar" class="botao" name='btn_enviar' />
            </form>
        </div>
    </main>
</body>

</html>