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
   <h4>3.3 - Histórico obstétrico/ginecológico</h4>
   <form>
      <div class="row">
         <input style="display: none" name="prontuario" value="<?php echo $_GET['prontuario']; ?>">
         <div class="col-sm-6 form-group">
            <label>Primeira gestação?</label>
            <label><input type="radio" value="0" name="primGestacao">Não</label>
            <label><input type="radio" value="1" name="primGestacao">Sim (pular para dados da gestação)</label>
         </div>
         
      </div>
      
      <div class="row">
         <div class="col-sm-4 form-group">
            <label>Quantas vezes você já engravidou (considerar abortos e natimortos?</label>
            <input type="number" class="form-control" name="quantGravidez">
         </div>
         <div class="col-sm-4 form-group">
            <label>Quantos filhos nasceram vivos?</label>
            <input type="number" class="form-control" name="quantVivos">
         </div>
         <div class="col-sm-4 form-group">
            <label>Quantos filhos nasceram mortos?</label>
            <input type="number" class="form-control" name="quantMortos">
         </div>
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Já teve algúm aborto?</label>
            <label><input type="radio" value="0" name="teveAborto">Não</label>
            <label><input type="radio" value="1" name="teveAborto">Sim</label>
            <input name="quantAbortos" type="number" class="form-control" placeholder="Se sim, quantos?">
         </div>
         <div class="col-sm-6 form-group">
            <label>Algum destes nasceu com alguma malformação congênita?</label>
            <label><input type="radio" value="0" name="malformacao">Não</label>
            <label><input type="radio" value="1" name="malformacao">Sim</label>
            <input name="descMalformacao" type="number" class="form-control" placeholder="Se sim, quail(is)?">
         </div>
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Qual a data de nascimento do seu último filho?</label>
            <input name="dataNascimento" type="date" class="form-control">
         </div>
      </div>
      
      <button type="submit" class="btn btn-success">Salvar</button>
   </form>
   
   <h4>3.4 - Durante a gestação</h4>
   
   <form>
      <div class="row">
         <input style="display: none" name="prontuario" value="<?php echo $_GET['prontuario']; ?>">
         <div class="col-sm-6 form-group">
            <label>Teve contato com pesticidas?</label>
            <label><input type="radio" value="0" name="contatoPesticida">Não</label>
            <label><input type="radio" value="1" name="contatoPesticida">Sim</label>
            <input name="descPesticidas" class="form-control" placeholder="Se sim, especifique">
         </div> 
         
         <div class="col-sm-6 form-group">
            <label>Teve contato com agrotóxicos?</label>
            <label><input type="radio" value="0" name="contatoAgrotoxico">Não</label>
            <label><input type="radio" value="1" name="contatoAgrotoxico">Sim</label>
            <input name="descAgrotoxicos" class="form-control" placeholder="Se sim, especifique">
         </div> 
      </div>

      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Realizou algum exame de raio-X?</label>
            <label><input type="radio" value="0" name="exameRX">Não</label>
            <label><input type="radio" value="1" name="exameRX">Sim</label>
            <select name="periodoExameRX" class="form-control">
               <option>1º trimestre</option>
               <option>2º trimestre</option>
               <option>3º trimestre</option>
            </select>
         </div> 
         
         <div class="col-sm-6 form-group">
            <label>Fez uso de ácido fólico?</label>
            <label><input type="radio" value="0" name="usoAcidoFolico">Não</label>
            <label><input type="radio" value="1" name="usoAcidoFolico">Sim</label>
            <label>Se sim, qual a data de inicio do tratamento?</label>
            <input type="date" name="dataUsoAcidoFolico" class="form-control">
         </div> 
      </div>
      
      <div class="row">         
         <div class="col-sm-6 form-group">
            <label>Fez uso de ferro?</label>
            <label><input type="radio" value="0" name="usoFerro">Não</label>
            <label><input type="radio" value="1" name="usoFerro">Sim</label>
            <label>Se sim, qual a data de inicio do tratamento?</label>
            <input type="date" name="dataUsoFerro" class="form-control">
         </div> 
         
         <div class="col-sm-6 form-group">
            <label>Outros medicamentos?</label>
            <label><input type="radio" value="0" name="usoOutrosMed">Não</label>
            <label><input type="radio" value="1" name="usoOutrosMed">Sim</label>
            <input name="descUsoOutrosMed" class="form-control" placeholder="Especifique os outros medicamentos">
            <label>Data de início do tratamento</label>
            <input type="date" name="dataUsoFerro" class="form-control">
         </div> 
      </div>
      
      <div class="row">         
         <div class="col-sm-6 form-group">
            <label>Você teve manchas vermelhas no corpo durante a gestação?</label>
            <label><input type="radio" value="0" name="manchaVermelha">Não</label>
            <label><input type="radio" value="1" name="manchaVermelha">Sim</label>
            <label>Se sim, preencher a tabela abaixo</label>
         </div> 
         
      </div>
      
      <button type="submit" class="btn btn-success">Salvar</button>
   </form>
</div>


      <?php
      parent::exibirPaginacaoQuest(8, $_GET['prontuario']);
   }
}
$e = new entrevistaMae();
$e->display();