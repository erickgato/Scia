<?php
include_once 'Conectar.php';
/* 
Corrigido por Erick Gato
todas as modificações necessarias para 
o funcionamento aplicadas 
*/
class Ocorrencia{
    //Variaveis Da tabela responsavel, tirando codigo que é auto incremento
    /*  Var of Responsavel table */
        private $codFuncionario, $codAluno, $codtpOcorrencia, $observacao, $data;
    /*
        Variavel da conexão com o banco, usando apenas uma que abre e fecha a conexão com a tabela
        connect var, using something of database connect 
    */
        protected $conn; 
        /*
            Construtor, usado para setar instancias após a declaração da classe
        */
        public function __construct($codFuncionario, $codAluno, $codtpOcorrencia, $observacao, $data) {
            /* Atribuindo valores passados ao construtor () a estrutura interna da classe */
            $this->codFuncionario = $codFuncionario;
            $this->codAluno = $codAluno;
            $this->codtpOcorrencia = $codtpOcorrencia;
            $this->observacao = $observacao;
            $this->data = $data;
            $this->conn = new Conectar;
        }
        /* Função para cadastrar o responsavel seguindo os dados que já foram inseridos na memoria pelo construtor*/
        function cadastrar(){
            /* utiliza o objeto de conexão criado no construtor e chama um metodo da classe conectar */
                $this->conn->ExecQuery("INSERT INTO sc_ocorrencia VALUES (null,'$this->codFuncionario',
                '$this->codAluno','$this->codtpOcorrencia','$this->observacao','$this->data')");
                
        }
        /* Função para apagar o dado do responsável, esta não necessita do construtor pois esta vinculada diretamente ao id */
        function apagar($id)
        {
                $this->conn->ExecQuery("DELETE FROM sc_ocorrencia WHERE Oc_cod = '".$id."'");
        }
        /*    */
        function editar($id)
            {
                $this->conn->ExecQuery("UPDATE sc_ocorrencia SET Oc_codFuncionario='$this->codFuncionario'
                ,Oc_codAluno = '$this->codAluno',Oc_codtpOcorrencia='$this->codtpOcorrencia'
                ,Oc_observacao = '$this->observacao',Oc_data = '$this->data'
                 WHERE Oc_cod = $id");			
            }
        function buscar($data = null){
                if($data == null)
                {
                    $sql = "SELECT * FROM `sc_ocorrencia`";
                }
                else   
                {
                         $sql = "SELECT * FROM sc_ocorrencia WHERE ocdata='".$data."';";
                }
                $conexao = new Conectar;
                $rcon = $conexao->Online(); // resultado da conexão
                $query = $rcon->query($sql);
                /* Enquanrto o resultado da busca não chegar no ultimo dado registrado faça */
                    while ($campos = $query->fetch_assoc()) 
                    {
                        /* Impirimirá cada coluna de cada dado no banco */
                            echo '<tr>';
                            echo '  <td>'.$campos["Oc_cod"].'</td>';
                            echo '  <td>'.$campos["Oc_codFuncionario"].'</td>';
                            echo '  <td>'.$campos["Oc_codAluno"].'</td>';
                            echo '  <td>'.$campos["Oc_codtpOcorrencia"].'</td>';
                            echo '  <td>'.$campos["Oc_observacao"].'</td>';
                            echo '  <td>'.$campos["Oc_data"].'</td><br/>';
                            //Cria uma variavel Superglobal enviado ao cabeçalho da pagina o valor do campo */
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?ocdata='.$campos["Oc_data"].'">Editar</a></td>';
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?ocdata='.$campos["Oc_data"].'&del=true">Excluir</a></td>';
                            echo '</tr>';
                    }
                    
        }
}



