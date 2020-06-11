<?php
include_once 'Conectar.php';
class Bairro{
    //Variaveis Da tabela responsavel, tirando codigo que é auto incremento
    /*  Var of Responsavel table */
        private $nome, $codCidade;
    /*
        Variavel da conexão com o banco, usando apenas uma que abre e fecha a conexão com a tabela
        connect var, using something of database connect 
    */
        protected $conn; 
        /*
            Construtor, usado para setar instancias após a declaração da classe
        */
        public function __construct($nome, $codCidade) {
            /* Atribuindo valores passados ao construtor () a estrutura interna da classe */
            $this->nome = $nome;
            $this->codCidade = $codCidade;
            $this->conn = new Conectar;
        }
        /* Função para cadastrar o responsavel seguindo os dados que já foram inseridos na memoria pelo construtor*/
        function cadastrar(){
            /* utiliza o objeto de conexão criado no construtor e chama um metodo da classe conectar */
                $this->conn->ExecQuery("INSERT INTO sc_bairro VALUES (null,'$this->nome','
                $this->codCidade')");
                
        }
        /* Função para apagar o dado do responsável, esta não necessita do construtor pois esta vinculada diretamente ao id */
        function apagar($id)
        {
                $this->conn->ExecQuery("DELETE FROM sc_bairro WHERE Ba_cod = '".$id."'");
        }
        /*    */
        function editar($id)
            {
                $this->conn->ExecQuery("UPDATE sc_bairro SET,
                Ba_nome='$this->nome',Ba_codCidade = '$this->codCidade'
                , WHERE Ba_cod = $id");			
            }
        function buscar($nome = null){
                if($nome == null)
                {
                    $sql = "SELECT * FROM `sc_bairro`";
                }
                else   
                {
                         $sql = "SELECT * FROM sc_bairro WHERE CPF='".$nome."';";
                }
                $conexao = new Conectar;
                $rcon = $conexao->Online(); // resultado da conexão
                $query = $rcon->query($sql);
                /* Enquanrto o resultado da busca não chegar no ultimo dado registrado faça */
                    while ($campos = $query->fetch_assoc()) 
                    {
                        /* Impirimirá cada coluna de cada dado no banco */
                            echo '<tr>';
                            echo '  <td>'.$campos["Ba_nome"].'</td>';
                            echo '  <td>'.$campos["Ba_codCidade"].'</td>';
                            //Cria uma variavel Superglobal enviado ao cabeçalho da pagina o valor do campo */
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?nome='.$campos["Ba_nome"].'">Editar</a></td>';
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?nome='.$campos["Ba_nome"].'&del=true">Excluir</a></td>';
                            echo '</tr>';
                    }       
        }
}