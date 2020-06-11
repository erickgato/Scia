<?php
include_once 'Conectar.php';
class contato{
    //Variaveis Da tabela responsavel, tirando codigo que é auto incremento
    /*  Var of Responsavel table */
        private $resp, $desc, $tpcon;
    /*
        Variavel da conexão com o banco, usando apenas uma que abre e fecha a conexão com a tabela
        connect var, using something of database connect 
    */
        protected $conn; 
        /*
            Construtor, usado para setar instancias após a declaração da classe
        */
        public function __construct($resp, $desc, $tpcon) {
            /* Atribuindo valores passados ao construtor () a estrutura interna da classe */
            $this->resp = $resp;
            $this->desc = $desc;
            $this->tpcon = $tpcon;
            $this->conn = new Conectar;
        }
        /* Função para cadastrar o responsavel seguindo os dados que já foram inseridos na memoria pelo construtor*/
        function cadastrar(){
            /* utiliza o objeto de conexão criado no construtor e chama um metodo da classe conectar */
                $this->conn->ExecQuery("INSERT INTO sc_contato VALUES (null,'$this->resp','$this->desc',
                '$this->tocon');");
                
        }
        /* Função para apagar o dado do responsável, esta não necessita do construtor pois esta vinculada diretamente ao id */
        function apagar($id)
        {
                $this->conn->ExecQuery("DELETE FROM sc_contato WHERE Co_cod = '".$id."'");
        }
        /*    */
        function editar($id)
            {
                $this->conn->ExecQuery("UPDATE sc_contato SET Co_descricao ='$this->RG',Co_codResponsavel='$this->CPF'
                ,Co_codtpContato = '$this->nascimento' WHERE Co_cod = $id");			
            }
            function buscar($nome = null){
                if($nome == null)
                {
                    $sql = "SELECT * FROM `sc_contato`";
                }
                else   
                {
                         $sql = "SELECT * FROM sc_contato WHERE Co_descricao='".$nome."';";
                }
                $conexao = new Conectar;
                $rcon = $conexao->Online(); // resultado da conexão
                $query = $rcon->query($sql);
                /* Enquanrto o resultado da busca não chegar no ultimo dado registrado faça */
                    while ($campos = $query->fetch_assoc()) 
                    {
                        /* Impirimirá cada coluna de cada dado no banco */
                            echo '<tr>';
                            echo '  <td>'.$campos["Co_cod"].'</td><br/>';
                            echo '  <td>'.$campos["Co_descricao"].'</td>';
                            echo '  <td>'.$campos["Co_codResponsavel"].'</td>';
                            echo '  <td>'.$campos["Co_codtpContato"].'</td>';
                            //Cria uma variavel Superglobal enviado ao cabeçalho da pagina o valor do campo */
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?Cod='.$campos["Co_cod"].'">Editar</a></td>';
                            echo '  <td><a href="'.$_SERVER["PHP_SELF"].'?cod='.$campos["Co_cod"].'&del=true">Excluir</a></td>';
                            echo '</tr>';
                    }
                    
        }



