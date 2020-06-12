<?php 
class MENU{
    private static function DRAW($content,int $countOpt,$selected,array $Href){
        $nav = 
        '<label for="menu_resp"></label>
        <nav class="menu">
            <div class="logo" href="#">
                <h1><a href="#">SCIA</a></h1>
            </div>
            <ul class="opcoes">
        ';
        for( $i = 0; $i < $countOpt; $i++  ){
            if($selected == $i){
                $nav .= '<li><a href="' .$Href[$i] . '" class="selected">'. $content[$i] . ' </a></li>';        
            }
            else{
                        $nav .=  '<li><a href="' .$Href[$i] .  '">'. $content[$i] . ' </a></li>';
                    }
                }
        $nav .= '</ul>
        </nav>';
        return $nav;
    }
    static function ADMIN($selectedindex){
        $opcoesdomenu = array("SOLICITAR AUTORIZAÇÃO","RELATÓRIO","CADASTRAR","ENVIAR NOTIFICAÇÃO");
        $Links = array('solicitar_auto.php','relatorio.php','perfiladm.php','cadastrar.php','notificar.php');
        $Menu = Menu::DRAW($opcoesdomenu,count($opcoesdomenu), $selectedindex, $Links);
        echo "{$Menu}";
    }
    static function LOGIN(){
        $opcoesdomenu = array("");
        $Links = array('');
        $Menu = Menu::DRAW($opcoesdomenu,count($opcoesdomenu), 0, $Links);
        echo "{$Menu}";
    }
}