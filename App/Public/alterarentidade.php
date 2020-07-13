<?php 
    if(!isset($_GET['AltSSE']))
        header("Location: index.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Trocar Senha</title>
    <link rel="stylesheet" type="text/css" href="App/Public/Resources/css/FLogin.css" />
    <link rel="shortcut icon" href="<?php echo RESOCS; ?>/images/icons/logo/favicon.png" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <form class="form" action="" method="post">
                <span class="text-center">Alterar Senha</span>
                <div style="color:red; font-size: 15pt;" class="responsevalidate"></div>
                <div class="input-container">
                    <label class="subtitulo">Nova senha</label>
                    <input class="Oldpass" type="password" password name="U[NS]" required placeholder="Digite Sua nova Senha" />
                </div>
                <div class="input-container">
                    <label class="subtitulo">Confirmar senha</label>
                    <input class="Newpass" type="password" password name="U[CS]" required placeholder="confirme Sua nova Senha" />
                </div>
                <input type="submit" value="Registrar" class="botao" name='U[Submit]' />
                
            </form>
        </div>
    </main>
    <script>
        $(".form").on('submit',(e) => {
            if( $(".Oldpass").val() != $(".Newpass").val() ){
                e.preventDefault();
                $(".responsevalidate").html("Digite uma senha correspondente");
            }
        });
    </script>
    <?php 
    if(isset($_POST['U']['Submit'])){
        $descriptedcpf = base64_decode($_GET['AltSSE']);
        $encriptedkey =  base64_encode( $_POST['U']['NS']);
        if(DATABASE::UPDATE('sc_usuario',"Us_login = '{$descriptedcpf}'",['Us_senha'],[$encriptedkey] )){
            echo "<script>alertify.alert('Sucesso', 'Senha alterada com sucesso !', () => {
                alertify.success('finalizado!')
                window.location.href = 'index.php';
            });</script>";
        }
    }
        
    ?>
</body>

</html>