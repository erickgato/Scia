<?php 
if(!isset($_SESSION['ADMINLOGGED'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo STYLES; ?>/Menu.css">
    <link rel="stylesheet" href="<?php echo STYLES; ?>/hamburguers.css">
    <title>Cadastrar Funcionario</title>
    <link rel="stylesheet" type="text/css" href="<?php echo RESOCS; ?>/css/cadastra_aluno.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--ALERT BOX -->
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <link rel="shortcut icon" href="<?php echo RESOCS; ?>/images/icons/logo/favicon.ico" type="image/x-icon" />
</head>

<body class="corpo">
    <header>
        <?php
            include_once RESOCS . '/Cabecalhos/menuAdm.func.php';
            GerarMenuAdmin();
            $unidades = DATABASE::SELECT('sc_unidade');
            $funcionarios = DATABASE::SELECT('sc_tp_funcionario');
        ?>
    </header>
    <div id="container">
        <script src="<?php echo RESOCS; ?>/js/estilos.js"></script>
        <form action="#" method="post">
            <div class="painel">
                <label class="title_register">
                    Cadastro de Funcionarios
                </label>
                <div id="campos_cadastro">
                    <label class="subtitulo">
                        Unidade do Funcionario
                        <select class="caixa"  type="text" value="" name="Unidade" required>
                            <?php foreach ($unidades as $unidade ): ?>
                            <option value="<?php print($unidade['Un_cod']); ?>"><?php print($unidade['Un_nome']); ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </label>
                    <label class="subtitulo">
                        Tipo de Funcionario
                        <select class="caixa"  type="text" value="" name="f[Tipo]" required>
                            <<?php foreach ($funcionarios as $func ): ?> <option
                                value="<?php print($func['TF_Cod']); ?>"><?php print($func['TF_nome']); ?></option>
                                <?php endforeach ?>
                        </select>
                    </label>
                    <label class="subtitulo">
                        Nome
                        <input class="caixa" name="f[Nome]"  type="text" value=""
                            placeholder="Digite o Nome do Funcionario" required />
                    </label>
                    <label class="subtitulo">
                        CPF
                        <input class="caixa cpf" type="text" name="f[CPF]" placeholder="Digite o CPF do Funcionario"
                            onkeydown="javascript: fMasc( this, mCPF )" maxlength="14" requireds />
                    </label>
                    <label class="subtitulo">
                        Matrícula
                        <input class="caixa" name="f[matricula]" type="text" value=""
                            placeholder="Digite a matrícula" required />
                    </label>
                </div>
                <input type="submit" class="botao enviar" name="Enviar" />
            </div>
        </form>
        < <?php 
				if((isset($_POST['Enviar'])) && (isset($_POST['f']))){ 
                    $fun = array(
                        "T" => $_POST['f']['Tipo'],
                        'Nom' => $_POST['f']['Nome'],
                        'CPF' => $_POST['f']['CPF'],
                        'mat' =>  $_POST['f']['matricula'],
                        'un' => $_POST['Unidade']
                    );
                    date_default_timezone_set('UTC');
                    if(DATABASE::SELECT('sc_funcionario',"WHERE Fu_CPF = '{$fun['CPF']}'",false,null,true) == 0) {
                        $Inserts = array(
                            "func" => DATABASE::INSERT('sc_funcionario',['',$fun['Nom'],$fun['CPF'],$fun['mat'],$fun['un'],$fun['T']]),
                            "Usuario" => DATABASE::INSERT('sc_usuario',['',$fun['CPF'],base64_encode($fun['CPF']),3,Date('Y-m-d')]),
                        );
                        if($Inserts){
                            echo "<script>
                                alertify.alert('Sucesso', 'Funcionário cadastrado com sucesso!',() => {
                                alertify.success('Cadastro concluido!')
                              });</script>";
                        }
                        else{
                            echo "
                            <script>
                                alertify.alert('Error', 'Falha no cadastro de Funcionário!',() => {
                                alertify.error('Falha no contato')
                              });</script>
                            
                            ";
                        }
                    }
                        
                    
				}
        ?> </div>
            <script src="<?php echo RESOCS; ?>/js/AdmMenu.js"></script>
            <script>
            $(".enviar").click((e) => {
                if (!TestaCPF($(".cpf").val())) {
                    alertify.alert('Falha', 'CPF inválido', () => {
                        alertify.error('CPF inválido');
                    })
                    e.preventDefault();
                }
            })
            </script>
</body>

</html>