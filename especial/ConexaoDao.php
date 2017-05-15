<?php

class ConexaoDao {
   public static function getConecao(){
      $con = new mysqli('localhost', 'root', '', 'temp');
      $con->set_charset('utf-8');
      return $con;
   }
}
