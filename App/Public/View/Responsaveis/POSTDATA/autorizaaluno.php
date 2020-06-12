<?php
if(isset($_POST['Enviar'])){
    session_start();
    include_once  '../../../../config.php';
    include_once  '../../../../Model/SCHEMA.php';
    include_once  '../../../../classes/class-debug.php';
    function Postdata(string $name){
        $typevar = $_POST[$name];
        return $typevar;
    }
    $USER = DATABASE::SELECT('sc_usuario',"WHERE Us_login = '{$_SESSION['USERCPF']}'");
    $Ocorrencia = array(
        'UserId' => $USER[0]['Us_cod'],'CODal' => Postdata('codaluno'), 'Observ' => Postdata('Obs'), 
        'Date' => date('Y-m-d')
    );
    $Aluno = DATABASE::SELECT('sc_aluno',"WHERE Al_cod = {$Ocorrencia['CODal']}");
    
   
    $insert = DATABASE::INSERT('sc_ocorrencia',[
        '',$Ocorrencia['UserId'],$Aluno[0]['Al_cod'],1,$Ocorrencia['Observ'],$Ocorrencia['Date']
        ]);
    if($insert){
        header("Location: ../autorizaaluno.php?m=Sucess");
    }
    else{
        header("Location: ../autorizaaluno.php?m=Error");
    }
}

