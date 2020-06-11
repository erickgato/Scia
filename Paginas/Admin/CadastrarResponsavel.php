<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css"/> 
    <title>Cadastrar Responsavel</title>
</head>
<body class="corpo">
    <header id="header">
<?php
        include_once '../../PHP__7/Menu.php';
        menu(0);
?>
    </header>
    <div id="container">
    <form action="#" method="post">
        <div class="painel">
            <label for="frase_aut_Responsavel">
                    Cadastro do Responsavel
            </label>
            <div id = "campos_cadastro">
                <label>
                    <p>
                        Nome
                        <input id="input-text" type="text" value="" placeholder="Digite o Nome do Responsavel"/> 
                    </p>
                </label>
                <label>
                    <p>
                        Data de Nascimento
                        <input id="input-text" type="date" value="" placeholder="Digite a Data de Nascimento do Responsavel"/>
                    </p>
                </label>
                <label>
                    <p>
                        CPF do Responsavel
                        <input id="input-text" type="text" value="" placeholder="Digite o CPF do Responsavel" pattern=
                        "[0-9]{5}-[0-9]{3}$" title="O CFP precisa ter essa estrutura: 12345-123"/>
                    </p>
                </label>

                <label for="unidade">
                    <p>
                        CPF do Responsavel
                        <input id="input-text" type="text" value="" placeholder="Digite o CPF do Responsavel" pattern=
                        "[0-9]{5}-[0-9]{3}$" title="O CFP precisa ter essa estrutura: 12345-123"/>
                    </p>
                </label>
                </label>   
            </div>
            <input type="submit" id="submit" name="Enviar"/>
        </div>
</form>
</div>
    <footer></footer>
</body>
</html>