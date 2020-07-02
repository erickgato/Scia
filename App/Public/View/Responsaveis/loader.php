<?php
            if(!isset($_SESSION['USERLOGGED']))
                header('Location: ../../index.php');

            else{
                $CPF = (string) $_COOKIE['USER']['CPF'];       
            }
            
            $Resp = DATABASE::SELECT('sc_responsavel',"WHERE Re_CPF = '{$CPF}'");
            $Urs_name = strtoupper($Resp[0]['Re_nome']);
            
            $_SESSION['USER']['name'] = $Urs_name;
            $_SESSION['USER']['CPF'] = $CPF;
            $_SESSION['USER']['ID'] = $Resp[0]['Re_cod'];
            include PUBLICPATH . '/View/Responsaveis/index.php';