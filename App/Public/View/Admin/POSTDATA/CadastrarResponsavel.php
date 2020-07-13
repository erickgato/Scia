<?php
 
    function Postdata(string $name){
            $typevar = $_POST[$name];
            return $typevar;
        }
    if(isset($_POST['Enviar'])){ 
        $Responsavel = array(
            'RG' => (string) Postdata('RG'), "CPF" => Postdata('CPF'),
            'Nascimento' => Postdata('datanasc'), 'Nome' => Postdata('nome'),
            'Lograd' => (string) Postdata('endereco'),
            'T_log' => (string) Postdata('T_lograd')
        );
        //Essa linha checa a correspondencia do bairro no banco de dados, 
        // Se existir return true
        $endereco = new Endereco(Postdata('endereco'),Postdata('Bairro'),Postdata("CEP"));
        $idendereco = $endereco->FETCHorPUSH();
        /*
            realiza um select buscando o id do responsavel 
            cujo CPF foi inserido
        */
        $Resp_rows = DATABASE::SELECT('sc_responsavel',"WHERE Re_CPF = '{$Responsavel['CPF']}'",false,false,true);
        if($Resp_rows > 1) {
            echo "alertify.alert('Falha', 'Usuário já cadastrado', () => {
                alertify.error('Já cadastrado');
            })";
            return;
        }
        
        //Insere os dados na tabela responsavel
        $Result = DATABASE::INSERT(
            'sc_responsavel',['',$Responsavel['RG'],$Responsavel['CPF'],
            $Responsavel['Nascimento'],$Responsavel['Nome'],$Responsavel['Lograd'],
            $Responsavel['T_log'],$idendereco                
            ]);
        if($Result){
            //Insere dados na tabela usuario
            $CREATEUSER = DATABASE::INSERT(
                'sc_usuario',
                ['',$Responsavel['CPF'],base64_encode($Responsavel['CPF']),'2',date('Y-m-d')]
            );
            if($CREATEUSER){
                //Procura os dados inseridos
                $RespCreated = DATABASE::SELECT('sc_usuario',"WHERE Us_login = '{$Responsavel['CPF']}'");
                $cod = $RespCreated[0]['Us_cod'];
                //Insere dados na terceira tabela de usuario e responsavel
                $ThirdTable = DATABASE::INSERT('sc_usuario_responsavel',['',$cod,$Responsavel['CPF']]);
                $HTTPORIGIN = HTTPORIGIN;
                if($ThirdTable){
                    echo "alertify.alert('Sucesso!', 'Dados cadastrados com sucesso', () => {
                        alertify.sucess('ótimo');
                    })";
                   
                    echo "<script>window.location.href = '{$HTTPORIGIN}/CadastrarAluno?Resp_CPF={$Responsavel['CPF']}'</script>";
                   exit;
                }
                else{
                    echo "Falha ao criar indice";
                }
            }
            else {
                echo "alertify.alert('Falha', 'Usuário erro ao criar usuário', () => {
                    alertify.error('Erro');
                })";
            }
                
            
        }
        DEBUG::log('Database Connection in Cadastro Responsavel');
        if(!$Result)
            echo "Falha ao adicionar responsavel";
        
        
    }
?>