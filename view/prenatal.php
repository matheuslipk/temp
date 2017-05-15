<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/Pagina.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/MunicipioDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/EstadoDao.php';

class entrevistaMae extends Pagina{
   
   public function exibirHead() {
      parent::exibirHead();
      ?>
      <script>
         $(document).ready(function(){
             atualizaMunicipios();
             
            $("#ufPrenatal").on('change', function (){
               atualizaMunicipios();
            });
            
            function atualizaMunicipios(){
               $.ajax({
                  url: '/controll/municipio/getMunicipioByUf.php',
                  type: 'post',
                  data:{
                     uf: $("#ufPrenatal").val()
                  },
                  success: function (resposta){
                    $("#municipioPrenatal").empty();
                    $("#municipioPrenatal").append(resposta);
                  }
               });
            }
         });
      </script>
      <?php
   }

      public function exibirBody() {
      parent::exibirBody();
      ?>
<div class="container">   
   <h2>4 - Pré-natal</h2>
   <form>
      <div class="row">
         <input style="display: none" name="prontuario" value="<?php echo $_GET['prontuario']; ?>">
         <div class="col-sm-6 form-group">
            <label>Relizou pré-natal?</label>
            <label><input type="radio" value="0" name="primGestacao">Não</label>
            <label><input type="radio" value="1" name="primGestacao">Sim (continuar)</label>
         </div>         
      </div>
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Unidade de saúde que realizou pré-natal:</label>
            <input class="form-control" name="unidadeSaude">
         </div>    
          
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">  
            <label>Estado de realização do pré-natal:</label>
            <select class=" form-control" name="ufPrenatal" id="ufPrenatal">
               <?php
               $estadoDao = new EstadoDao();
               $estados = $estadoDao->getAllEstados();
               foreach ($estados as $estado){
                  echo "<option value='{$estado['uf']}'>".$estado['nome']."</option>";
               }
               ?>
            </select>
         </div>
         <div class="col-sm-6 form-group">
            <label>Município</label>
            <select  class="form-control" name="municipioPrenatal" id="municipioPrenatal">

            </select>
         </div>    
      </div>
      
      <div class="row">
         <div class="col-sm-4 form-group">  
            <label>Número de consultas:</label>
            <input type="number" class="form-control" name="numConsultas1" placeholder="1º trimestre">
         </div> 
         <div class="col-sm-4 form-group">  
            <label>Número de consultas:</label>
            <input type="number" class="form-control" name="numConsultas2" placeholder="2º trimestre">
         </div> 
         <div class="col-sm-4 form-group">  
            <label>Número de consultas:</label>
            <input type="number" class="form-control" name="numConsultas3" placeholder="3º trimestre">
         </div> 
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">  
            <label>Data da primeira consulta</label>
            <input type="date" class="form-control" name="dataConsultas1">
         </div> 
         <div class="col-sm-6 form-group">  
            <label>Idade gestacional no momento da 1ª consulta</label>
            <input type="number" class="form-control" name="idadeGest" placeholder="Em semanas">
         </div> 
      </div>
      
      <div class="row">
         <div class="col-sm-4 form-group">  
            <label>Peso no início da gestação</label>
            <input class="form-control" name="pesoIniGestacao" placeholder="Em kg">
         </div> 
         <div class="col-sm-4 form-group">  
            <label>Peso no final da gestação</label>
            <input class="form-control" name="pesoFimGestacao" placeholder="Em kg">
         </div> 
         <div class="col-sm-4 form-group">  
            <label>Altura</label>
            <input class="form-control" name="idadeGest" placeholder="Em metros">
         </div> 
      </div>
      
      
      <button type="submit" class="btn btn-success">Salvar</button>
   </form>
</div>


      <?php
      parent::exibirPaginacaoQuest(10, $_GET['prontuario']);
   }
}
$e = new entrevistaMae();
$e->display();