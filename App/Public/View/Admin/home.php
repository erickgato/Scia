<?php
$quantidades = array(
    "Liberacoes" => DATABASE::SELECT('sc_ocorrencia', 'WHERE oc_codtpOcorrencia = 1', false, null, true),
    "Occorencias" => DATABASE::SELECT('sc_ocorrencia', null, false, null, true),
    "Alunos" => DATABASE::SELECT('sc_aluno', null, false, null, true)
);
?>
<!DOCTYPE html>
<html lang="Pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo STYLES; ?>/admin_home.css">
    <link rel="stylesheet" href="<?php echo STYLES; ?>/Menu.css">
    <link rel="stylesheet" href="<?php echo STYLES; ?>/hamburguers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="<?php echo RESOCS; ?>/images/icons/logo/favicon.png" type="image/x-icon" />
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
            <div class="searchbar">
                <input type="text" placeholder="Digite o nome do  aluno..." name="search" />
                <figure>
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                            <path d="M0,172v-172h172v172z" fill="none"></path>
                            <g fill="#ffffff">
                                <path d="M102.125,16.125c-29.62549,0 -53.75,24.12451 -53.75,53.75c0,12.8706 4.51416,24.67041 12.09375,33.92969l-42.83203,42.83203l7.72656,7.72656l42.83203,-42.83203c9.25928,7.57959 21.05908,12.09375 33.92969,12.09375c29.62549,0 53.75,-24.12451 53.75,-53.75c0,-29.62549 -24.12451,-53.75 -53.75,-53.75zM102.125,26.875c23.80957,0 43,19.19043 43,43c0,23.80957 -19.19043,43 -43,43c-23.80957,0 -43,-19.19043 -43,-43c0,-23.80957 19.19043,-43 43,-43z">
                                </path>
                            </g>
                        </g>
                    </svg>
                </figure>
            </div>
            <div class="ListAL">
                <?php
                $AlLiberados = DATABASE::JOIN('sc_ocorrencia',null, 'as OC INNER JOIN sc_aluno as AL on OC.Oc_codAluno = AL.Al_cod');
               // var_dump($AlLiberados);
                ?>
               <table class="container" border="0" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th><h1>Nome</h1></th>
			<th><h1>CPF</h1></th>
			<th><h1>Descrição da liberação</h1></th>
		</tr>
	</thead>
	<tbody>
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
                <img src="<?php echo RESOCS; ?>/images/bargraf.png" alt="Só um grafico de barras">
            </div>
        </main>
    </section>
    <section>
        <footer>

        </footer>
    </section>
    <script src="<?php echo RESOCS; ?>/js/AdmMenu.js">
    </script>
</body>

</html>