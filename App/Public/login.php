<?php 
    require_once '../config.php';
    define("PATH","../");
	include_once PATH. '/functions/Loader.php';
	include_once PATH . '/Model/SCHEMA.php';
			if(isset($_POST['btn_enviar'])){
				$CodTpUsu = (int) $_POST['Tp_User'];
				DEBUG::log($CodTpUsu);
				$Usuario = array("LOGIN" => $_POST['usu_cpf'], "TYPE" => $CodTpUsu,"PASS" => $_POST['usu_pass'] );
				$Condition = "WHERE Us_login = '{$Usuario['LOGIN']}' AND Us_senha = '{$Usuario['PASS']}' 
					AND Us_codtpUsuario = {$Usuario['TYPE']};";
				var_dump($Usuario);
				$nmRows = DATABASE::SELECT("sc_usuario",$Condition,false,false,true);
				if($nmRows == 1){
					switch($CodTpUsu){
						case 2: 
							session_start();
							$_SESSION['USERLOGGED'] = true;
							header('Location: View/Responsaveis/loader.php?CPF=' . $Usuario['LOGIN']);
							break;
						default: 
							session_start();
							$_SESSION['ADMINLOGGED'] = true;
							header('Location: View/Admin/loader.php');
						break;
					}
					
				}
				else{
					header('Location: index.php?message=error');
				}
			}