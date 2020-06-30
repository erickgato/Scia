<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo RESOCS; ?>/css/profile.css" />
    <title>Cadastro</title>
</head>
<body class="L-Content">
    <header>
        <?php
            if(isset($_SESSION['USERLOGGED'])){
                $username = $_SESSION['USERNAME'];
                include_once RESOCS . '/Cabecalhos/Menu.php';
                MENU::RESPONSAVEL(0,"index.php");
            }
            else{
                exit;
            }

            $fistname = explode(" ",$username);

        ?>
    </header>
    <main>
        
        <div class="Content">
        <div class="sopt-sidebar">
            <nav class="sideoption">
                <ul>
                    <li class="Up-image">
                        <figure>
                            <img src="<?php echo IMAGES; ?>/uploads/Adelaine.jpg" alt="">
                        </figure>
                    </li>
                    <li>
                        <a class="UserName" href="#profile"> <?php echo $fistname[0] ?> </a>
                    </li>
                    <li id="profile"> <a href="#">
                            <figure><img src="<?php echo IMAGES; ?>/icons/Prof.png" alt="Profile"></figure>
                            <span>Perfil</span>
                        </a></li>
                    <li id="notification"> <a href="#">
                            <figure><img src="<?php echo IMAGES; ?>/icons/Not.png" alt="Notification">
                            </figure>
                            <span id="span-notify">Notificação</span>
                        </a></li>
                </ul>
                </nav>
            
        </div>
            <p class="Title">Modifique as informações do usuário aqui</p>
            <form action="" method="post">
                <label class="labelcontentname">Nome completo
                    <input class="caixaname" type="text" name="Username" required>
                </label>
                <label class="labelcontent">Endereço de email
                    <input class="caixaemail" type="text" name="mailaddress" required>
                </label>
                <label class="labelcontent">Endereço
                    <input class="caixaend" type="text" name="address" required>
                </label>
                <label class="labelcontent">Telefone
                    <input class="caixatel" type="text" name="Tel" required>
                </label>
                <label class="labelcontentcep">CEP
                    <input class="caixacep" type="text" name="Cep" required>
                </label>
                <input class= "botao" type="submit" name="Send" value="Salvar">
            </form>
        </div>
        
    </main>
    <footer>
</body>

</html>