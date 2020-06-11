<?php
    function menu($selected){
        $opcoesdomenu = array("SOLICITAR AUTORIZAÇÃO","RELATÓRIO","CADASTRAR","ENVIAR NOTIFICAÇÃO", "Vanessa");
        $quantidadedeopcoes = count($opcoesdomenu);
        $Links = array('solicitar_auto.php','relatorio.php','perfiladm.php','cadastrar.php','notificar.php');

?>  
    <label for="menu_resp"></label>
        <nav class="menu">
            <div class="logo" href="#">
                <h1>SCIA</h1>
            </div>
            <ul class="options">
                <?php
                    for( $i = 0; $i < $quantidadedeopcoes; $i++  ){
                        if($selected == $i){
                            echo '<li><a href="' .$Links[$i] . '" class="selected">'. $opcoesdomenu[$i] . ' </a></li>';
                        }
                        else{
                            echo '<li><a href="' .$Links[$i] .  '">'. $opcoesdomenu[$i] . ' </a></li>';
                        }
                    }
                ?>
            </ul>
        </nav>
<?php    
    }
?>