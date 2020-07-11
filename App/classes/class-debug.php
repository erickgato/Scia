<?php

class DEBUG
{
    static function log($data)
    {
        if(ISDEBUG){
            $output = $data;
            if (is_array($output))
                $output = implode(',', $output);
              echo "<script>console.log('{$output}' );</script>";
        }
        else{
            // Esta é minha solução burra pois a linguagem não aceita outputs vazios
            echo "<script>console.log('');</script>";
        }
    }
    static function print($data)
    {
        if(ISDEBUG){
            echo '<br/>'.$data;
        }
        else{
            echo "<script>console.log('');</script>";
        }
    }
    static function window($data)
    {
        if(ISDEBUG){
            $output = $data;
            if (is_array($output))
                $output = implode(',', $output);
             echo "<script>window('{$output}' );</script>";
        
        }
        else{
            echo "<script>console.log('');</script>";
        }

    }

}