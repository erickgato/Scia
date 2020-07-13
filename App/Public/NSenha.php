<!DOCTYPE html>
<html>

<head>
    <title>Trocar Senha</title>
    <link rel="stylesheet" type="text/css" href="App/Public/Resources/css/FLogin.css" />
    <link rel="shortcut icon" href="<?php echo RESOCS; ?>/images/icons/logo/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <input type="text" name="U[CPF]" required placeholder="Digite Seu CPF" onkeydown="javascript: fMasc( this, mCPF )" maxlength="14" />
                </div>
                <input type="submit" value="Entrar" class="botao" name='btn_enviar' />
            </form>
        </div>
    </main>
    <?php
    require_once('App/classes/PHPMailer/src/PHPMailer.php');
    require_once('App/classes/PHPMailer/src/SMTP.php');
    require_once('App/classes/PHPMailer/src/Exception.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    if(isset($_POST['btn_enviar']) && isset($_POST['U']['CPF'])){
        $idresp = DATABASE::SELECT('sc_responsavel',"WHERE Re_CPF = '{$_POST['U']['CPF']}' ");
        if($idresp){
            $email = DATABASE::SELECT('sc_contato',"where Co_codtpContato = 1 AND Co_codResponsavel =  {$idresp[0]['Re_cod']}");
            $mail = new PHPMailer(true);
            $encriptedCpf = base64_encode($_POST['U']['CPF']);
            $server = INSTANCE;
            try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'sciacontact07@gmail.com';                     // SMTP username
            $mail->Password   = '123456scia'; //Para obter email da scia entre em contato com @Erick Gato // SMTP password 
            $mail->Port = 587;
    
            $mail->setFrom($email[0]['Co_descricao']);
            $mail->addAddress($email[0]['Co_descricao']);
    
            $mail->isHTML(true);
            $mail->Subject = 'Teste de envio de email';
            $mail->Body = "<h1>SCIA CONTACT</h1>Olá Responsável<strong> Altere sua senha <a href='http://$server/scia/Aresp?AltSSE={$encriptedCpf}'><h3>Aqui<h4></a></strong>";
            $mail->AltBody = 'Chegou o email do erick gato';
    
            if ($mail->send()) {
                echo "<script> alertify.alert('Olá', 'Confirmação enviada para sua caixa de email !', () => {
                    alertify.success('ótimo!')
                });</script>";
            } else {
                echo "<script> alertify.alert('erro', 'Email não encontrado!', () => {
                    alertify.error('erro!')
                });</script>";
            }
        } catch (Exception $e) {
            echo "Erro ao enviar email: {$mail->ErrorInfo}";
        }
    }
    }
   
    ?>
</body>

</html>