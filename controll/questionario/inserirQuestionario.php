<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/QuestionarioDao.php';

function inserirQuestionario(){
   $questDao = new QuestionarioDao();
   $array['idQuestionario'] = NULL;
   $array['nome'] = $_POST['nome'];
   $array['idade'] = $_POST['idade'];
   $array['ocupacao'] = $_POST['ocupacao'];
   $array['email'] = $_POST['email'];
   $array['comoSoube'] = $_POST['comoSoube'];
   $array['outros'] = $_POST['outros'];
   $array['impTema'] = $_POST['impTema'];
   $array['interacao'] = $_POST['interacao'];
   $array['atendimento'] = $_POST['atendimento'];
   $array['sugerirTema'] = $_POST['sugerirTema'];
   $array['criticaSugestao'] = $_POST['criticaSugestao'];
   
   $result = $questDao->inserirQuestionario($array);
   if($result === TRUE){
      header("Location: /?resultado=sucesso");
   }
}

inserirQuestionario();