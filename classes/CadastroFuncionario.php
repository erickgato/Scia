<?php
	include_once 'Conectar.php';

 	class Funcionario
 	{
		var $NomeFuncionario;
		function cadastrar()
		{
			$nome = $this->NomeFuncionario;
			$sql = "INSERT INTO `funcionario` (`NomeFuncionario`) VALUES ('$nome')";
			echo $sql;
			$conexao = new Conectar;
			$rcon = $conexao->Online(); // resultado da conexão
			$query = $rcon->query($sql);
		}
		function apagar($id)
		{
			$sql = "DELETE FROM `funcionario` WHERE CodFuncionario = ".$id;
			echo $sql;
			$conexao = new Conectar;
			$rcon = $conexao->Online();
			$query = $rcon->query($sql);
		}
		function editar($id)
		{
			$nome = $this->NomeFuncionario;
			$sql = "UPDATE `funcionario` SET `NomeFuncionario`='$nome' WHERE CodFuncionario =('$id')";
			echo $sql;
			$conexao = new Conectar;
			$rcon = $conexao->Online(); // resultado da conexão
			$query = $rcon->query($sql);
		}

	}
?>