<?php
include_once 'crudissonUnidade.php';
include_once 'crudissonOcorrencia.php';
/*
$un = new Unidade('IEL');
var_dump($un);
$un->Cadastrar();
$un->buscar();
$un->apagar(null,'IEL');
$oc = new Unidade('IEL');
*/
$occ = new Ocorrencia(1,2,2,'Aluno Liberado por motivos medicos','2020-09-03');
//$occ->cadastrar();
$occ->buscar();
$occ->apagar(5);
$occ->editar(2);
?>