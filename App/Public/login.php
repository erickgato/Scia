<?php 	
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
							$_SESSION['USERLOGGED'] = true;
							header('Location: perfil?CPF=' . $Usuario['LOGIN']);
							exit();	
							break;
						default: 
							$_SESSION['ADMINLOGGED'] = true;
							header('Location: admin/dashboard');
							
						break;
					}
					
				}
				else{
					header('Location: index.php?message=error');
				}
			}