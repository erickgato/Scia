<?php
$ShowLogs = true; //DEBUG DE CODE ?
$DBCONFIG = array( 
    "NAME" => 'scia', "USER" => 'root', "PASS" => '', 
    'PORT' => '3308', 'INSTANCE' => 'localhost' 
    ); //DEFINE SCHEMA CONNECTION PARAMETERS

//Contants 
define( "ISDEBUG", $ShowLogs);
define( "SCHEMANAME" ,$DBCONFIG['NAME']);
define( "USER"  , $DBCONFIG[ 'USER' ]);
define( "USERPASS"  , $DBCONFIG[ 'PASS' ]);
define( "INSTANCE", $DBCONFIG['INSTANCE'] );
define( "PORT", $DBCONFIG['PORT'] );
