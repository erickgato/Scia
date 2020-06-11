<?php
    function menu($selected){
        $opcoesdomenu = array("");
        $quantidadedeopcoes = count($opcoesdomenu);
?>  
<label for="menu_resp"></label>
<nav class="menu">
    <div class="logo" href="#">
        <h1><a href="#">SCIA</a></h1>
    </div>
    <ul class="opcoes">
        <?php
            for( $i = 0; $i < $quantidadedeopcoes; $i++  ){
                if($selected == $i){
                    echo '<li><a href="#" class="selecionado">'. $opcoesdomenu[$i] . ' </a></li>';
                }
                else{
                    echo '<li><a href="#">'. $opcoesdomenu[$i] . ' </a></li>';
                }
            }
        ?>
    </ul>
</nav>
<?php    
    }
?>
