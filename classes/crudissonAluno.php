<?php
include_once 'Conectar.php';
class Aluno{
    //Variaveis Da tabela responsavel, tirando codigo que é auto incremento
    /*  Var of Responsavel table */
        private $unidade, $CPF, $nascimento, $nome, $sobrenome;
    /*
        Variavel da conexão com o banco, usando apenas uma que abre e fecha a conexão com a tabela
        connect var, using something of database connect 
    */
        protected $conn; 
        /*
            Construtor, usado para setar instancias após a declaração da classe
        */
        public function __construct($unidade, $CPF, $nascimento, $nome, $sobrenome) {
            /* Atribuindo valores passados ao construtor () a estrutura interna da classe */
            $this->unidade = $unidade;
            $this->CPF = $CPF;
            $this->nascimento = $nascimento;
            $this->nome = $nome;
            $this->sobrenome = $sobrenome;
            $this->codresponsavel = $codresponsavel;
            $this->conn = new Conectar;
        }
        /* Função para cadastrar o responsavel seguindo os dados que já foram inseridos na memoria pelo construtor*/
        function cadastrar(){
            /* utiliza o objeto de conexão criado no construtor e chama um metodo da classe conectar */
                $this->conn->ExecQuery("INSERT INTO sc_aluno VALUES (null,'$this->unidade',
                '$this->nascimento','$this->nome','$this->sobrenome','$this->nascimento','$this->CPF','$this->codresponsavel')");
                
        }
        /* Função para apagar o dado do responsável, esta não necessita do construtor pois esta vinculada diretamente ao id */
        function apagar($id)
        {
                $this->conn->ExecQuery("DELETE FROM sc_aluno WHERE AI_cod = '".$id."'");
        }
        /*    */
        function editar($id)
            {
                $this->conn->ExecQuery("UPDATE sc_aluno SET Al_CodUnidade='$this->unidade',Al_nome='$this->nome',
                Al_sobrenome = '$this->sobrenome', Al_nascimento = '$this->nascimento', Al_CPF='$this->CPF',
                Al_codResponsavel='$this->codresponsavel'
                , WHERE Al_cod = $id");			
            }
        function buscar($cpf = null){
                if($cpf == null)
                {
                    $sql = "SELECT * FROM `sc_aluno`";
                }
                else   
                {
                         $sql = "SELECT * FROM sc_aluno WHERE CPF='".$cpf."';";
                }
                $conexao = new Conectar;
                $rcon = $conexao->Online(); // resultado da conexão
                $query = $rcon->query($sql);
                /* Enquanrto o resultado da busca não chegar no ultimo dado registrado faça */
                    while ($campos = $query->fetch_assoc()) 
                    {
                        /* Impirimirá cada coluna de cada dado no banco */
                            echo '<tr>';
                            echo '  <td>'.$campos["Al_CodUnidade"].'</td>';                            
                            echo '  <td>'.$campos["Al_CPF"].'</td>';
                            echo '  <td>'.$campos["Al_nascimento"].'</td>';
                            echo '  <td>'.$campos["Al_nome"].'</td>';
                            echo '  <td>'.$campos["Al_sobrenome"].'</td>';
                            echo '  <td>'.$campos["Al_codResponsavel"].'</td>';                            
                            //Cria uma variavel Superglobal enviado ao cabeçalho da pagina o valor do campo */
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?CPF='.$campos["Al_CPF"].'">Editar</a></td>';
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?CPF='.$campos["Al_CPF"].'&del=true">Excluir</a></td>';
                            echo '</tr>';
                    }
                    
        }
}



