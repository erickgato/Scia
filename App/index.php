<?php 
include_once 'config.php';
include_once 'Model/SCHEMA.php';
define("PATH",dirname(__FILE__));
require_once 'functions/Loader.php';
DEBUG::log('CriandoProjeto');
header( 'Location: Public/');