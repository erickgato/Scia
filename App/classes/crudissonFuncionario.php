<?php
include_once 'Conectar.php';
class funcionario{
    //Variaveis Da tabela funcionario, tirando codigo que é auto incremento
    /*  Var of Responsavel table */
        private $CPF,$nome, $matricula,$codunidade,$codtpfuncio;
    /*
        Variavel da conexão com o banco, usando apenas uma que abre e fecha a conexão com a tabela
        connect var, using something of database connect 
    */
        protected $conn; 
        /*
            Construtor, usado para setar instancias após a declaração da classe
        */
        public function __construct($CPF,$nome, $matricula,$codunidade,$codtpfuncio) {
            /* Atribuindo valores passados ao construtor () a estrutura interna da classe */
            $this->CPF = $CPF;
            $this->nome = $nome;
            $this->codunidade = $codunidade;
            $this->matricula = $matricula;
            $this->codtpfuncio = $codtpfuncio;
            $this->conn = new Conectar;
        }
        /* Função para cadastrar o funcionario seguindo os dados que já foram inseridos na memoria pelo construtor*/
        function cadastrar(){
            /* utiliza o objeto de conexão criado no construtor e chama um metodo da classe conectar */
                $this->conn->ExecQuery("INSERT INTO sc_funcionario VALUES (null,'$this->nome','$this->CPF','$this->matricula',$this->codunidade,$this->codtpfuncio)");
                
        }
        /* Função para apagar o dado do responsável, esta não necessita do construtor pois esta vinculada diretamente ao id */
        function apagar($id)
        {
                $this->conn->ExecQuery("DELETE FROM sc_funcionario WHERE Re_cod = '".$id."'");
        }
        /*    */
        function editar($id)
            {
                $this->conn->ExecQuery("UPDATE sc_funcionario SETFu_nome='$this->nome',Fu_CPF='$this->CPF'
                ,Fu_matricula= '$this->matricula'
                ,Fu_codUnidade = $this->codunidade , Fu_codTpFuncionario = $this->codtpfuncio ,  WHERE Re_cod = $id");			
            }
        function buscar($cpf = null){
                if($cpf == null)
                {
                    $sql = "SELECT * FROM `sc_funcionario`";
                }
                else   
                {
                         $sql = "SELECT * FROM sc_funcionario WHERE CPF='".$cpf."';";
                }
                $conexao = new Conectar;
                $rcon = $conexao->Online(); // resultado da conexão
                $query = $rcon->query($sql);
                /* Enquanrto o resultado da busca não chegar no ultimo dado registrado faça */
                    while ($campos = $query->fetch_assoc()) 
                    {
                        /* Impirimirá cada coluna de cada dado no banco */
                            echo '<tr>';
                            echo '  <td>'.$campos["Fu_CPF"].'</td>';
                            echo '  <td>'.$campos["Fu_nome"].'</td>';
                            echo '  <td>'.$campos["Fu_matricula"].'</td>';
                            echo '  <td>'.$campos["Fu_codUnidade"].'</td>';
                            echo '  <td>'.$campos["Fu_codTpFuncionario"].'</td>';
                            //Cria uma variavel Superglobal enviado ao cabeçalho da pagina o valor do campo */
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?CPF='.$campos["Fu_CPF"].'">Editar</a></td>';
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?CPF='.$campos["Fu_CPF"].'&del=true">Excluir</a></td>';
                            echo '</tr>';
                    }
                    
        }
}



