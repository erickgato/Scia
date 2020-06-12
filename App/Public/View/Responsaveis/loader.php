<?php
            session_start();
            if(!isset($_SESSION['USERLOGGED']))
                header('Location: ../../index.php');
            else{
                define("PATH",'../../../');
                require_once PATH . 'Model/SCHEMA.php';
                require_once PATH . 'config.php';
                $CPF = (string) $_GET['CPF'];
                
            }
            require_once  PATH. 'functions/Loader.php';
            $Resp = DATABASE::SELECT('sc_responsavel',"WHERE Re_CPF = '{$CPF}'");
            $Urs_name = strtoupper($Resp[0]['Re_nome']);
            $_SESSION['USERNAME'] = $Urs_name;
            header("Location: index.php");
        ?>