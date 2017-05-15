<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root."/classesDao/UsuarioDao.php";

fazerLoginUsuario();

function fazerLoginUsuario(){
   if(filter_has_var(INPUT_POST, 'usuario')){
      $userPOST = filter_input(INPUT_POST, 'usuario');          
   }else {
      redirecionaParaLogin('faltandoUsuario');    
   }

   if(filter_has_var(INPUT_POST, 'senha')){
      $senhaPOST = sha1(filter_input(INPUT_POST, 'senha'));
   }else {
      redirecionaParaLogin('faltandoSenha');
   }

   $usuario = new UsuarioDao();
   $usuarioBanco = $usuario->getUsuarioByNick($userPOST);

   if($usuarioBanco==NULL || $senhaPOST!=$usuarioBanco['senha']){
      redirecionaParaLogin('usuarioSenhaNaoCorrespondem');
   }else{      
      session_start();
      $_SESSION['idUsuario'] = $usuarioBanco['idUsuario'];
      $_SESSION['nickUsuario'] = $usuarioBanco['nick'];  
      $_SESSION['tempoUsuario'] = time();
      header("Location: /");
   }
}

function redirecionaParaLogin($erro){
    header("Location: /?erro=$erro");
}