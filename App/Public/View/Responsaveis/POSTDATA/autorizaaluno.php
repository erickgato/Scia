<?php
date_default_timezone_set('UTC');
if(isset($_POST['Enviar'])){
    function Postdata(string $name){
        $typevar = $_POST[$name];
        return $typevar;
    }
    $USER = DATABASE::SELECT('sc_usuario',"WHERE Us_login = '{$_COOKIE['USER']['CPF']}'");
    $Ocorrencia = array(
        'UserId' => $USER[0]['Us_cod'],'CODal' => Postdata('codaluno'), 'Observ' => Postdata('Obs'), 
        'Date' => date('Y-m-d')
    );
    $Aluno = DATABASE::SELECT('sc_aluno',"WHERE Al_cod = {$Ocorrencia['CODal']}");
    $verificacao = DATABASE::SELECT('sc_ocorrencia', "WHERE Oc_data = '{$Ocorrencia['Date']}' AND Oc_codAluno = {$Ocorrencia['CODal']} ", false, null, true);
    if($verificacao == 0){
        $insert = DATABASE::INSERT('sc_ocorrencia',[
            '',$Ocorrencia['UserId'],$Aluno[0]['Al_cod'],1,$Ocorrencia['Observ'],$Ocorrencia['Date']
            ]);
            var_dump($insert);
        if($insert){
            header("Location: ?m=Sucess");
        }
        else{
            header("Location: ?m=Error");
        }
    }
    else{
        echo "<script> alertify.alert('Scia diz', 'Aluno já foi liberado',() => {
            alertify.error('Tente novamente outro dia')
          });</script>";
    }
}

