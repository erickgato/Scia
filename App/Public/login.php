<?php 	
			if(isset($_POST['btn_enviar'])){
				$CodTpUsu = (int) $_POST['codtpusr'];
				DEBUG::log($CodTpUsu);
				//Isto é um metodo totalmente provisório enquanto usuários 
				//do tipo funcionarios não possuem encriptação no cadastro;
					$Usuario = array("LOGIN" => $_POST['usu_cpf'], "TYPE" => $CodTpUsu,"PASS" => base64_encode($_POST['usu_pass'] ));
					$Condition = "WHERE Us_login = '{$Usuario['LOGIN']}' AND Us_senha = '{$Usuario['PASS']}' 
					AND Us_codtpUsuario = {$Usuario['TYPE']};";
			
				$nmRows = DATABASE::SELECT("sc_usuario",$Condition,false,false,true);
				if($nmRows == 1){
					switch($CodTpUsu){
						case 2: 
							$_SESSION['USERLOGGED'] = true;
							setcookie("USER[CPF]",(string)$Usuario['LOGIN'],time() + 5600);
							header('Location: perfil');
							exit;	
							break;
						default: 
							$_SESSION['ADMINLOGGED'] = true;
							setcookie("USER[CPF]",(string)$Usuario['LOGIN'],time() + 5600);
							header('Location: homeadmin');
							exit;
						break;
					}
					
				}
				else{
					header("Location: index.php?message=error");
				//	header("Location: index.php?message=error&CPF={$Usuario['LOGIN']}");
				}
			}