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
                MENU::RESPONSAVEL(0,"../../index.php");
            }

            $fistname = explode(" ",$username);

        ?>
    </header>
    <main>
        <div class="sopt-sidebar">
            <nav class="sideoption">
                <ul>
                    </br>
                    <li class="Up-image">
                        <figure>
                            <img src="../../Resources/images/uploads/Adelaine.jpg" alt="">
                        </figure>
                    </li>
                    <li>
                        <a class="UserName" href="#profile"> <?php echo $fistname[0] ?> </a>
                    </li>

                    <li id="profile"> <a href="#">
                            <figure><img src="../../Resources/images/icons/Prof.png" alt="Profile"></figure>
                            <span>Perfil</span>
                        </a></li>
                    <li> <a href="#">
                            <figure><img src="../../Resources/images/icons/Not.png" alt="Notification">
                            </figure>
                            <span id="span-notify">Notificação</span>
                        </a></li>
                </ul>

            </nav>
        </div>
        <div class="Content">
            <span class="Title">Modifique as informações do usuário aqui</span>
            <form action="POSTDATA/AlterarUser" method="post">
                <label>Nome completo
                    <input class="caixa" type="text" name="Username" required>
                </label>
                <label>Endereço de email
                    <input class="caixa" type="text" name="mailaddress" required>
                </label>
        </br>
                <label>Endereço
                    <input class="caixa" type="text" name="address" required>
                </label>
                <label>Telefone
                    <input class="caixa" type="text" name="Tel" required>
                </label>
                <label>CEP
                    <input class="caixa" type="text" name="Cep" required>
                </label>
                <input type="submit" name="Send">
            </form>
        </div>
    </main>
    <footer>
</body>

</html>