<?php 
    require_once '../config.php';
    define("PATH","../");
	include_once PATH. '/functions/Loader.php';
	include_once PATH . '/Model/SCHEMA.php';
			if(isset($_POST['btn_enviar'])){
				$CodTpUsu = (int) $_POST['codtpusr'];
				DEBUG::log($CodTpUsu);
				//Isto é um metodo totalmente provisório enquanto usuários 
				//do tipo funcionarios não possuem encriptação no cadastro;
				if($CodTpUsu == 2) // Nesta versão apenas senhas de responsáveis são criptografadas
					$Usuario = array("LOGIN" => $_POST['usu_cpf'], "TYPE" => $CodTpUsu,"PASS" => base64_encode($_POST['usu_pass'] ));
				else
				$Usuario = array("LOGIN" => $_POST['usu_cpf'], "TYPE" => $CodTpUsu,"PASS" => $_POST['usu_pass'] );
				//Na proxima versão do sistema este metodo será unificado e 
				//Absoluto
					$Condition = "WHERE Us_login = '{$Usuario['LOGIN']}' AND Us_senha = '{$Usuario['PASS']}' 
					AND Us_codtpUsuario = {$Usuario['TYPE']};";
			
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