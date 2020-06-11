<?php
/*
* @Author: Erick De Souza Gato
* License: Apache License 2.0
* Made in: 2020/05/28
* Support: Erick.dsGato@gmail.com
*/
Class SCHEMA {
    static public function UP(){
        //Create the Connection 
        $conection = new mysqli(INSTANCE, USER, USERPASS, SCHEMANAME,PORT);
        //The value returned is a boolean for error 
             if ($conection->connect_errno)
				{
                    echo "ERROR, PLEASE ATTEMPT LATER.";
                    DEBUG::log("Conection error");
					return "erro";
				} else
				{
                    mysqli_set_charset($conection, 'utf8');
                    return $conection;
                    DEBUG::log("Conection Created");
                }
			
    }
}


