<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../Resources/css/estilos.css"/> 
    <title>Cadastrar Aluno</title>
</head>
<body class="corpo">
    <header>
        <?php
            include_once '../../Resources/Cabecalhos/menuAdm.func.php';
            menu(0,"VANESSA");
        ?>
    </header>
    <div id="container">
        <form action="#" method="post">
            <div class="painel">
                <label for="frase_aut_aluno">
                    <h1>Cadastro do Aluno</h1>
                </label>
                <div id = "campos_cadastro">
                    <label>
                            Unidade do Aluno
                            <select id="input-text" type="text" value="" name="unidade"> 
                                <option  value="1">SESI</option>
                                <option  value="2">SENAI</option>
                            </select>
                    </label>
                    <label>Nome </label>
                            <input name="nomeAluno" id="input-text" type="text" value="" placeholder="Digite o Nome do Aluno"/>
                    
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
					$idresp = (int) $_POST['respid'];
                    var_dump($idresp);
                    include_once '../../../config.php';
                    include_once '../../../Model/SCHEMA.php';
                    include_once '../../../classes/class-debug.php';
                    DATABASE::INSERT('sc_aluno',['',$nome,$sobrenome,$datanasc,$CPFalun,$idresp,$UnidadeAluno]);
				}
					
		
		?>
    </div>
</body>
</html>