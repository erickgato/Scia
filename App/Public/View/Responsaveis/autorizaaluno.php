<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../Resources/css/estilos.css"/> 
    <title>Cadastro</title>
</head>
<body class="corpo">
    <header id="header">
        <?php
            include_once '../Cabecalhos/menuresponsavel.php';
            menu(0);
        ?>
    </header>
    <div class="painel">
        <form action="#" method="post">
            <?php
                $inputs = array('select','text','select','text','submit');
                $select = array('Marc','Cauan','Sesi','Senai');
                $classi = array('caixa','caixa','caixa','caixa','botao');
                $subtit = array('Aluno','CPF','Unidade','Observação (opcional)','');
                $qtdopc = count($inputs);
                $qtdsel = count($select);
                echo '<label for="titulo">Autorizar Aluno</label></br>';
                for($i = 0; $i < $qtdopc; $i++){
                    echo '<label for="subtitulo">'.$subtit[$i].'</label>';
                    if($inputs[$i] == "select"){
                        echo '<select class="caixa">';
                        for($x = 0; $x < $qtdsel; $x++){
                            echo '<option>'.$select[$x].'</option>';
                        }
                        echo '</select>';
                    }
                    else{
                        echo '<input type="'.$inputs[$i].'" class="'.$classi[$i].'"/>';
                    }
                }
            ?>
        </form>
    </div>
    <footer></footer>
</body>
</html>