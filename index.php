<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/ComoSoubeDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/Pagina.php';

class Index extends Pagina{
   public function exibirHead() {
      parent::exibirHead();
      ?>
<script>
   $(document).ready(function(){
      $("#selectComoSoube").on('change', function (){
         var a = $(this).val();
         if(a == 7){
            $("#inputComoSoube").empty();
            $("#inputComoSoube").attr("readonly", false);
            $("#inputComoSoube").empty();
         }else{
            $("#inputComoSoube").attr("readonly", true);
         }
      });
   });
</script>

      <?php
   }

      public function exibirBody() {
      parent::exibirBody();
      $this->exibirPagInicial();      
   }
   
   public function exibirPagInicial(){
      ?>
      <div class="container">
         
         <div class="row">
            <div class="titulo">
               <h1>
                  <strong>
                     Pesquisa de Stisfação<br>
                     Pint of Science Teresina 2017
                  </strong>
               </h1>
            </div>
         </div>
         <form method="post" action="/controll/questionario/inserirQuestionario.php">
            <div class="row">
               <div class="form-group col-sm-6">
                  <label>Nome</label>
                  <input required name="nome" class="form-control">
               </div>
               <div class="form-group col-sm-6">
                  <label>Idade</label>
                  <input required name="idade" type="number" class="form-control">
               </div>
            </div>
            
            <div class="row">
               <div class="form-group col-sm-6">
                  <label>Ocupação</label>
                  <input required name="ocupacao" class="form-control">
               </div>
               <div class="form-group col-sm-6">
                  <label>Email</label>
                  <input required name="email" type="email" class="form-control">
               </div>
            </div>
            
            <div class="row">
               <div class="form-group col-sm-6">
                  <label>Como soube</label>
                  <select class="form-control" name="comoSoube" id="selectComoSoube">
                     <?php
                     $comoSoube = new ComoSoubeDao();
                     $result = $comoSoube->getAll();         
                     foreach ($result as $opcao){
                        echo "<option value='{$opcao['id']}'>".$opcao['descricao'].'</option>';
                     }
                     ?>
                  </select>
                  <input readonly class="form-control" name="outros" placeholder="Caso outros meios preencher aqui" id="inputComoSoube">
               </div>
               <div class="form-group col-sm-6">
                  <label>Importância e criatividade do tema</label><br>
                  <label><input name="impTema" type="radio" value="1" required>Péssima</label>
                  <label><input name="impTema" type="radio" value="2" required>Ruim</label>
                  <label><input name="impTema" type="radio" value="3" required>Regular</label>
                  <label><input name="impTema" type="radio" value="4" required>Bom</label>
                  <label><input name="impTema" type="radio" value="5" required>Ótimo</label>
               </div>
            </div>
            
            <div class="row">
               <div class="form-group col-sm-6">
                  <label>Interação com o público</label><br>
                  <label><input name="interacao" type="radio" value="1" required>Péssima</label>
                  <label><input name="interacao" type="radio" value="2" required>Ruim</label>
                  <label><input name="interacao" type="radio" value="3" required>Regular</label>
                  <label><input name="interacao" type="radio" value="4" required>Bom</label>
                  <label><input name="interacao" type="radio" value="5" required>Ótimo</label>
               </div>
               <div class="form-group col-sm-6">
                  <label>Qualidade no atendimento do restaurante</label><br>
                  <label><input name="atendimento" type="radio" value="1" required>Péssima</label>
                  <label><input name="atendimento" type="radio" value="2" required>Ruim</label>
                  <label><input name="atendimento" type="radio" value="3" required>Regular</label>
                  <label><input name="atendimento" type="radio" value="4" required>Bom</label>
                  <label><input name="atendimento" type="radio" value="5" required>Ótimo</label>
               </div>
            </div>
            
            <div class="row">
               <div class="form-group col-sm-6">
                  <label>Quais temas você gostaria de ver no Pint 2018?</label>
                  <input class="form-control" name="sugerirTema">
               </div>
               
               <div class="form-group col-sm-6">
                  <label>Críticas e sugestões</label>
                  <textarea name="criticaSugestao" class="form-control"></textarea>
               </div>
            </div>
            
            <div>
               <button class="btn btn-primary" type="submit">Criar</button>
            </div>
         </form>
         
        
                  
      </div>
      <?php
   }
   
}

$i = new Index();
$i->display();
