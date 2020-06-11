<?php
    function menu($selected){
        $usuario = "ERICK";
        $opcoesdomenu = array("AUTORIZAR ALUNO","PRINCIPAL", $usuario);
        $quantidadedeopcoes = count($opcoesdomenu);
?>
    <label for="menu_resp"></label>
    <nav class="menu">
        <div class="logo" href="#">
            <h1><a href="#">SCIA</a></h1>
        </div>
        <ul class="opcoes">
            <?php
                $Links = array('autorizaaluno.php','index.php','perfil.php');
                for( $i = 0; $i < $quantidadedeopcoes; $i++  ){
                    if($selected == $i){
                        echo '<li><a href="'.$Links[$i].'" class="selected">'.$opcoesdomenu[$i].'</a></li>';
                    }
                    else{
                        echo '<li><a href="'.$Links[$i].'">'.$opcoesdomenu[$i].'</a></li>';
                    }
                }
            ?>
        </ul>
    </nav>
<?php
    }
?>
