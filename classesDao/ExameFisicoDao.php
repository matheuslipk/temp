<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class ExameFisicoDao {
   public function inserirExameFisico($array){
      
      $con = ConexaoDao::getConecao();
      $query = "INSERT INTO exameFisico VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiiiiiiissis", $array['idProntuario'], $array['peso'], 
              $array['estatura'], $array['perimToracico'], $array['perimCefalico'], 
              $array['apgar1'], $array['apgar5'], $array['apgar10'], 
              $array['malformacao'], $array['tipoMalformacao'], $array['descMalformacao'], 
              $array['achadosClinicos'], $array['outrosAchadosClinicos']);
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
   
   public function getExameFisicoByProntuario($prontuario){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM exameFisico WHERE idProntuario=?";
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
   
   public function updateExameFisico($array){      
      $con = ConexaoDao::getConecao();
      $query = "UPDATE exameFisico SET peso=?, estatura=?, perimToracico=?, "
              . "perimCefalico=?, apgar1=?, apgar5=?, apgar10=?, malformacao=?, "
              . "tipoMalformacao=?, descMalformacao=?, achadosClinicos=?, "
              . "outrosAchadosClinicos=? WHERE idProntuario=?";
      $stmt = $con->prepare($query);
      $stmt->bind_param("iiiiiiiissisi", $array['peso'], 
              $array['estatura'], $array['perimToracico'], $array['perimCefalico'], 
              $array['apgar1'], $array['apgar5'], $array['apgar10'], 
              $array['malformacao'], $array['tipoMalformacao'], $array['descMalformacao'], 
              $array['achadosClinicos'], $array['outrosAchadosClinicos'], $array['idProntuario']);
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
