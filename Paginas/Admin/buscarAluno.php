<!DOCTYPE html>
<html lang="Pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css"/> 
    <title>Buscar Aluno</title>
</head>
<body>
    <?php
        include_once '../../classes/CadastroAluno.php';
        include_once '../Cabecalhos/menuAdm.func.php';
        menu(2);
        $alunos = new aluno();
    ?>
    <form action="#" method="get">
    <input type="text" name="buscar"/>
    <input type="submit" name="enviar"/>
    </form>
        <?php 
            if(isset($_GET['enviar'])){
                $buscar = $_GET['buscar'];
                if(empty($buscar)){
                    $alunos->buscar();
                }
                else{
                    $alunos->buscar($buscar);
                }
            }
            if(isset($_GET['CodAluno'])){
                $deletar = $_GET['del'];
                $codaluno = $_GET['CodAluno'];
                if($deletar == true){
                    $alunos->apagar($codaluno);
                    echo "dados apagados com sucesso";
                }
            else{
                header('location: alterar_aluno.php?codaluno='.$codaluno);
            }
        }      
    ?>
</body>
</html>