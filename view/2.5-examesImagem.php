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
   <h3>2.5 - Exames de imagem</h3>  
   <form method="post" action="/controll/exameImagem/inserirExameImagem.php">
      <input name="prontuario" value="<?php echo $_GET['prontuario']; ?>" style="display: none">
      <div class="row">
         <div class="col-xs-6 form-group">
            <label>Tomografia craniana</label>   
            <label><input required name="tomografiaCran" value="0" type="radio" id="tomografiaCranNao">Não</label>
            <label><input required name="tomografiaCran" value="1" type="radio" id="tomografiaCranSim">Sim</label>
         </div>
         <div class="col-xs-6 form-group">
            <label>Resultado</label>
            <select name="resultTomografiaCran" class="form-control">
               <option></option>
               <option>Normal</option>
               <option>Calcificações</option>
               <option>Isencefalia</option>
               <option>Atrofia cerebral</option>
               <option>Ventriculomegalia</option>
               <option>Suturas calcificadas</option>
               <option>Outras</option>
            </select>
         </div>
      </div>
      
      <div class="row">
         <div class="col-xs-6 form-group">
            <label>Ressonancia magnética</label>   
            <label><input required name="ressonanciaMagCran" value="0" type="radio" id="ressonanciaMagCranNao">Não</label>
            <label><input required name="ressonanciaMagCran" value="1" type="radio" id="ressonanciaMagCranSim">Sim</label>
         </div>
         <div class="col-xs-6 form-group">
            <label>Resultado</label>
            <select name="resultRessonanciaMagCran" class="form-control">
               <option></option>
               <option>Normal</option>
               <option>Calcificações</option>
               <option>Isencefalia</option>
               <option>Atrofia cerebral</option>
               <option>Ventriculomegalia</option>
               <option>Suturas calcificadas</option>
               <option>Outras</option>
            </select>
         </div>
      </div>
      
      <div class="row">
         <div class="col-xs-6 form-group">
            <label>Ultrassom transfontanela</label>   
            <label><input required name="ultrassomTrans" value="0" type="radio" id="ultrassomTransNao">Não</label>
            <label><input required name="ultrassomTrans" value="1" type="radio" id="ultrassomTransSim">Sim</label>
         </div>
         <div class="col-xs-6 form-group">
            <label>Resultado</label>
            <select name="resultUltrassomTrans" class="form-control">
               <option></option>
               <option>Normal</option>
               <option>Calcificações</option>
               <option>Isencefalia</option>
               <option>Atrofia cerebral</option>
               <option>Ventriculomegalia</option>
               <option>Suturas calcificadas</option>
               <option>Outras</option>
            </select>
         </div>
      </div>
      
      <div class="row">
         <div class="col-xs-6 form-group">
            <label>Ultrassom abdominal</label>   
            <label><input required name="ultrassomAbd" value="0" type="radio" id="ultrassomAbdNao">Não</label>
            <label><input required name="ultrassomAbd" value="1" type="radio" id="ultrassomAbdSim">Sim</label>
         </div>
         <div class="col-xs-6 form-group">
            <label>Resultado</label>
            <select name="resultUltrassomAbd" class="form-control">
               <option></option>
            </select>
         </div>
      </div>
      
      <div class="row">
         <div class="col-xs-6 form-group">
            <label>Ecocardiograma</label>   
            <label><input required name="ecocardiograma" value="0" type="radio" id="tomografiaCranNao">Não</label>
            <label><input required name="ecocardiograma" value="1" type="radio" id="tomografiaCranSim">Sim</label>
         </div>
         <div class="col-xs-6 form-group">
            <label>Resultado</label>
            <select name="resultEcocardiograma" class="form-control">
               <option></option>
            </select>
         </div>
      </div>

      
      <button type="submit" class="btn btn-success">Enviar</button>         
   </form>
</div>
      <?php
      parent::exibirPaginacaoQuest(5, $_GET['prontuario']);
   }
}
$e = new recemNascido();
$e->display();