<!DOCTYPE html>
<html>

<head>
    <title>Trocar Senha</title>
    <link rel="stylesheet" type="text/css" href="App/Public/Resources/css/FLogin.css" />
    <link rel="shortcut icon" href="<?php echo RESOCS; ?>/images/icons/logo/favicon.png" type="image/x-icon" />
    <!--ALERT BOX -->
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
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
                    <input type="text" name="U[CPF]" required placeholder="Digite Seu CPF"
                        onkeydown="javascript: fMasc( this, mCPF )" maxlength="14" />
                </div>

                <div class="input-container">
                    <label class="subtitulo">Última Senha</label>
                    <input type="password" password name="U[LS]" required placeholder="Digite Sua Última Senha" />
                </div>
                <div class="input-container">
                    <label class="subtitulo">Nova Senha</label>
                    <input type="password" password name="U[NS]" required placeholder="Digite Sua Última Senha" />
                </div>
                <a class="OMetodo" href="#">Tente de outro jeito.</a>
                <input type="submit" value="Entrar" class="botao" name='btn_enviar' />
            </form>
        </div>
    </main>
    <?php
    if(isset($_POST['btn_enviar']) && isset($_POST['U']) ){
        try {
            $encriptedkey = base64_encode($_POST['U']['LS']);       
            $database_pass = DATABASE::SELECT('sc_usuario',"WHERE Us_login = '{$_POST['U']['CPF']}'");
                if($_POST['U']['LS'] == base64_decode($database_pass[0]['Us_senha']) ){
                    if(DATABASE::UPDATE('sc_usuario',"Us_cod = {$database_pass[0]['Us_cod']}",['Us_senha'],[base64_encode($_POST['U']['NS'])])){
                        echo "Alterado";
                    }
                }
            else{
                print('CatchError');
            }
        } catch (\Throwable $th) {
            echo "
            <script>alertify.alert('Falha', 'Falha ao alterar senha'!', () => {
                alertify.error('erro!')
            });</script>
            ";
        }
    }
    ?>
</body>

</html>