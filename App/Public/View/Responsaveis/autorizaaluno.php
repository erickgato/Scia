<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo RESOCS; ?>/css/estilos.css" />
    <title>Cadastro</title>
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
    <header id="header">
        <?php
        if(!isset($_SESSION['USERLOGGED'])){
            header("Location: index.php");            
        }  
            include_once RESOCS . '/Cabecalhos/Menu.php';
            $username = $_SESSION['USER']['name'];
            MENU::RESPONSAVEL(0);
            $WHERE = "WHERE AL_codResponsavel = {$_SESSION['USER']['ID']}";
            $FETCHALUN = DATABASE::SELECT('sc_aluno',$WHERE);
       ?>
    </header>
    <div id="container">
        <form action="" method="post">
            <div class="painel">
                <label class="title_aut">
                    Autorizar Aluno
                </label>
                <div id="campos_cadastro">
                    <label class="subtitulo">
                        Aluno
                        <select class="caixa" id="input-text" type="text" value="" name="codaluno" required>
                            <?php 
                                    if($FETCHALUN == false){
                                        echo "<script>alert('Usuario náo possui alunos cadastrados')</script>";
                                        header('Location: perfil');
                                    }
                                    else{
                                        foreach ($FETCHALUN as $Aluno) {
                                            echo '<option value = "' .$Aluno['Al_cod'] . '">' . $Aluno['Al_nome'] . '</option>';
                                        }
                                    }
                                           
                                    ?>
                        </select>
                        <br />
                    </label>

                    <label class="subtitulo">
                        Unidade
                        <select class="caixa" id="input-text" type="text" value="" name="unidade">
                            <option value="1">SESI</option>
                            <option value="2">SENAI</option>
                        </select>
                        <br />
                    </label>

                    <label class="subtitulo">
                        Observações</label>
                    <textarea name="Obs" class="textareaaluno" cols="5" rows="3"></textarea>
                </div>
                <input type="submit" class="botao" name="Enviar" />
            </div>
        </form>
        <?php 
    include PUBLICPATH .  '/View/Responsaveis/POSTDATA/autorizaaluno.php';
    if(isset($_GET['m'])){
        switch($_GET['m']){
            case 'Sucess': 
                echo "<script>alertify.alert('Scia diz...', 'Aluno liberado com sucesso',() => {
                    alertify.success('Sucesso')
                  });</script>";
            break;
            case 'Error': 
                echo "<script> alertify.alert('Scia diz', 'Falha na autorização do aluno',() => {
                    alertify.error('Contate o desenvolvedor')
                  });</script>";
            break;
        }
    }

    ?>
        <footer></footer>
</body>

</html>