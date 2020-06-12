<?php
    session_start();
    if(isset($_SESSION['PATH']))
       define("PATH",$_SESSION['PATH']);
    else
        header("Location: ../../index.php");
    
    function Postdata(string $name){
            $typevar = $_POST[$name];
            return $typevar;
        }
    include_once '../../Resources/Cabecalhos/menuAdm.func.php';
     //Incluindo classes 
    require_once '../../../config.php';
    require_once '../../../Model/SCHEMA.php';
    require_once '../../../classes/class-debug.php';
    $tiposdelog = DATABASE::SELECT('sc_tp_logradouro');
    $bairros = DATABASE::SELECT('sc_bairro');

?>
<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../Resources/css/responsaveis.css"/> 
    <title>Cadastrar Responsavel</title>
</head>
<body class="corpo">
    <header id="header">
<?php
    GerarMenuAdmin();
?>
    </header>
    <div id="container">
        <script src="../../Resources/js/estilos.js"></script>
        <form action="#" method="post">
            <div class="painel">
                <label class="title_register">
                    Cadastro de responsaveis
                </label>
                    <div id = "campos_cadastro">
                        <label class="subtitulo">Nome do Responsável</label>
                            <input class="caixa" type="text" name="nome">
                        
                        <label class="subtitulo">RG </label><input class="caixa"  name="RG" type="text" placeholder="RG do Responsável" required maxlength="10" autofocus/>
                        <label class="subtitulo">CPF</label><input class="caixa" type="text" name="CPF" placeholder="CPF do Responsável" onkeydown="javascript: fMasc( this, mCPF )" maxlength="14" required/>
                        <label class="subtitulo">Data de Nascimento </label>
                                <input class="caixa" type="date" value=""  required name="datanasc"/>
                       
                        <label class="subtitulo">Endereço</label>
                                <textarea name="endereco" cols="4" rows="4" ></textarea>
                                
                        <label class="subtitulo">Tipo de logradouro </label>
                                <select class="caixa" type="text" value="" name="T_lograd"> 
                                    <?php 
                                        foreach ($tiposdelog as $log) {
                                            echo '<option value = "' .$log['TL_cod'] . '">' . $log['TL_nome'] . '</option>';
                                        }
                                    ?>
                                </select>
                        <label class="subtitulo">Bairro </label>
                                <select class="caixa" type="text" value="" name="T_CodBairro"> 
                                <?php 
                                        foreach ($bairros as $bairro) {
                                            echo '<option value = "' .$bairro['Ba_cod'] . '">' . $bairro['Ba_nome'] . '</option>';
                                        }
                                    ?>
                                </select>
                            
                    </div>
                <input type="submit" class="button" name="Enviar"/>
        </div>

    </form>
<footer>  powered by scia</footer>
	<?php 
				if(isset($_POST['Enviar'])){ 
                   
                    $Responsavel = array(
                        'RG' => (int) Postdata('RG'), "CPF" => Postdata('CPF'),
                        'Nascimento' => Postdata('datanasc'), 'Nome' => Postdata('nome'),
                        'Lograd' => (string) Postdata('endereco'),
                        'T_log' => (string) Postdata('T_lograd'),
                        'T_Bair' => (string) Postdata('T_CodBairro'),

                    );
                    var_dump($Responsavel);
                    /*
                        realiza um select buscando o id do responsavel 
                        cujo CPF foi inserido
                    */
                    $Resp_rows = DATABASE::SELECT('sc_responsavel',"WHERE Re_CPF = '{$Responsavel['CPF']}'",false,false,true);
                    if($Resp_rows > 1) {
                        echo "Usuário já existe";
                        die();
                    }

                    //Insere os dados na tabela responsavel
                    $Result = DATABASE::INSERT(
                        'sc_responsavel',['',$Responsavel['RG'],$Responsavel['CPF'],
                        $Responsavel['Nascimento'],$Responsavel['Nome'],$Responsavel['Lograd'],
                        $Responsavel['T_log'],$Responsavel['T_Bair']                
                        ]);
                    if($Result){
                        //Insere dados na tabela usuario
                        $CREATEUSER = DATABASE::INSERT(
                            'sc_usuario',
                            ['',$Responsavel['CPF'],$Responsavel['CPF'],'2',date('Y-m-d')]
                        );
                        if($CREATEUSER){
                            //Procura os dados inseridos
                            $RespCreated = DATABASE::SELECT('sc_usuario',"WHERE Us_login = '{$Responsavel['CPF']}'");
                            $cod = $RespCreated[0]['Us_cod'];
                            //Insere dados na terceira tabela de usuario e responsavel
                            $ThirdTable = DATABASE::INSERT('sc_usuario_responsavel',['',$cod,$Responsavel['CPF']]);
                            if($ThirdTable){
                                echo "<script>alert('Dados inseridos com sucesso!')</script>";
                            }
                            else{
                                echo "Falha ao criar indice";
                            }
                        }
                        else {
                            echo "Falha ao criar usuario";
                        }
                            
                        
                    }
                    DEBUG::log('Database Connection in Cadastro Responsavel');
                    if(!$Result)
                        echo "Falha ao adicionar responsavel";
                    
                       
                    
				}
					
		
		?>
    </div>
</body>
</html>