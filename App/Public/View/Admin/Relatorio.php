<?php 
ob_start();
date_default_timezone_set('America/Sao_Paulo');
$DATETIME = Date('Y-m-d (H:i a)');
$ocorrencias = DATABASE::SELECT('sc_estado',null,false,null,false,true);
$header = array('A','B','C','D');
function Init($p,$date){
    $p->AddPage();
    $p->SetAuthor('Erick Gato',true);
    $p->SetFont('Times','B',50);
    $p->SetFillColor(255, 250, 247);
    $p->rect(0,0,247,300,'F');
    $p->SetFillColor(26,29,46);
    $p->rect(78,0,160,300,'F');
    $p->SetFillColor(254, 138, 53);
    $p->rect(20,80,260,76,'F');
    $p->SetXY(40,100);
    $p->cell(12,14,utf8_decode("Relatório"),0,2);
    $p->cell(12,14,utf8_decode("de Fluxo"),0,0);
    $p->SetFont('Times','BI',20);
    $p->SetXY(40,130);
    $p->cell(12,23,utf8_decode('SCIA - Sistema de controle interação ambiente'));
    $p->SetXY(80,0);
    $p->SetFont('Times','B',15);
    $p->SetTextColor(255,255,255);
    $p->cell(12,23,utf8_decode("$date"));
}
require_once PDF;
$p = new PDF('P','mm','A4');
Init($p,$DATETIME);
$p->AddPage();
//Quadrado preto
$p->SetFillColor(26,29,46);
$p->rect(170,0,40,300,'F');
// *****
//Header da pagina 2
$p->SetFillColor(254, 138, 53);
$p->rect(0,10,190,50,'F');
//Page 2 conteudo
$p->SetFont('Times','B',70);
$p->cell(30,40,utf8_decode('Ocorrências'));
$p->SetXY(172,69);
$p->SetTextColor(222, 47, 53);
$p->SetFont('Times','B',40);
$p->cell(30,10,utf8_decode('250'),0,2);
$p->SetFont('Times','',13);
$p->SetTextColor(255,255,255);
$p->cell(40,20,utf8_decode("liberações"));
$p->SetDrawColor(255,255,255);
$p->line(170,100,290,100);
///***   */
$p->SetXY(172,109);
$p->SetTextColor(222, 47, 53);
$p->SetFont('Times','B',40);
$p->cell(30,9,utf8_decode('50'),0,2);
$p->SetFont('Times','',13);
$p->SetTextColor(255,255,255);
$p->cell(40,13,utf8_decode("Cadastros"));
$p->line(170,130,290,130);
/*  * */
///***   */
$p->SetXY(172,128);
$p->SetTextColor(222, 47, 53);
$p->SetFont('Times','B',40);
$p->Cell(30,24,utf8_decode('300'),0,2);
$p->SetFont('Times','',13);
$p->SetTextColor(255,255,255);
$p->Cell(40,3,utf8_decode("Ocorrências"));
$p->line(170,160,290,160);
/*  * */
$p->SetTextColor(0,0,0);
foreach($ocorrencias as $oc){
    $uf = $oc['Es_nome'];
    $nome = $oc['Es_UF'];
    $p->Cell(4,1,$uf,0,2);
    $p->Cell(4,1,$nome,0,1);
}
$p->output();