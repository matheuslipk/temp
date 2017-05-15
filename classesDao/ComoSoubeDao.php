<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/ConexaoDao.php';

class ComoSoubeDao {
   
   
   public function getAll(){
      $con = ConexaoDao::getConecao();
      $query = "SELECT * FROM comoSoube ORDER BY descricao ASC";
      $stmt = $con->prepare($query);
      if($stmt->execute()){
         $result = $stmt->get_result();
         $array = $result->fetch_all(MYSQLI_ASSOC);
         $stmt->close();
         $con->close();
         return $array;
      }
      $stmt->close();
      $con->close();
      return FALSE;
   }
}
