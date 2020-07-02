<?php 
if(!isset($_POST['Send']))
    exit;
$contato = array(
    "Telefone" => $_POST['Tel'],
    "Email" => $_POST['mailaddress']
);
$Puser = array(
    "Nome" => $_POST['Username'],
    "Logradouro" => $_POST['lograd']
);
if(
    DATABASE::UPDATE(
        'sc_responsavel',
            "Re_cod = '{$_SESSION['USER']['ID']}'",
                ['Re_nome','Re_logradouro'],[$Puser['Nome'],$Puser['Logradouro']] 
    )){
    
        if(empty(
                DATABASE::SELECT(
                    'sc_contato',
                        "WHERE Co_codtpContato = 1 AND Co_codResponsavel =  {$_SESSION['USER']['ID']}")
                ))
        {
            $newcontato =  DATABASE::INSERT('sc_contato',['',$contato['Email'],$_SESSION['USER']['ID'],'1']);
            DEBUG::log("Criando novo registro");
        }
        else{
            $updatecontato = DATABASE::UPDATE('sc_contato',"Co_codResponsavel = {$_SESSION['USER']['ID']} AND Co_codtpContato = 1",['Co_descricao'],[$contato['Email']]);
            var_dump($updatecontato);
            DEBUG::log("Atualizando registro");
        }
        if(empty(
            DATABASE::SELECT('sc_contato',"where Co_codtpContato = 2 AND Co_codResponsavel =  {$_SESSION['USER']['ID']}")
        )){
            $newtel =  DATABASE::INSERT('sc_contato',['',$contato['Telefone'],$_SESSION['USER']['ID'],'2']);
            DEBUG::log("Criando novo registro de Telefone");
            
        }
        else{
            $updatetel = DATABASE::UPDATE('sc_contato',"Co_codResponsavel = {$_SESSION['USER']['ID']} AND Co_codtpContato = 2",['Co_descricao'],[$contato['Telefone']]);
            var_dump($updatetel);
            DEBUG::log("Atualizando registro de telefone");
            $url = HTTPORIGIN . '/perfil';
            echo "<script>window.location.href = '{$url}' </script>";
        }

}


?>