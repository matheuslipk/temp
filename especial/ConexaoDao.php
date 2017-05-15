<?php

class ConexaoDao {
   public static function getConecao(){
      $con = new mysqli('localhost', 'root', '21049900', 'temp');
      $con->set_charset('utf8');
      return $con;
   }
}
