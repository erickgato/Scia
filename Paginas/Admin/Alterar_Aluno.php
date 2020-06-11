<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css"/> 
    <title>Alterar Aluno</title>
    <script language="JavaScript" src="../../JS/estilos.js"></script>
</head>
<body class="corpo">
    <header>
        <?php
            include_once 'menuAdm.func.php';
            menu(0);
        ?>
    </header>
    <div id="container">
        <form action="#" method="post">
            <div class="painel">
                <label for="frase_aut_aluno">
                    <h1>Alterar Aluno</h1>
                </label>
                <div id = "campos_cadastro">
                    <label>
                            Unidade do Aluno
                            <select id="input-text" type="text" value="" name="unidade"> 
                                <option  value="1">SESI</option>
                                <option  value="2">SENAI</option>
                            </select>
                    </label>
                    <label>
                            Nome
                            <input name="nomeAluno" id="input-text" type="text" value="" placeholder="Digite o Nome do Aluno"/>
                    </label>
					<label for="sobrenome">
							Sobrenome
							<input type="text" name="sobrenomeAluno" placeholder="Digite o sobrenome do  aluno"/>
					</label>
                    <label>
                            Data de Nascimento
                            <input id="input-text" type="date" value="" placeholder="Digite a Data de Nascimento do Aluno" name="datanasc"/>
                    </label>
                    <label>
                            CPF do Aluno
                            <input name="cpf" id="input-text" type="text" value="" placeholder="Digite o CPF do Aluno" onkeydown="javascript: fMasc( this, mCPF )" maxlength="14";/>
                    </label>
                        Cod Responsavel
                        <input id="input-text" name="respid" type="text" value="" placeholder="Digite o id do Responsavel";/>
                </div>
            <input type="submit" class="botao" name="Enviar"/>
        </div>
    </form>
	<?php 
				if(isset($_POST['Enviar'])){ 
					$UnidadeAluno = $_POST['unidade'];
					$nome = $_POST['nomeAluno'];
					$sobrenome = $_POST['sobrenomeAluno'];
					$datanasc = $_POST['datanasc'];
					$CPFalun = $_POST['cpf'];
					$idresp = $_POST['respid'];
                    $codaluno = $_GET['codaluno'];
                    var_dump($codaluno);
					include_once '../../classes/CadastroAluno.php';
					$aluno = new Aluno($nome,$sobrenome,$datanasc,$CPFalun,$idresp,$UnidadeAluno);
					$aluno->editar($codaluno);
				}					
			?>
    </div>
</body>
</html>