<?php
            if(!isset($_SESSION['USERLOGGED']))
                //header('Location: ../../index.php');
                echo "Vaza daqui viado";

            else{
                $CPF = (string) $_GET['CPF'];       
            }
            $Resp = DATABASE::SELECT('sc_responsavel',"WHERE Re_CPF = '{$CPF}'");
            $Urs_name = strtoupper($Resp[0]['Re_nome']);
            $_SESSION['USERNAME'] = $Urs_name;
            $_SESSION['USERCPF'] = $CPF;
            $_SESSION['USERID'] = $Resp[0]['Re_cod'];
            include PUBLICPATH . '/View/Responsaveis/index.php';