<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/Pagina.php';

class recemNascido extends Pagina{
   
   public function exibirHead() {
      parent::exibirHead();
      ?>
      <script>
         $(document).ready(function (){
            $("#hemogramaSim").on('change', function(){
               $(".hemogramaOp").attr("disabled", false);
               $("#divFormHemograma").show();
            });
            $("#hemogramaNao").on('change', function(){
               $(".hemogramaOp").attr("disabled", true);
               $("#divFormHemograma").hide();
            });
            
            $("#puncaoLiquoricaSim").on('change', function(){
               $(".puncaoLiquoricaOp").attr("disabled", false);
               $("#divFormPuncaoLiquorica").show();
            });
            $("#puncaoLiquoricaNao").on('change', function(){
               $(".puncaoLiquoricaOp").attr("disabled", true);
               $("#divFormPuncaoLiquorica").hide();
            });
            
         });
      </script>


      <?php
   }

      public function exibirBody() {
      parent::exibirBody();
      if(isset($_GET['prontuario'])){
      }else{
         die("Nenhum prontuário selecionado");
      }
      ?>
<div class="container">
   <h3>2.3 - Exames inespecíficos</h3>  
      <form method="get" action="">
         <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none">
         <div class="row">
            <div class="col-xs-12 form-group">
               <label>2.3.1 - Hemograma (considerar o primeiro)</label>   
               <label><input required name="hemograma" value="0" type="radio" id="hemogramaNao">Não</label>
               <label><input required name="hemograma" value="1" type="radio" id="hemogramaSim">Sim</label>
            </div>
         </div>
         
         <div class="row" id="divFormHemograma">
            <div class="">
               <div class="col-xs-6 form-group">
                  <label>Data do exame</label>
                  <input type="date" name="dataHemograma" class="form-control hemogramaOp">
               </div>
               <div class="col-xs-6 form-group">
                  <label>Hb (mg/dl)</label>
                  <input type="number" name='hb' class="form-control hemogramaOp">
               </div>
            </div>
            
            <div class="col-xs-6 form-group">
               <label>Ht (%)</label>
               <input type="number" name="ht" class="form-control hemogramaOp">
            </div>
            <div class="col-xs-6 form-group">
               <label>Leocócitos (mm3)</label>
               <input type="number" name="leococitos" class="form-control hemogramaOp">
            </div>
            
            <div class="col-xs-6 form-group">
               <label>Bastonetes (%)</label>
               <input type="number" name="bastonetes" class="form-control hemogramaOp">
            </div>
            <div class="col-xs-6 form-group">
               <label>Segmentados (%)</label>
               <input type="number" name="segmentados" class="form-control hemogramaOp">
            </div>
            
            <div class="col-xs-6 form-group">
               <label>Monócitos (%)</label>
               <input type="number" name="monocitos" class="form-control hemogramaOp">
            </div>
            <div class="col-xs-6 form-group">
               <label>Linfócitos (%)</label>
               <input type="number" name="linfocitos" class="form-control hemogramaOp">
            </div>
            
            <div class="col-xs-6 form-group">
               <label>Plaquetas (mm3)</label>
               <input type="number" name="plaquetas" class="form-control hemogramaOp">
            </div>
            <div class="col-xs-6 form-group">
               <label>Glicose (mg/dl)</label>
               <input type="number" name="glicose" class="form-control hemogramaOp">
            </div>            
         </div>         
         <button type="submit" class="btn btn-success">Enviar</button>         
      </form> 
   
   <form method="post" action="/controll/examePuncaoLiquorica/inserirExamePuncaoLiquorica.php">
      <div class="row">
         <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none">
         <div class="col-xs-12 form-group">
            <label>2.3.2 - Punção liquórica</label>
            <label><input name="puncaoLiquorica" value="0" type="radio" id="puncaoLiquoricaNao" required>Não</label>
            <label><input name="puncaoLiquorica" value="1" type="radio" id="puncaoLiquoricaSim" required>Sim</label>
         </div>         
      </div>
      <div id="divFormPuncaoLiquorica">
         <div class="row">
            <div class="col-xs-6">
               <label>Data do exame</label>
               <input type="date" name="dataPuncaoLiquorica" class="form-control puncaoLiquoricaOp">
            </div>
            
            <div class="col-xs-6">
               <label>Aspecto</label>
               <select name="aspecto" class="form-control puncaoLiquoricaOp">
                  <option>Límpido</option>
                  <option>Purulento</option>
                  <option>Hemorrágico</option>
                  <option>Turvo</option>
                  <option>Xantocrômico</option>
                  <option>Outros</option>
                  <option>Iguinorado</option>
               </select>
            </div>            
         </div>
         
         <div class="row">
            <div class="col-xs-6 form-group">
               <label>Hemácias (mm3)</label>
               <input type="number" name="hemacias" class="form-control puncaoLiquoricaOp">
            </div>
            <div class="col-xs-6 form-group">
               <label>Leocócitos (mm3)</label>
               <input type="number" name="leococitos" class="form-control puncaoLiquoricaOp">
            </div>
         </div>
         
         <div class="row">
            <div class="col-xs-6 form-group">
               <label>Bastonetes (%)</label>
               <input type="number" name="bastonetes" class="form-control puncaoLiquoricaOp">
            </div>
            <div class="col-xs-6 form-group">
               <label>Segmentados (%)</label>
               <input type="number" name="segmentados" class="form-control puncaoLiquoricaOp">
            </div>
         </div>
         
         <div class="row">
            <div class="col-xs-6 form-group">
               <label>Monócitos (%)</label>
               <input type="number" name="monocitos" class="form-control puncaoLiquoricaOp">
            </div>
            <div class="col-xs-6 form-group">
               <label>Linfócitos (%)</label>
               <input type="number" name="linfocitos" class="form-control puncaoLiquoricaOp">
            </div>
         </div>
         
         <div class="row">
            <div class="col-xs-6 form-group">
               <label>Proteínas (mg/dl)</label>
               <input type="number" name="proteinas" class="form-control puncaoLiquoricaOp">
            </div>
            <div class="col-xs-6 form-group">
               <label>Cloreto (mg/dl)</label>
               <input type="number" name="cloreto" class="form-control puncaoLiquoricaOp">
            </div>
         </div>
         
         <div class="row">
            <div class="col-xs-6 form-group">
               <label>Glicose (mg/dl)</label>
               <input type="number" name="glicose" class="form-control puncaoLiquoricaOp">
            </div>
         </div>
      </div>
      
      
      <button class="btn btn-success">Enviar</button>
   </form>
     
   
</div>
      <?php
      parent::exibirPaginacaoQuest(3, $_GET['prontuario']);
   }
}
$e = new recemNascido();
$e->display();