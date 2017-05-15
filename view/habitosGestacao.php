<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/Pagina.php';

class entrevistaMae extends Pagina{
   
   public function exibirHead() {
      parent::exibirHead();
      ?>
      <script>
         $(document).ready(function(){
             
         });
      </script>
      <?php
   }

      public function exibirBody() {
      parent::exibirBody();
      ?>
<div class="container">   
   <h4>3.5 - Hábitos durante a gestação - Álcool</h4>
   <form>
      <input style="display: none" name="prontuario" value="<?php echo $_GET['prontuario']; ?>">
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Fez uso de bebida alcoólica durante a gestação?</label>
            <label><input type="radio" name="usoAlcool" value="0">Não (Pular para tabagismo)</label>
            <label><input type="radio" name="usoAlcool" value="1">Sim (Continuar)</label>
         </div>
         <div class="col-sm-6 form-group">
            <label>Com que frequência você utilizava bebidas alcoólicas por semana?</label>
            <select name="freqAlcool" class="col-sm-6 form-control">
               <option>1</option>
               <option>2</option>
               <option>3</option>
               <option>4</option>
               <option>5</option>
               <option>6</option>
               <option>7 ou mais</option>
            </select>
         </div>                
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Quantas doses ou drinks você costumava tomar nesses dias?</label>
            <select name="dosesDrinks" class="col-sm-6 form-control">
               <option>1</option>
               <option>2</option>
               <option>3 ou mais</option>
            </select>
         </div> 
         
         <div class="col-sm-6 form-group">
            <label>Com que frequência tomava mais que três doses ou drinks na mesma ocasião?</label>
            <select name="freqDrinks" class="col-sm-6 form-control">
               <option>Nunca</option>
               <option>Mensalmente ou menos</option>
               <option>Mensalmente</option>
               <option>Semanalmente</option>
               <option>Diariamente</option>
               <option>Iguinorada</option>
            </select>
         </div>          
      </div>
      <button type="submit" class="btn btn-success">Salvar</button>
   </form>
   
   <h4>Tabagismo</h4>
   <form>
      <div class="row">
      <input style="display: none" name="prontuario" value="<?php echo $_GET['prontuario']; ?>">
         <div class="col-sm-6 form-group">
            <label>Em relação ao cigarro, você diria que:</label>
            <select name="cigarro" class="form-control">
               <option>Nunca fumei</option>
               <option>Fumei no passado, mas na gestação não</option>
               <option>Fumei menos que 10 cigarros por dia</option>
               <option>Fumei de 10 a 20 cigarros por dia</option>
               <option>Fumei mais de 20 cigarros por dia</option>
               <option>Não soube responder</option>
            </select>
         </div>         
         <div class="col-sm-6 form-group">
            <label>Se fumante, há quantos anos fuma diariamente?</label>
            <input type="number" class="form-control" name="tempoFumante">
         </div>
         
      </div>
      
      <div class="row">         
         <div class="col-sm-6 form-group">
            <label>Se ex-fumante, parou de fumar há quanto tempo?</label>
            <input type="number" class="form-control" name="tempoExFumante">
            <label><input required type="radio" value="dia" name="escalaTempo">Dias</label>
            <label><input type="radio" value="semana" name="escalaTempo">Semanas</label>
            <label><input type="radio" value="mes" name="escalaTempo">Meses</label>
            <label><input type="radio" value="ano" name="escalaTempo">Anos</label>
         </div>         
      </div>
      <button type="submit" class="btn btn-success">Salvar</button>
   </form>
   
   <h4>Drogas ilícitas - Agora nós vamos falar sobre o uso de substâncias estimulantes 
      ou calmantes. Alguma vez você usou:</h4>
   
   <form>
      <div class="row">
         <input style="display: none" name="prontuario" value="<?php echo $_GET['prontuario']; ?>">
         <div class="col-sm-6 form-group">
            <label><u>Maconha:</u></label>
            <label><input required type="radio" name="usoMaconha">Nunca</label>
            <label><input type="radio" name="usoMaconha">Nenhuma vez no último ano antes de ficar grávida</label>
            <label><input type="radio" name="usoMaconha">Uma vez por mês pelo menos</label>
            <label><input type="radio" name="usoMaconha">Mais ou menos uma vez por semana</label>
            <label><input type="radio" name="usoMaconha">Todos os dias</label>
         </div>         
         <div class="col-sm-6 form-group">
            <label><u>Cocaína cheirada:</u></label>
            <label><input required type="radio" name="usoCocaina">Nunca</label>
            <label><input type="radio" name="usoCocaina">Nenhuma vez no último ano antes de ficar grávida</label>
            <label><input type="radio" name="usoCocaina">Uma vez por mês pelo menos</label>
            <label><input type="radio" name="usoCocaina">Mais ou menos uma vez por semana</label>
            <label><input type="radio" name="usoCocaina">Todos os dias</label>
         </div>         
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label><u>Qualquer droga injetável:</u></label>
            <label><input required type="radio" name="usoDrogaInjetavel">Nunca</label>
            <label><input type="radio" name="usoDrogaInjetavel">Nenhuma vez no último ano antes de ficar grávida</label>
            <label><input type="radio" name="usoDrogaInjetavel">Uma vez por mês pelo menos</label>
            <label><input type="radio" name="usoDrogaInjetavel">Mais ou menos uma vez por semana</label>
            <label><input type="radio" name="usoDrogaInjetavel">Todos os dias</label>
         </div>         
         <div class="col-sm-6 form-group">
            <label><u>Crack ou merla:</u></label>
            <label><input required type="radio" name="usoCrack">Nunca</label>
            <label><input type="radio" name="usoCrack">Nenhuma vez no último ano antes de ficar grávida</label>
            <label><input type="radio" name="usoCrack">Uma vez por mês pelo menos</label>
            <label><input type="radio" name="usoCrack">Mais ou menos uma vez por semana</label>
            <label><input type="radio" name="usoCrack">Todos os dias</label>
         </div>         
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label><u>Lança perfumes, loló, éter, solventes, esmalte, tinta, clorofórmio:</u></label>
            <label><input required type="radio" name="usoLolo">Nunca</label>
            <label><input type="radio" name="usoLolo">Nenhuma vez no último ano antes de ficar grávida</label>
            <label><input type="radio" name="usoLolo">Uma vez por mês pelo menos</label>
            <label><input type="radio" name="usoLolo">Mais ou menos uma vez por semana</label>
            <label><input type="radio" name="usoLolo">Todos os dias</label>
         </div>         
         <div class="col-sm-6 form-group">
            <label><u>LSD</u></label>
            <label><input required type="radio" name="usoLSD">Nunca</label>
            <label><input type="radio" name="usoLSD">Nenhuma vez no último ano antes de ficar grávida</label>
            <label><input type="radio" name="usoLSD">Uma vez por mês pelo menos</label>
            <label><input type="radio" name="usoLSD">Mais ou menos uma vez por semana</label>
            <label><input type="radio" name="usoLSD">Todos os dias</label>
         </div>         
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label><u>Ecstasy:</u></label>
            <label><input required type="radio" name="usoEcstasy">Nunca</label>
            <label><input type="radio" name="usoEcstasy">Nenhuma vez no último ano antes de ficar grávida</label>
            <label><input type="radio" name="usoEcstasy">Uma vez por mês pelo menos</label>
            <label><input type="radio" name="usoEcstasy">Mais ou menos uma vez por semana</label>
            <label><input type="radio" name="usoEcstasy">Todos os dias</label>
         </div>         
         <div class="col-sm-6 form-group">
            <label><u>Anfetamina ou remédios para emagrecer</u></label>
            <label><input required type="radio" name="usoAnfetamina">Nunca</label>
            <label><input type="radio" name="usoAnfetamina">Nenhuma vez no último ano antes de ficar grávida</label>
            <label><input type="radio" name="usoAnfetamina">Uma vez por mês pelo menos</label>
            <label><input type="radio" name="usoAnfetamina">Mais ou menos uma vez por semana</label>
            <label><input type="radio" name="usoAnfetamina">Todos os dias</label>
         </div>         
      </div>
      
      
      
      <button type="submit" class="btn btn-success">Salvar</button>
   </form>
   
</div>


      <?php
      parent::exibirPaginacaoQuest(9, $_GET['prontuario']);
   }
}
$e = new entrevistaMae();
$e->display();