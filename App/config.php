<?php
$ShowLogs = true; //DEBUG DE CODE ?
$PATHCONFIG = array(
     "LOCAL" => dirname( __FILE__ ), "URL" => "http://127.0.0.1/SCIA/" 
    ); //CONFIG LOCAL DIRECTORY

$DBCONFIG = array( 
    "NAME" => 'scia', "USER" => 'root', "PASS" => '', 
    'PORT' => '3308', 'INSTANCE' => 'localhost' 
    ); //DEFINE SCHEMA CONNECTION PARAMETERS

//SUPERGLOBAL VARIABLES
define( "ISDEBUG", $ShowLogs);
define( "PATH"  ,$PATHCONFIG['LOCAL']);
define( "HOST"  ,$PATHCONFIG['URL']);
define( "SCHEMANAME" ,$DBCONFIG['NAME']);
define( "USER"  , $DBCONFIG[ 'USER' ]);
define( "USERPASS"  , $DBCONFIG[ 'PASS' ]);
define( "PATHVIEW", PATH . '/public');  
define( "INSTANCE", $DBCONFIG['INSTANCE'] );
define( "PORT", $DBCONFIG['PORT'] );
define( "CLASSDIR", PATH . '/classes/' ); 
define( "FUNCDIR", PATH . '/Functions/' ); 
//Include global functions
include_once FUNCDIR . 'globalFunc.php';
require_once CLASSDIR . 'debug.class.php';
DEBUG::log('CriandoProjeto');

require_once openPublic("index.php");