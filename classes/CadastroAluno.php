
<?php
	include_once 'Conectar.php';

 	class Aluno
 	{
		var $NomeAluno;
		private  $SobrenomeAluno;
		private  $DataNascimentoAluno;
		private  $CPFAluno;
		private  $NumReponsavelAluno;
		private  $UnidadeAluno;

	    public function __construct($NomeAluno = null,$SobrenomeAluno = null,$DataNascimentoAluno = null,$CPFAluno = null,$NumReponsavelAluno = null ,$UnidadeAluno = null) {
			$this->NomeAluno = $NomeAluno;
			$this->SobrenomeAluno = $SobrenomeAluno;
			$this->DataNascimentoAluno = $DataNascimentoAluno;
			$this->CPFAluno = $CPFAluno;
			$this->NumReponsavelAluno = $NumReponsavelAluno;
			$this->UnidadeAluno = $UnidadeAluno;
		}
		 
		function cadastrar()
		{
			$unidade = $this->UnidadeAluno;
			$nome = $this->NomeAluno;
			$subnome = $this->SobrenomeAluno;
			$date = $this->DataNascimentoAluno;
			$CPF = $this->CPFAluno;
			$reponsavel = $this->NumReponsavelAluno;
			$sql = "INSERT INTO `aluno` (`fk_CodUnidade`,`NomeAluno`,`sobrenome`,`DataNascimento`,`CPF`,`fk_CodResponsavel`) VALUES ('$unidade','$nome','$subnome','$date','$CPF',$reponsavel)";
			echo $sql;
			$conexao = new Conectar;
			$rcon = $conexao->Online(); // resultado da conexão
			$query = $rcon->query($sql);
		}

		function apagar($id)
		{
			$sql = "DELETE FROM `aluno` WHERE CodAluno = '".$id."'";
			echo $sql;
			$conexao = new Conectar;
			$rcon = $conexao->Online();
			$query = $rcon->query($sql);
		}

		function editar($id)
		{

			$unidade = $this->UnidadeAluno;
			$nome = $this->NomeAluno;
			$subnome = $this->SobrenomeAluno;
			$date = $this->DataNascimentoAluno;
			$CPF = $this->CPFAluno;
			$reponsavel = $this->NumReponsavelAluno;
			$sql = "UPDATE aluno SET fk_CodUnidade = $unidade,NomeAluno ='$nome',sobrenome='$subnome',DataNascimento = '$date',CPF='$CPF',fk_CodResponsavel= $reponsavel  WHERE CodAluno = $id";
			echo $sql;
			$conexao = new Conectar;
			$rcon = $conexao->Online(); // resultado da conexão
			$query = $rcon->query($sql);
		}
		function buscar($cpf = null){
	        if($cpf == null){
				$sql = "SELECT * FROM `aluno`";
			}
			else{
				$sql = "SELECT * FROM aluno WHERE CPF='".$cpf."';";
			}
			
			$conexao = new Conectar;
			$rcon = $conexao->Online(); // resultado da conexão
			$query = $rcon->query($sql);
				while ($campos = $query->fetch_assoc()) 
				{
					echo '<tr>';
					echo '  <td>'.$campos["CodAluno"].'</td><br/>';
					echo '  <td>'.$campos["NomeAluno"].'</td>';
					echo '  <td>'.$campos["sobrenome"].'</td>';
					echo '  <td>'.$campos["DataNascimento"].'</td>';
					echo '  <td>'.$campos["CPF"].'</td>';
					echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?CodAluno='.$campos["CodAluno"].'">Editar</a></td>';
					echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?CodAluno='.$campos["CodAluno"].'&del=true">Excluir</a></td>';
					echo '</tr>';
				}
				
		}

	}
?>