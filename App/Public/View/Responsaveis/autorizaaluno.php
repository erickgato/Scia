<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../Resources/css/estilos.css"/> 
    <title>Cadastro</title>
</head>
<body class="corpo">
    <header id="header">
        <?php
            session_start();
            if(isset($_SESSION['USERLOGGED'])){
                $username = $_SESSION['USERNAME'];
                include_once '../../Resources/Cabecalhos/Menu.php';
                MENU::RESPONSAVEL(0,$username,"../../index.php");
            }

        ?>
    </header>
    <div id="container">
        <script src="../../Resources/js/estilos.js"></script>
        <form action="#" method="post">
            <div class="painel">
            <label class="title_aut">
				Autorizar Aluno
			</label>
                <div id = "campos_cadastro">
                    <label class="subtitulo">
                            Aluno
                            <select class="caixa" id="input-text" type="text" value="" name="unidade"> 
                                <option  value="1">Eric</option>
                                <option  value="2">Marc</option>
                            </select>
                            <br/>
                    </label>

                    <label class="subtitulo">
                            CPF</label>
                            <input class="caixa" name="cpf" id="input-text" type="text" value="" placeholder="Digite o CPF do Aluno" required onkeydown="javascript: fMasc( this, mCPF )" maxlength="14";/>
                            
                    <label class="subtitulo">
                            Unidade
                            <select class="caixa" id="input-text" type="text" value="" name="unidade"> 
                                <option  value="1">SESI</option>
                                <option  value="2">SENAI</option>
                            </select>
                            <br/>
                    </label>

                    <label class="subtitulo">
                        Observações</label>
                            <input class="caixa" name="cpf" id="input-text" type="text" value="" placeholder="Opicional" required onkeydown="javascript: fMasc( this, mCPF )" maxlength="14";/>
                        
                </div>
            <input type="submit" class="button" name="Enviar"/>
        </div>
    </form>
    <footer></footer>
</body>
</html>