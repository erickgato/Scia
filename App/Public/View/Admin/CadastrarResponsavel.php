<?php
    if(!isset($_SESSION['ADMINLOGGED']))
        header("Location: index.php");
    $tiposdelog = DATABASE::SELECT('sc_tp_logradouro');
    $bairros = DATABASE::SELECT('sc_bairro');
?>
<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo STYLES; ?>/Menu.css">
    <link rel="stylesheet" href="<?php echo STYLES; ?>/hamburguers.css">
    <link rel="stylesheet" type="text/css" href="<?php echo RESOCS; ?>/css/responsaveis.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Cadastrar Responsavel</title>
</head>

<body class="corpo">
    <header id="header">
        <?php
    include_once RESOCS . '/Cabecalhos/menuAdm.func.php';
    GerarMenuAdmin();
?>
    </header>
    <div id="container">
        <script src="<?php echo RESOCS; ?>/js/estilos.js"></script>
        <form action="" method="post" id="formcadastro">
            <div class="painel">
                <label class="title_register">
                    Cadastro de responsaveis
                </label>
                <div id="campos_cadastro">
                    <label class="subtitulo">Nome do Responsável</label>
                    <input class="caixa" type="text" name="nome">

                    <label class="subtitulo">RG </label><input class="caixa" name="RG" type="text"
                        placeholder="RG do Responsável" required maxlength="10" autofocus />
                    <label class="subtitulo">CPF</label><input class="caixa" type="text" name="CPF"
                        placeholder="CPF do Responsável" onkeydown="javascript: fMasc( this, mCPF )" maxlength="14"
                        required />
                    <label class="subtitulo">Data de Nascimento </label>
                    <input class="caixa" type="date" value="" required name="datanasc" />

                    <label class="subtitulo">Endereço</label>
                    <textarea name="endereco" cols="4" rows="4"></textarea>

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
                        <?php foreach ($bairros as $bairro): ?>
                        <option value="<?php echo $bairro['Ba_cod'];?>"><?php echo $bairro['Ba_nome'];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="submit" class="button" name="Enviar" />
            </div>

        </form>
        <?php include PUBLICPATH . '/View/Admin/POSTDATA/CadastrarResponsavel.php' ?>
        <footer> powered by scia</footer>
    </div>
    <script src="<?php echo RESOCS; ?>/js/AdmMenu.js"></script>
</body>

</html>