<!DOCTYPE html>
<?php
     function Postdata(string $name){
        $typevar = $_POST[$name];
        return $typevar;
    }
?>
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
            include_once "../../Resources/Cabecalhos/Menu.php";
            MENU::ADMIN(0);
        ?>
    </header>
    <div id="container">
        <script src="../../Resources/js/estilos.js"></script>
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
                            <br/>
                    </label>
                    <label>Nome </label><input name="nomeAluno" id="input-text" type="text" value="" placeholder="Digite o Nome do Aluno" required autofocus/>
                    
					<label for="sobrenome">Sobrenome</label><input type="text" name="sobrenomeAluno" placeholder="Digite o sobrenome do  aluno" required/>
                    <label>
                            Data de Nascimento
                            <input id="input-text" type="date" value="" placeholder="Digite a Data de Nascimento do Aluno" required name="datanasc"/>
                    </label>
                    <label>
                            CPF do Aluno
                            <input name="cpf" id="input-text" type="text" value="" placeholder="Digite o CPF do Aluno" required onkeydown="javascript: fMasc( this, mCPF )" maxlength="14";/>
                    </label>
                        CPF Responsavel
                        <input id="input-text" name="CPFresp" type="text" value="" placeholder="Digite o CPF do Responsavel" required/>
                </div>
            <input type="submit" class="botao" name="Enviar"/>
        </div>
    </form>
	<?php 
				if(isset($_POST['Enviar'])){ 
                   
                    $Aluno = array(
                        'Unidade' => (int) Postdata('unidade'), "nome" => Postdata('nomeAluno'),
                        "sobrenome" => Postdata('sobrenomeAluno'),
                        'Nascimento' => Postdata('datanasc'), 'CPF' => Postdata('cpf'),
                        'CPFRESP' => (string) Postdata('CPFresp') 

                    );
                    //Incluindo classes 
                    include_once '../../../config.php';
                    include_once '../../../Model/SCHEMA.php';
                    include_once '../../../classes/class-debug.php';
                    /*
                        realiza um select buscando o id do responsavel 
                        cujo CPF foi inserido
                    */
                    $Resp = DATABASE::SELECT('sc_responsavel',"WHERE Re_CPF = '{$Aluno['CPFRESP']}'");
                    //Insere os dados
                    $Result = DATABASE::INSERT(
                        'sc_aluno',['',$Aluno['Unidade'],$Aluno['nome'],
                        $Aluno['sobrenome'],$Aluno['Nascimento'],$Aluno['CPF'],
                        $Resp[0]['Re_cod']
                        
                        ]);
                    DEBUG::log('Database Connection in Cadastro aluno');
                    if(!$Result)
                        echo "Falha ao adicionar dados tente novamente";
                    else
                        echo "<script>alert('Dados inseridos com sucesso!')</script>";
                    
				}
					
		
		?>
    </div>
</body>
</html>