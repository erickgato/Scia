<?php
include_once 'Conectar.php';
class Estado{
    //Variaveis Da tabela responsavel, tirando codigo que é auto incremento
    /*  Var of Responsavel table */
        private $UF, $nome;
    /*
        Variavel da conexão com o banco, usando apenas uma que abre e fecha a conexão com a tabela
        connect var, using something of database connect 
    */
        protected $conn; 
        /*
            Construtor, usado para setar instancias após a declaração da classe
        */
        public function __construct($UF, $nome) {
            /* Atribuindo valores passados ao construtor () a estrutura interna da classe */
            $this->UF = $UF;
            $this->nome = $nome;
            $this->conn = new Conectar;
        }
        /* Função para cadastrar o responsavel seguindo os dados que já foram inseridos na memoria pelo construtor*/
        function cadastrar(){
            /* utiliza o objeto de conexão criado no construtor e chama um metodo da classe conectar */
                $this->conn->ExecQuery("INSERT INTO Es_Estado VALUES (null,'$this->UF','
                $this->nome')");
                
        }
        /* Função para apagar o dado do responsável, esta não necessita do construtor pois esta vinculada diretamente ao id */
        function apagar($id)
        {
                $this->conn->ExecQuery("DELETE FROM Es_Estado WHERE Es_cod = '".$id."'");
        }
        /*    */
        function editar($id)
            {
                $this->conn->ExecQuery("UPDATE Es_Estado SET,
                Es_nome='$this->UF',Es_UF = '$this->nome'
                , WHERE nome = $id");			
            }
        function buscar($nome = null){
                if($nome == null)
                {
                    $sql = "SELECT * FROM `Es_Estado`";
                }
                else   
                {
                         $sql = "SELECT * FROM Es_Estado WHERE nome='".$nome."';";
                }
                $conexao = new Conectar;
                $rcon = $conexao->Online(); // resultado da conexão
                $query = $rcon->query($sql);
                /* Enquanrto o resultado da busca não chegar no ultimo dado registrado faça */
                    while ($campos = $query->fetch_assoc()) 
                    {
                        /* Impirimirá cada coluna de cada dado no banco */
                            echo '<tr>';
                            echo '  <td>'.$campos["Es_UF"].'</td>';
                            echo '  <td>'.$campos["Es_nome"].'</td>';
                            //Cria uma variavel Superglobal enviado ao cabeçalho da pagina o valor do campo */
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?nome='.$campos["Es_nome"].'">Editar</a></td>';
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?nome='.$campos["Es_nome"].'&del=true">Excluir</a></td>';
                            echo '</tr>';
                    }       
        }
}