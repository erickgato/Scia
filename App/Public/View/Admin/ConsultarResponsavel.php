<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo RESOCS; ?>/css/Consultar.css" />
    <title>Lista Alunos</title>
    <link rel="stylesheet" href="<?php echo STYLES; ?>/Menu.css">
    <link rel="stylesheet" href="<?php echo STYLES; ?>/hamburguers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <header>
        <?php
            include_once RESOCS . '/Cabecalhos/menuAdm.func.php';
            GerarMenuAdmin();
            $Responsaveis = DATABASE::JOIN('sc_responsavel',null,"
            AS RESP INNER JOIN sc_tp_logradouro as TPL on 
            RESP.Re_codtpLogradouro = TPL.TL_cod INNER JOIN
            sc_bairro as BAIRRO on RESP.Re_codBairro = BAIRRO.Ba_cod
            ");
            $js_responsavel = json_encode($Responsaveis);
       ?>
    </header>

    <main>
        <div class="Searchbar">
            <input class="search-txt" type="text" name="search" oninput="Responsavel.Filter(value)"
                placeholder="Search..">
            <div style="display:none;" id="resp_Json"><?php echo $js_responsavel; ?></div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>RG</th>
                    <th>CPF</th>
                    <th>Idade</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody class="databody">
            </tbody>
        </table>
    </main>
    <script src="<?php echo RESOCS;?>/js/GetData.js">
    </script>
    <script>
    window.onload = () => {
        Responsavel.Filter("");
    };
    </script>
    <script src="<?php echo RESOCS; ?>/js/AdmMenu.js">
    </script>
</body>

</html>