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
    <link rel="stylesheet" type="text/css" href="<?php echo RESOCS; ?>/css/responsaveis.css" />
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
        <script src="../../Resources/js/estilos.js"></script>
        <form action="POSTDATA/CadastrarResponsavel.php" method="post">
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
                        <?php 
                                        foreach ($bairros as $bairro) {
                                            echo '<option value = "' .$bairro['Ba_cod'] . '">' . $bairro['Ba_nome'] . '</option>';
                                        }
                                    ?>
                    </select>

                </div>
                <input type="submit" class="button" name="Enviar" />
            </div>

        </form>
        <footer> powered by scia</footer>
    </div>
</body>

</html>