<?php

class DEBUG
{
    static function log($data)
    {
        if(ISDEBUG){
            $output = $data;
            if (is_array($output))
                $output = implode(',', $output);
                echo "<script>console.log(' " . $output . "' );</script>";
        }

    }
    static function print($data)
    {
        if(ISDEBUG){
            echo '<br/>'.$data;
        }
    }
}