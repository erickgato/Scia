<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo RESOCS; ?>/css/profile.css" />
    <title>Perfil</title>
</head>

<body class="L-Content">
    <header>
        <?php
            if(!isset($_SESSION['USERLOGGED'])){
                header("Location: index.php");
                
            }
            $username = $_SESSION['USER']['name'];
            include_once RESOCS . '/Cabecalhos/Menu.php';
            MENU::RESPONSAVEL(0,"index.php");
            /* 
                Database join não será usado pois é necessario possuir filtro de dois tipos
                de contato diferentes e esses filtros devem ser mostrados 
                em campos separados
                
            */
            $responsavel = DATABASE::SELECT('sc_responsavel',"WHERE Re_cod = {$_SESSION['USER']['ID']} ");
            $email = DATABASE::JOIN('sc_contato',"WHERE TP.TC_cod = 1 AND CONTACT.Co_codResponsavel = 31",'AS CONTACT INNER JOIN sc_tp_contato as TP on TP.TC_cod = CONTACT.Co_codtpContato');
            $telefone = DATABASE::SELECT('sc_contato',"where Co_codtpContato = 2 AND Co_codResponsavel =  {$_SESSION['USER']['ID']}");
            if(empty($email)){
                $email[0]['Co_descricao'] = ""; 
            
            }
                
            if(empty($telefone)){
                $telefone[0]["Co_descricao"] = "";
            
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
                                <img src="<?php echo IMAGES; ?>/uploads/tmp_image.png" alt="">
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
                    <input class="caixaname" type="text" name="Username" value="<?php echo $username ?>" required>
                </label>
                <label class="labelcontent">Endereço de email
                    <input class="caixaemail" type="text" value="<?php echo $email[0]['Co_descricao'] ?>"
                        name="mailaddress" required>
                </label>
                <label class="labelcontent">Logradouro
                    <input class="caixaend" type="text" value="<?php echo $responsavel[0]['Re_logradouro'] ?>"
                        name="lograd" required>
                </label>
                <label class="labelcontent">Telefone
                    <input class="caixatel" type="text" name="Tel" value="<?php echo $telefone[0]["Co_descricao"] ?>"
                        required>
                </label>
                <input class=" botao" type="submit" name="Send" value="Salvar">
            </form>
        </div>
        <?php 
            include_once PUBLICPATH . '/View/Responsaveis/POSTDATA/Editarinfo.php';
        ?>
    </main>
    <footer>
</body>

</html>