<?php
if (!isset($_SESSION['ADMINLOGGED'])) {
    header("Location: index.php");
}
date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d');
$quantidades = array(
    "Liberacoes" => DATABASE::SELECT('sc_ocorrencia', "WHERE oc_codtpOcorrencia = 1 AND Oc_data = '$data' ", false, null, true),
    "Occorencias" => DATABASE::SELECT('sc_ocorrencia', "WHERE Oc_data = '$data' ", false, null, true),
    "Alunos" => DATABASE::SELECT('sc_aluno', null, false, null, true)
);
$AlLiberados = DATABASE::JOIN('sc_ocorrencia', "WHERE Oc_data = '$data' ", 'as OC INNER JOIN sc_aluno as AL on OC.Oc_codAluno = AL.Al_cod');
$Json_Liberacoes = json_encode($AlLiberados);
function QueryDay(int $day, int $tipooccorencia)
{
    $ActualMonth =  date('m');
    $Rday = DATABASE::SELECT('sc_ocorrencia', "WHERE MONTH(Oc_data) = {$ActualMonth} AND WEEKDAY(Oc_data) = {$day} AND Oc_codtpOcorrencia = {$tipooccorencia}", false, null, true);
    return $Rday;
}
$WeekL = array();
$WeekG = array();
$WeekA = array();
for ($i = 0; $i < 5; $i++) {
    $WeekL[$i] = QueryDay($i, 1);
    $WeekG[$i] = QueryDay($i, 2);
    $WeekA[$i] = QueryDay($i, 3);
}
$Datagraf = array(
    "Liberacoes" => $WeekL,
    "Gaz" => $WeekA,
    "Atrasos" => $WeekG
);
$js_data_graf = json_encode($Datagraf);
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
    <link rel="shortcut icon" href="<?php echo RESOCS; ?>/images/icons/logo/favicon.ico" type="image/x-icon" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
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

<body>
    <section>
        <header>
            <nav class="Menu">
                <div class="hammain">
                    <input type="checkbox" id="opmenu">
                    <label for="opmenu">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </label>
                </div>


                <div class="level">
                    <div class="MenuItem">
                        <input type="checkbox">
                        <i class="fa fa-home home" aria-hidden="true"></i><label for="A1"><a href="homeadmin">Home</a></label>
                    </div>
                    <div class="MenuItem">
                        <input type="checkbox" id="A">
                        <i class="fa fa-caret-down arrow" aria-hidden="true"></i><label for="A">Consultar</label>
                        <ul>
                            <li> <a href="ConsultarAluno">ALUNO</a></li>
                            <li><a href="ConsultarResponsavel">RESPONSÁVEL</a></li>
                            <li><a href="ConsultarFuncionario">FUNCIONÁRIO</a></li>
                        </ul>
                    </div>
                    <div class="MenuItem">
                        <input type="checkbox" id="B">
                        <i class="fa fa-caret-down arrow" aria-hidden="true"></i><label for="B">Cadastrar</label>
                        <ul>
                            <li> <a href="CadastrarAluno">ALUNO</a></li>
                            <li><a href="CadastrarResponsavel">RESPONSÁVEL</a></li>
                            <li><a href="CadastFunc">FUNCIONÁRIO</a></li>
                        </ul>
                    </div>
                    <div class="MenuItem">
                        <input type="checkbox" id="c">
                        <i class="fa fa-caret-down arrow" aria-hidden="true"></i><label for="c">Solicitar</label>
                        <ul>
                            <li> <a href="Relatorio">RELATÓRIO</a></li>
                        </ul>
                    </div>
                    <div class="MenuItem">
                        <input type="checkbox">
                        <i class="fa fa-sign-out home" aria-hidden="true"></i><label><a id="loggout" href="index.php">Sair</a></label>
                    </div>
                </div>
            </nav>
            <section class="Horizontal-Wi">
                <span class="logo">
                    <h2>SCIA</h2>
                </span>
            </section>
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
                <div class="monthchart">
                    <div id="chartdata" style="display: none;"><?php echo $js_data_graf; ?></div>
                    <div class="chartarea">
                        <canvas class="month"></canvas>
                    </div>
                </div>
                <div class="OCchart">
                    <div id="chartdata" style="display: none;"><?php echo $js_data_graf; ?></div>
                    <div class="chartarea">
                        <canvas class="chart"></canvas>
                    </div>
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
                                        <h1>Descrição Ocorrência</h1>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="datbody">
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </section>
    <section>
        <footer>

        </footer>
    </section>
    <script src="<?php echo RESOCS; ?>/js/GetData.js"></script>
    <script src="<?php echo RESOCS; ?>/js/AdmMenu.js"></script>
    <script src="<?php echo RESOCS; ?>/js/chart.js"></script>
    <script>
        $(document).ready(() => {
            Liberacoes.Filter("");
            alertify.alert('Olá', 'Bem vindo!', () => {
                alertify.success('ótimo!')
            });
        })
    </script>
</body>

</html>