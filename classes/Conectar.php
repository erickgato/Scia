		<?php  

		/**
		 * 
		 */
		class Conectar
		{
			function Online()
			{
				$obj_mysqli = new mysqli("127.0.0.1", "root", "", "scia");
				// Verifica o erro de conexão
				if ($obj_mysqli->connect_errno)
				{
					echo "Ocorreu um erro na conexão com o banco de dados.";
					return "erro";
				} else
				{
					// Garante acentuação
					mysqli_set_charset($obj_mysqli, 'utf8');
					return $obj_mysqli;
				}
			}
			function ExecQuery($sql)
			{
				$conexao = Conectar::Online();
				$queryexec = $conexao->query($sql);
				if($queryexec){
					echo "Query Executada com sucesso";
				}
				else{
					echo "<br/>Erro ".$conexao->error;
				}
				$conexao->close();
			}
		}
