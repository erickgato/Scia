<?php
$ShowLogs = true; //DEBUG DE CODE ?
//IF SERVER === WAMP DEFINE PORT = 3308 
// ELSE IF SERVER == XAMP DEFINE PORT = 3306
$DBCONFIG = array( 
    "NAME" => 'scia', "USER" => 'root', "PASS" => '', 
    'PORT' => '3306', 'INSTANCE' => 'localhost' 
    ); //DEFINE SCHEMA CONNECTION PARAMETERS

//Contants 
define( "ISDEBUG", $ShowLogs);
define( "SCHEMANAME" ,$DBCONFIG['NAME']);
define( "USER"  , $DBCONFIG[ 'USER' ]);
define( "USERPASS"  , $DBCONFIG[ 'PASS' ]);
define( "INSTANCE", $DBCONFIG['INSTANCE'] );
define( "PORT", $DBCONFIG['PORT'] );
//PATH
define( "STYLES", PATH . 'Public/Resources/css/');
define("PUBLICPATH", PATH.'Public');
define("RESOCS", PUBLICPATH . '/Resources');
#Modify thiss
define("HTTPORIGIN", "http://{$_SERVER['HTTP_HOST']}/scia");
define("IMAGES", RESOCS . '/images');
define("VENDOR",RESOCS . '/Vendor');
define("PDF", PATH . 'classes/fpdf/tables.php');
