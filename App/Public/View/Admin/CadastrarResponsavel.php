<?php
if (!isset($_SESSION['ADMINLOGGED']))
    header("Location: index.php");
$idade = array(
    "Min" => 18,
    "max" => 130,
);
$datalimitada = array(
    "Max" => (date('Y') - $idade['Min']) . date('-m-d'),
    "Min" => (date('Y') - $idade['max']) . date('-m-d')
);
?>
<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo STYLES; ?>/hamburguers.css">
    <link rel="stylesheet" type="text/css" href="<?php echo RESOCS; ?>/css/responsaveis.css" />
    <link rel="stylesheet" href="<?php echo RESOCS; ?>/css/Menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Cadastrar Responsavel</title>
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

                    <label class="subtitulo">RG </label><input class="caixa rg" name="RG" type="text" placeholder="RG do Responsável" required maxlength="11" autofocus />
                    <label class="subtitulo">CPF</label><input class="caixa cpf" type="text" name="CPF" placeholder="CPF do Responsável" onkeydown="javascript: fMasc( this, mCPF )" maxlength="14" required />
                    <label class="subtitulo">Data de Nascimento </label>
                    <input class="caixa" type="date" min="<?php print($datalimitada['Min']); ?>" max="<?php print($datalimitada['Max']); ?>" value="" required name="datanasc" />

                    <label class="subtitulo">CEP </label>
                    <input class="caixa cep" maxlength="8" type="text" placeholder="Digite seu CEP" value="" name="CEP" />

                    <label class="subtitulo">Endereço</label>
                    <textarea name="endereco" class="endereco" cols="4" rows="4" readonly></textarea>

                    <input type="hidden" value="1" name="T_lograd">

                    <label class="subtitulo">Bairro </label>
                    <input class="caixa bairro" type="text" value="" name="Bairro" readonly />
                </div>
                <input type="submit" class="button enviar" name="Enviar" />
            </div>

        </form>
        <?php include PUBLICPATH . '/View/Admin/POSTDATA/CadastrarResponsavel.php' ?>
        <footer> powered by scia</footer>
    </div>
    <script src="<?php echo RESOCS; ?>/js/AdmMenu.js"></script>
    <script>
        $(".rg").on('input', (e) => {
            $(".rg").val(RemoveNnumeros($(e.target).val()))
        })
        $(".cep").on('input', (e) => {
            $(".cep").val(RemoveNnumeros($(e.target).val()))
        })


        $(".cep").focusout(() => {
            const cep = $(".cep").val();
            if (cep.length == 8) {
                const fetchurl = `https://webmaniabr.com/api/1/cep/${cep}/?app_key=C6riFPEG30CeH0LevGVZuMgffkY2mrxI&app_secret=tolABIpNgIaNDirU2WDpCHKuLgpXgVu2h8L4LEpuHQFATSi9`;
                const dados = fetch(fetchurl).then(Response => Response.json()).then(dat => {
                    if (dat.error == 'CEP inválido') {
                        alertify.alert('Erro', 'CEP não encontrado');
                    } else {
                        $(".bairro").val(dat.bairro);
                        $(".endereco").val(dat.endereco);
                    }

                }).catch(error => {
                    alertify.alert('Olá', 'CEP não encontrado');
                })
            } else {
                alertify.alert('Erro', 'CEP inválido');
            }
        });


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