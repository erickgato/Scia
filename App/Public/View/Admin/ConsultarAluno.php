<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo RESOCS; ?>/css/Consultar.css" />
    <title>Lista Alunos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>
<body>
    <header>
        <?php
            include_once RESOCS . '/Cabecalhos/menuAdm.func.php';
            GerarMenuAdmin();
            $Alunos = DATABASE::JOIN('sc_aluno',null,"AS AL INNER JOIN sc_unidade AS UN ON AL.Al_codUnidade = UN.Un_cod INNER JOIN sc_responsavel AS RESP on AL.Al_codResponsavel = RESP.Re_cod;");
            $js_Alunos_json = json_encode($Alunos);
       ?>
    </header>
   
    <main>
    <div class="Searchbar"> 
    <input type="text" name="search" oninput="Aluno.Filter(value)" placeholder="Search..">
    <div style="display:none;" id="Al_Json"><?php echo $js_Alunos_json; ?></div>    
</div>  
   
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Responsavel</th>
                <th>Unidade</th>
                <th>DataNascimento</th>
                <th>CPF</th>
            </tr>
        </thead>
        <tbody class="databody"> 
        </tbody>
    </table>
</main>
<script src="<?php echo RESOCS;?>/js/GetData.js">
<script>
</body>
</html>