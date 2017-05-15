<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class QuestionarioDao {   
   public function inserirQuestionario($array){
      
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO questionario VALUES (NULL,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("sissiiiiss",$array['nome'], $array['idade'],
              $array['ocupacao'], $array['email'], $array['comoSoube'], 
              $array['impTema'], $array['interacao'], $array['atendimento'], 
              $array['sugerirTema'], $array['criticaSugestao']);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      $erro = $stmt->error;
      $stmt->close();
      $con->close();
      return $erro;
   }
   
   public function getQuestionarioById($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM questionario WHERE idQuestionario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("i", $prontuario);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_assoc();
         $stmt->close();
         $con->close();
         return $array;
      }
      $stmt->close();
      $con->close();
      return FALSE;
   }
   
   public function updateQuestionario($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE questionario SET peso=?, estatura=?, perimToracico=?, "
              . "perimCefalico=?, apgar1=?, apgar5=?, apgar10=?, malformacao=?, "
              . "tipoMalformacao=?, descMalformacao=?, achadosClinicos=?, "
              . "outrosAchadosClinicos=? WHERE idQuestionario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiiiiiissisi", $array['peso'], 
              $array['estatura'], $array['perimToracico'], $array['perimCefalico'], 
              $array['apgar1'], $array['apgar5'], $array['apgar10'], 
              $array['malformacao'], $array['tipoMalformacao'], $array['descMalformacao'], 
              $array['achadosClinicos'], $array['outrosAchadosClinicos'], $array['idQuestionario']);
      if($stmt->execute()){
         $stmt->close();
         $con->close();
         return TRUE;
      }
      $erro = $stmt->error;
      $stmt->close();
      $con->close();
      return $erro;
   }
}