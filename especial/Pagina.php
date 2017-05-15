<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root."/controll/Controller.php";

class Pagina {
   private $tituloPagina;
   private $usuarioLogado=false;


   public final function display() {
      session_start();
      if(!isset($_SESSION['idUsuario'])){
         header("Location: /login.php");
      }
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
          <a class="navbar-brand" href="/">Hospital</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
             
<!--            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pagina 2<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Pagina 2-1</a></li>
                <li><a href="#">Pagina 2-2</a></li>
              </ul>
            </li>-->
            
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $_SESSION['nickUsuario']; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <li><a href="#">Minha conta</a></li>
                   <li><a href="/controll/logicaLogout.php">Sair</a></li>
                </ul>
                
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
               Hospital Copyright © 2017 <br>
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

   public function exibirPaginacaoQuest(int $pag, int $prontuario){
      echo "<div class='row'>";
      echo "<div class='col-xs-2'></div>";
      echo "<div class='col-xs-8'>";
      echo "<ul class='pagination  center-block'>";
      
      if($pag === 1){
         echo "<li class='active'><a href='/view/1.0-servicoSaude.php?prontuario={$prontuario}'>1</a></li>";
      }else{
         echo "<li><a href='/view/1.0-servicoSaude.php?prontuario={$prontuario}'>1</a></li>";
      }
      if($pag ===2){
         echo "<li class='active'><a href='/view/2.1-recemNascido.php?prontuario={$prontuario}'>2</a></li>";
      }else{
         echo "<li><a href='/view/2.1-recemNascido.php?prontuario={$prontuario}'>2</a></li>";
      }
      if($pag ===3){
         echo "<li class='active'><a href='/view/2.3-examesInespecificos.php?prontuario={$prontuario}'>3</a></li>";
      }else{
         echo "<li><a href='/view/2.3-examesInespecificos.php?prontuario={$prontuario}'>3</a></li>";
      }
      if($pag ===4){
         echo "<li class='active'><a href='#'>4</a></li>";
      }else{
         echo "<li><a href='#'>4</a></li>";
      }
      if($pag ===5){
         echo "<li class='active'><a href='/view/2.5-examesImagem.php?prontuario={$prontuario}''>5</a></li>";
      }else{
         echo "<li><a href='/view/2.5-examesImagem.php?prontuario={$prontuario}''>5</a></li>";
      }
      if($pag ===6){
         echo "<li class='active'><a href='/view/entrevistaMae.php?prontuario={$prontuario}''>6</a></li>";
      }else{
         echo "<li><a href='/view/entrevistaMae.php?prontuario={$prontuario}''>6</a></li>";
      }
      if($pag ===7){
         echo "<li class='active'><a href='/view/antecedentes.php?prontuario={$prontuario}''>7</a></li>";
      }else{
         echo "<li><a href='/view/antecedentes.php?prontuario={$prontuario}''>7</a></li>";
      }
      if($pag ===8){
         echo "<li class='active'><a href='/view/histObstetrico.php?prontuario={$prontuario}''>8</a></li>";
      }else{
         echo "<li><a href='/view/histObstetrico.php?prontuario={$prontuario}''>8</a></li>";
      }
      if($pag ===9){
         echo "<li class='active'><a href='/view/habitosGestacao.php?prontuario={$prontuario}''>9</a></li>";
      }else{
         echo "<li><a href='/view/habitosGestacao.php?prontuario={$prontuario}''>9</a></li>";
      }
      if($pag ===10){
         echo "<li class='active'><a href='/view/prenatal.php?prontuario={$prontuario}''>10</a></li>";
      }else{
         echo "<li><a href='/view/prenatal.php?prontuario={$prontuario}''>10</a></li>";
      }
      
      
      echo "</ul>";
      echo "</div> ";           
      echo "</div>";
      
   }
}
