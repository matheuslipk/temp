<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root."/controll/Controller.php";

class Pagina {
   private $tituloPagina;
   private $usuarioLogado=false;


   public final function display() {
      echo "<!DOCTYPE html>\n";
      echo "<html lang='pt-br'>\n";
      echo "<head>\n";
      $this->exibirHead();
      echo "</head>\n";
      echo "<body>\n";
      $this->exibirBody();
      $this->exibirRodape();
      echo "</body>\n";      
      echo '</html>';
   }

   public function setTituloPagina($titulo){
      $this->tituloPagina = $titulo;
   }

   public function exibirHead(){
      ?>
      <?php $this->exibirTituloPagina();  ?>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="/bootstrap/css/meucss.css">
      <script src="/bootstrap/js/jquery-3.1.1.min.js"></script>
      <script src="/bootstrap/js/bootstrap.min.js"></script>
      <?php
   }
    
   public function exibirBody(){
      $this->exibirBarraNavUsuario();
   }
   
   public function getResponsavelLogado(){
      return $this->usuarioLogado;
   }
   
    
    private function exibirBarraNavUsuario(){
        ?>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="/">Questionário</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo 'Inserir dados'; ?></a>
                
                
            </li>
          </ul>
        </div>
      </div>
    </nav>
        
    <?php
    }
    
   public function exibirRodape(){
      ?>
      <footer class="footer navbar-text">
         <div class="container">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
               <p class="text-muted text-center">
               Copyright © 2017 <br>
               Seu ip é <?php echo $_SERVER['REMOTE_ADDR'].' em '; ?>
               <?php 
               if($this->usuarioLogado){
                  $data = $_SESSION['tempoAgente'];
                  echo Ultilitarios::dataHoraFormatada($data);
               }
               ?>
               </p>
            </div>
         </div>            
      </footer>        
        <?php
    }

        //métodos privados
   private function exibirTituloPagina(){
      echo "<title>{$this->tituloPagina}</title>\n";
   }
}
