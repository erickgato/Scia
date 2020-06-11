<?php
include_once 'Conectar.php';
class responsavel{
    //Variaveis Da tabela responsavel, tirando codigo que é auto incremento
    /*  Var of Responsavel table */
        private $RG, $CPF, $nascimento, $nome, $logradouro,$tipolograd,$codBairro;
    /*
        Variavel da conexão com o banco, usando apenas uma que abre e fecha a conexão com a tabela
        connect var, using something of database connect 
    */
        protected $conn; 
        /*
            Construtor, usado para setar instancias após a declaração da classe
        */
        public function __construct($RG, $CPF, $nascimento, $nome, $logradouro,$tipolograd,$codBairro) {
            /* Atribuindo valores passados ao construtor () a estrutura interna da classe */
            $this->RG = $RG;
            $this->CPF = $CPF;
            $this->nascimento = $nascimento;
            $this->nome = $nome;
            $this->tipolograd = $tipolograd;
            $this->logradouro = $logradouro;
            $this->codBairro = $codBairro;
            $this->conn = new Conectar;
        }
        /* Função para cadastrar o responsavel seguindo os dados que já foram inseridos na memoria pelo construtor*/
        function cadastrar(){
            /* utiliza o objeto de conexão criado no construtor e chama um metodo da classe conectar */
                $this->conn->ExecQuery("INSERT INTO sc_responsavel VALUES (null,'$this->RG','$this->CPF',
                '$this->nascimento','$this->nome','$this->logradouro',$this->tipolograd,$this->codBairro)");
                
        }
        /* Função para apagar o dado do responsável, esta não necessita do construtor pois esta vinculada diretamente ao id */
        function apagar($id)
        {
                $this->conn->ExecQuery("DELETE FROM sc_responsavel WHERE Res_cod = '".$id."'");
        }
        /*    */
        function editar($id)
            {
                $this->conn->ExecQuery("UPDATE sc_responsavel SET Res_RG ='$this->RG',Res_CPF='$this->CPF'
                ,Res_nascimento = '$this->nascimento'
                ,Res_nome='$this->nome',Res_logradouro= '$this->logradouro'
                ,Res_tipolograd = $this->tipolograd , Res_codBairro = $this->codBairro ,  WHERE CodAluno = $id");			
            }
        function buscar($cpf = null){
                if($cpf == null)
                {
                    $sql = "SELECT * FROM `sc_responsavel`";
                }
                else   
                {
                         $sql = "SELECT * FROM sc_responsavel WHERE CPF='".$cpf."';";
                }
                $conexao = new Conectar;
                $rcon = $conexao->Online(); // resultado da conexão
                $query = $rcon->query($sql);
                /* Enquanrto o resultado da busca não chegar no ultimo dado registrado faça */
                    while ($campos = $query->fetch_assoc()) 
                    {
                        /* Impirimirá cada coluna de cada dado no banco */
                            echo '<tr>';
                            echo '  <td>'.$campos["Res_RG"].'</td><br/>';
                            echo '  <td>'.$campos["Res_CPF"].'</td>';
                            echo '  <td>'.$campos["Res_nascimento"].'</td>';
                            echo '  <td>'.$campos["Res_nome"].'</td>';
                            echo '  <td>'.$campos["Res_logradouro"].'</td>';
                            echo '  <td>'.$campos["Res_tipolograd"].'</td>';
                            echo '  <td>'.$campos["Res_codBairro"].'</td>';
                            //Cria uma variavel Superglobal enviado ao cabeçalho da pagina o valor do campo */
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?CPF='.$campos["Res_CPF"].'">Editar</a></td>';
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?CPF='.$campos["Res_CPF"].'&del=true">Excluir</a></td>';
                            echo '</tr>';
                    }
                    
        }
}


