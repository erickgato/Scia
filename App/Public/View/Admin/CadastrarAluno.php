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
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="<?php echo STYLES; ?>/Menu.css">
    <link rel="stylesheet" href="<?php echo STYLES; ?>/hamburguers.css">
    <link rel="stylesheet" type="text/css" href="<?php echo RESOCS; ?>/css/cadastra_aluno.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <?php
        include_once  RESOCS . '/Cabecalhos/menuAdm.func.php';
        GerarMenuAdmin();
        if(isset($_GET['Resp_CPF'])){
            $CPFresp = $_GET['Resp_CPF'];
        }
        else{
            $CPFresp = '';
        }
    ?>
    
    <div id="container">
        <script src="<?php echo RESOCS; ?>/js/estilos.js"></script>
        <form action="#" method="post">
            <div class="painel">
            <label class="title_register">
				Cadastro de Alunos
			</label>
                <div id = "campos_cadastro">
                    <label class="subtitulo">
                            Unidade do Aluno
                            <select class="caixa" type="text" value="" name="unidade"> 
                                <option  value="1">SESI</option>
                                <option  value="2">SENAI</option>
                            </select>
                           
                    </label>
                    <label class="subtitulo">Nome </label><input class="caixa"  name="nomeAluno" type="text" value="" placeholder="Digite o Nome do Aluno" required autofocus/>
					<label class="subtitulo" for="sobrenome">Sobrenome</label><input class="caixa" type="text" name="sobrenomeAluno" placeholder="Digite o sobrenome do  aluno" required/>
                    <label class="subtitulo">
                            Data de Nascimento
                            <input class="caixa" type="date" value=""  required name="datanasc"/>
                    </label>
                    <label class="subtitulo">
                            CPF do Aluno</label>
                            <input class="caixa" name="cpf"  type="text" value="" placeholder="Digite o CPF do Aluno" required onkeydown="javascript: fMasc( this, mCPF )" maxlength="14";/>
                            
                    <label class="subtitulo">
                        CPF Responsavel</label>
                        <input class="caixa" name="CPFresp" type="text" value="<?php echo $CPFresp; ?>" placeholder="Digite o CPF do Responsavel" required/>
                        
                </div>
            <input type="submit" class="button" name="Enviar" value="Registrar"/>
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
				if (isset($_GET['Rid'])) {
        if (!isset($_GET['act']))
            print '
                <script> ShowDiv(".confirm");</script>
                ';
        else {
            $R_CPF = DATABASE::SELECT('sc_responsavel', "where Re_cod={$_GET['Rid']}");
            if (DATABASE::DELETE('sc_usuario', 'Us_login', $R_CPF[0]['Re_CPF'])) {
                if (DATABASE::DELETE('sc_responsavel', 'Re_cod', $_GET['Rid'])) {
                    echo "<script>alertify.alert('Excluido!', 'Responsável Excluidos!',() => {
                        window.location.href = 'ConsultarResponsavel';
                      });</script>";
                }
            }
        }
    }	
		
		?>
    </div>
    <script src="<?php echo RESOCS; ?>/js/AdmMenu.js"></script>
</body>
</html>