<?php

class Controller {
   
    
    public static function isUsuarioLogado(){
        
        if(session_status()!==2){
           Ultilitarios::sec_session_start();
        }
        if(!isset($_SESSION['idAgente'])){//Se seção não exixtir
            return FALSE;
        }else{//Se a seção existir
            if(time() - $_SESSION['tempoAgente'] > 60*60){
                Controller::destruirSessaoAgente();
                return false;
            }else{
                $_SESSION['tempoAgente'] = time();
                return true;                
            }
            
        }
    }
    
    public static function isNickValido($nick){
        $usuario2 = strtolower($nick);
        $tam = strlen($usuario2);
        if($tam>32){
            return FALSE;
        }
        $primeira_letra = substr($usuario2, 0, 1);
        if(! (ord($primeira_letra)>=97 && ord($primeira_letra)<=122)){
            return FALSE;
        }

        for($i=0; $i<$tam; $i++){
            $valor = ord(substr($usuario2, $i, 1));
            if(! (($valor>=97 && $valor<=122) || ($valor>=48 && $valor<=57))){
                return false;
            }
        }
        return TRUE;
    }    
    
    
   public static function destruirSessaoAgente(){
      unset($_SESSION['idAgente']);
      unset($_SESSION['nickAgente']);
      unset($_SESSION['tempoAgente']);
      session_destroy();
   }
    
}
