<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../Resources/css/profile.css" />
    <title>Cadastro</title>
</head>

<body class="L-Content">
    <header>
        <?php
            session_start();
            if(isset($_SESSION['USERLOGGED'])){
                $username = $_SESSION['USERNAME'];
                include_once '../../Resources/Cabecalhos/Menu.php';
                MENU::RESPONSAVEL(0,$username,"../../index.php");
            }

        ?>
    </header>
    <main>
    <nav class="sideoption">
        <ul>
            <a href="#">Configuração de conta</a>
        </ul>
        <ul>
            <a href="#">Notificações</a>
        </ul>
    </nav>

    </main>
    <footer>
</body>

</html>