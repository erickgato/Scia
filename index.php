<?php 
session_start();
  include_once 'app/index.php';
  if(!isset($_GET['url'])){
        includePublic('FLogin.php');
        session_destroy();
        exit;
  }
  switch(ROUTE::RETURN()){
      case 'Admin':
        includePublic('Admin.php');
      break;
      case 'perfil':
        includePublic('View/Responsaveis/loader.php');
      break;
      case 'autoaluno':
        includePublic('View/Responsaveis/autorizaaluno.php');
      break;
      case 'ConsultarAluno': 
        includePublic('View/Admin/ConsultarAluno.php');
      break;
      case 'ConsultarResponsavel': 
        includePublic('View/Admin/ConsultarResponsavel.php');
      break;
      case 'CadastrarAluno':
        includePublic('View/Admin/CadastrarAluno.php');
      break;
      case 'CadastrarResponsavel':
        includePublic('View/Admin/CadastrarResponsavel.php');
      break;
      case 'CadastrarFuncionario':
        includePublic('View/Admin/CadastrarFuncionario.php');
      break;
      default:
        includePublic('View/404.html');
      break;
  }    