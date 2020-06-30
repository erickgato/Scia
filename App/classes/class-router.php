<?php
final class ROUTE{
    static function GET(string $param){
        if(isset($_GET['url'])){
            $url =  $_GET['url'];
            DEBUG::LOG($url);
            if($url === $param){
                return true;
                }
            else{
                return false;
            }
        }
            
        }
    static function RETURN(){
        if(isset($_GET['url'])){
            $url =  $_GET['url'];
            DEBUG::LOG($url);
            return $url;
        }
    }

}

function includePublic(string $file){
    require PUBLICPATH . "/$file";
}
function LoadFile(string $file){
    require PATH . "/$file";
}