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
             atualizaMunicipios1();
             
            $("#uf").on('change', function (){
               atualizaMunicipios();
            });
            
            function atualizaMunicipios(){
               $.ajax({
                  url: '/controll/municipio/getMunicipioByUf.php',
                  type: 'post',
                  data:{
                     uf: $("#uf").val()
                  },
                  success: function (resposta){
                    $("#municipio").empty();
                    $("#municipio").append(resposta);
                  }
               });
            }
            
            $("#uf1").on('change', function (){
               atualizaMunicipios1();
            });
            
            function atualizaMunicipios1(){
               $.ajax({
                  url: '/controll/municipio/getMunicipioByUf.php',
                  type: 'post',
                  data:{
                     uf: $("#uf1").val()
                  },
                  success: function (resposta){
                    $("#municipio1").empty();
                    $("#municipio1").append(resposta);
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
   <h2 style="text-align: center">3 - Entrevista com a mãe</h2>
   <h3>3.1 - Identificação e dados sociodemográficos</h3>
   <form>
      <div class="row">
         <input style="display: none" value="<?php echo $_GET['prontuario']; ?>" name="prontuario">
         <div class="col-sm-6 form-group">
            <label>Nome</label>
            <input required class="form-control" name="nome">
         </div>
         <div class="col-sm-6 form-group">
            <label>Data de nascimento</label>
            <input type="date" class="form-control" name="dataNascimento">
         </div>
      </div>

      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Raça/Cor</label>
            <input class="form-control" name="racaCor">
         </div>
         <div class="col-sm-6 form-group">
            <label>Escolaridade (considerar maior nível completo)</label>
            <select class="form-control" name="escolaridade">
               <option>Sem escolaridade</option>
               <option>Fundamental I</option>
               <option>Fundamental II</option>
               <option>Médio</option>
               <option>Superior</option>
               <option>Iguinorado</option>
            </select>
         </div>
      </div>

      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Estado civil</label>
            <select class="form-control" name="estadoCivil">
               <option>Solteira</option>
               <option>Casada</option>
               <option>Viúva</option>
               <option>Separada/Divorciada</option>
               <option>União estável</option>
               <option>Iguinorado</option>
            </select>
         </div>
         <div class="col-sm-6 form-group">
            <label>Ocupação</label>
            <input class="form-control" name="ocupacao">
         </div>
      </div>

      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Quantas pessoas moram na sua casa?</label>
            <input class="form-control" type="number" name="pessoasNaCasa">
         </div>
         <div class="col-sm-6 form-group">
            <label>Renda familiar mensal (reais)</label>
            <input type="number" class="form-control" name="rendaFamiliar">
         </div>
      </div>

      <h4>Endereço atual</h4>

      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Estado</label>
            <select class="form-control" name="uf" id="uf">
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
            <select  class="form-control" name="municipio" id="municipio">

            </select>
         </div>
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Logradouro</label>
            <input name="logradouro" class="form-control">
         </div>
         <div class="col-sm-6 form-group">
            <label>Número</label>
            <input type="number" name="numero" class="form-control">
         </div>
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Bairro</label>
            <input name="bairro" class="form-control">
         </div>
         <div class="col-sm-6 form-group">
            <label>Telefone</label>
            <input type="tel" name="telefone" class="form-control">
         </div>
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Morou em outro endereço durante a gestação?</label>
            <label><input required type="radio" name="outroEndereco" value="0">Não</label>
            <label><input required type="radio" name="outroEndereco" value="1">Sim</label>            
         </div>
      </div>
      
      <h4>Outro endereço</h4>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Estado</label>
            <select class="form-control" type="number" name="uf1" id="uf1">
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
            <select  class="form-control" name="municipio1" id="municipio1">

            </select>
         </div>
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Logradouro</label>
            <input name="logradouro1" class="form-control">
         </div>
         <div class="col-sm-6 form-group">
            <label>Número</label>
            <input type="number" name="numero1" class="form-control">
         </div>
      </div>
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Bairro</label>
            <input name="bairro1" class="form-control">
         </div>
      </div>
      
      
      <div class="row">
         <div class="col-sm-6 form-group">
            <label>Viajou durante a gestação?</label>
            <label><input required type="radio" name="viajemGestacao" value="0">Não</label>
            <label><input required type="radio" name="viajemGestacao" value="1">Sim</label>
         </div>
      </div>
      
      <div class="row">
         <div class="col-xs-6 form-group">
            <label>Data da ida</label>
            <input type="date" name="dataIda" class="form-control">
         </div>
         <div class="col-xs-6 form-group">
            <label>Data da volta</label>
            <input type="date" name="dataVolta" class="form-control">
         </div>
      </div>
      
      <div class="row">
         <div class="col-xs-4 form-group">
            <label>País</label>
            <input name="paisIda" class="form-control">
         </div>
         <div class="col-xs-4 form-group">
            <label>Estado</label>
            <input name="estadoIda" class="form-control">
         </div>
         <div class="col-xs-4 form-group">
            <label>Município</label>
            <input name="municipioIda" class="form-control">
         </div>
      </div>
      
      <button class="btn btn-success">Salvar</button>
   </form>
</div>


      <?php
      parent::exibirPaginacaoQuest(6, $_GET['prontuario']);
   }
}
$e = new entrevistaMae();
$e->display();