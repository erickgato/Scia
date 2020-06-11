<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css"/> 
    <title>Cadastrar Funcionario</title>
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
                    <h1>Cadastro de Funcionario</h1>
                </label>
                <div id = "campos_cadastro">
                    <label for="UnidadeFunc">
                            Unidade do Funcionario
                            <select id="input-text" type="text" value="" name="Unidade"> 
                                <option  value="1">SESI</option>
                                <option  value="2">SENAI</option>
                            </select>
                    </label>
                    <label for="TipoFunc">
                            Tipo de Funcionario
                            <select id="input-text" type="text" value="" name="TipoFuncionario"> 
                                <option  value="1">Comercial</option>
                                <option  value="2">Orientador</option>
                                <option  value="3">Cordenador</option>
                                <option  value="4">Monitor</option>
                            </select>
                    </label>
                    <label for="NomeFunc">
                            Nome do Funcionario
                            <input name="NomeFuncionario" id="" type="text" value="" placeholder="Digite o Nome do Funcionario"/>
                    </label>
					<label for="CPFFunc">
							CPF do Funcionario
							<input type="text" name="CPF" placeholder="Digite o CPF do Funcionario" onkeydown="javascript: fMasc( this, mCPF )" maxlength="14"/>
					</label>
                    <label for="CodigoFunc">
                            Código do Funcionario
                            <input name="CodigoFuncionario" id="" type="text" value="" placeholder="Digite o Código do Funcionario"/>
                    </label>
                </div>
            <input type="submit" class="botao" name="Enviar"/>
        </div>
    </form><
	<?php 
				if(isset($_POST['Enviar'])){ 
                    $UnidadeFuncionario = $_POST['unidade'];
                    $TipoFuncionario = $_POST['Tipofuncionario'];
					$NomeFuncionario = $_POST['NomeFuncionario'];
					$CPFFuncionario = $_POST['CPF'];
					$CodigoFuncionario = $_POST['Matricula'];
					
					include_once '../../classes/CadastroFuncionario.php';
					$funcionario = new Funcionario($UnidadeFuncionario,$TipoFuncionario,$NomeFuncionario,$CPFFuncionario,$Matricula);
					
					$funcionario->cadastrar();
				}
					
		
		?>
    </div>
</body>
</html>