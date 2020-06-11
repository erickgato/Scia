<?php
include_once 'Conectar.php';
/* 
Corrigido por Erick Gato
todas as modificações necessarias para 
o funcionamento aplicadas 
*/
class Unidade{
    //Variaveis Da tabela responsavel, tirando codigo que é auto incremento
    /*  Var of Responsavel table */
        private  $un_Nome;
    /*
        Variavel da conexão com o banco, usando apenas uma que abre e fecha a conexão com a tabela
        connect var, using something of database connect 
    */
        protected $conn; 
        /*
            Construtor, usado para setar instancias após a declaração da classe
        */
        public function __construct($un_Nome) {
            /* Atribuindo valores passados ao construtor () a estrutura interna da classe */
            $this->un_Nome = $un_Nome;
            $this->conn = new Conectar;
        }
        /* Função para cadastrar o responsavel seguindo os dados que já foram inseridos na memoria pelo construtor*/
        function cadastrar(){
            /* utiliza o objeto de conexão criado no construtor e chama um metodo da classe conectar */
                $this->conn->ExecQuery("INSERT INTO sc_unidade VALUES (null,'$this->un_Nome')");
                
        }
        /* Função para apagar o dado do responsável, esta não necessita do construtor pois esta vinculada diretamente ao id */
        function apagar($id = null,$nome = null)
        {
            if($id == null){
                $sql = "DELETE FROM sc_unidade WHERE Un_nome = '".$nome."'";
            }
            else if ($nome == null){
                $sql = "DELETE FROM sc_unidade WHERE Un_cod = '".$id."'";
            }
                $this->conn->ExecQuery($sql);        
        }
        /*    */
        function editar($id)
            {
                $this->conn->ExecQuery("UPDATE sc_unidade SET Un_nome ='$this->un_Nome' WHERE Un_cod = $id");			
            }
        function buscar($nome = null){
                if($nome == null)
                {
                    $sql = "SELECT * FROM `sc_unidade`";
                }
                else   
                {
                         $sql = "SELECT * FROM sc_unidade WHERE Un_nome='".$nome."';";
                }
                $conexao = new Conectar;
                $rcon = $conexao->Online(); // resultado da conexão
                $query = $rcon->query($sql);
                /* Enquanrto o resultado da busca não chegar no ultimo dado registrado faça */
                    while ($campos = $query->fetch_assoc()) 
                    {
                        /* Impirimirá cada coluna de cada dado no banco */
                            echo '<tr>';
                            echo '  <td>'.$campos["Un_cod"].'</td><br/>';
                            echo '  <td>'.$campos["Un_nome"].'</td>';
                            //Cria uma variavel Superglobal enviado ao cabeçalho da pagina o valor do campo */
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?Cod='.$campos["Un_cod"].'">Editar</a></td>';
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?cod='.$campos["Un_cod"].'&del=true">Excluir</a></td>';
                            echo '</tr>';
                    }
                    
        }
}



