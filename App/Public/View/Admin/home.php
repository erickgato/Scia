<?php
$quantidades = array(
    "Liberacoes" => DATABASE::SELECT('sc_ocorrencia', 'WHERE oc_codtpOcorrencia = 1', false, null, true),
    "Occorencias" => DATABASE::SELECT('sc_ocorrencia', null, false, null, true),
    "Alunos" => DATABASE::SELECT('sc_aluno', null, false, null, true)
);
$AlLiberados = DATABASE::JOIN('sc_ocorrencia',null, 'as OC INNER JOIN sc_aluno as AL on OC.Oc_codAluno = AL.Al_cod');
$Json_Liberacoes = json_encode($AlLiberados);
?>
<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo STYLES; ?>/pages.css">
    <link rel="stylesheet" href="<?php echo STYLES; ?>/Menu.css">
    <link rel="stylesheet" href="<?php echo STYLES; ?>/hamburguers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="<?php echo RESOCS; ?>/images/icons/logo/favicon.png" type="image/x-icon" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
</head>

<body>
    <section>
        <header>
            <?php 
            include_once RESOCS . '/Cabecalhos/menuAdm.func.php';
            GerarMenuAdmin();
            ?>
        </header>
    </section>
    <section>
        <main>
            </div>
            <div class="card-group">
                <div class="card a">
                    <div class="card-content">
                        <h2><?php echo $quantidades['Liberacoes']; ?></h2>
                        <span>Alunos</span>
                        <p>liberados hoje</p>
                    </div>
                </div>
                <div class="card b">
                    <div class="card-content">
                        <h2><?php echo $quantidades['Occorencias']; ?></h2>
                        <span>Ocorrências</span>
                        <p>Registradas</p>
                    </div>
                </div>
                <div class="card c">
                    <div class="card-content">
                        <h2><?php echo $quantidades['Alunos']; ?></h2>
                        <span>Alunos</span>
                        <p>Cadastrados</p>
                    </div>
                </div>
            </div>
            <section class='grid-layout'>
                <div class="searchbar">
                    <input type="text" oninput="Liberacoes.Filter(value)" placeholder="Digite o nome do  aluno..." name="search" />
                    <span><img src="https://img.icons8.com/material/96/000000/search--v1.png" /></span>

                </div>
                <div class="ListAL">
                    <div style="display:none;" id="jsondata"><?php print($Json_Liberacoes); ?></div>
                    <table class="container" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>
                                    <h1>Nome</h1>
                                </th>
                                <th>
                                    <h1>CPF</h1>
                                </th>
                                <th>
                                    <h1>Descrição da liberação</h1>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="datbody">
                            <?php foreach ($AlLiberados as $aluno): ?>
                            <tr>
                                <td><?php print($aluno['Al_nome']. " " . $aluno['Al_sobrenome']); ?></td>
                                <td><?php print($aluno['Al_CPF']); ?></td>
                                <td><?php print($aluno['Oc_observacao']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="OCchart">
                    <canvas class="chart"></canvas>
                </div>
            </section>

        </main>
    </section>
    <section>
        <footer>

        </footer>
    </section>
    <script src="<?php echo RESOCS;?>/js/GetData.js"></script>
    <script src="<?php echo RESOCS; ?>/js/AdmMenu.js"></script>
    <script src="<?php echo RESOCS; ?>/js/chart.js"></script>
    <script>
        $(document).ready(() => {
            Liberacoes.Filter("");
        })

    </script>
</body>

</html>