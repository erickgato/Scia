<?php 
session_start();
  include_once 'app/index.php';
  if(!isset($_GET['url'])){
        includePublic('FLogin.php');
        session_destroy();
  }
      
   if(ROUTE::GET('Admin')){
       includePublic('Admin.php');
   }
   if(ROUTE::GET('perfil')){
       includePublic('View/Responsaveis/loader.php');
   }
   if(ROUTE::GET('autoaluno')){
        includePublic('View/Responsaveis/autorizaaluno.php');
   }
   if(ROUTE::GET('admin/dashboard')){
    includePublic('View/Admin/CadastrarAluno.php');
}