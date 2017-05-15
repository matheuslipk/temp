<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/ProntuarioDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/TipoHospitalDao.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/Pagina.php';

class Index extends Pagina{
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
                  QUESTIONÁRIO DE INVESTIGAÇÃO DE CASOS SUSPEITOS DE MICROCEFALIA
                  </strong>
               </h1>
            </div>
         </div>
         <form action="/controll/0.0-prontuario/criarProntuario.php">
            <div class="row">
               <div class="form-group col-xs-12">
                  <label>Prontuário</label>
                  <input name="prontuario" type="number" class="form-control">
               </div>
            </div>
            <div>
               <button class="btn btn-primary" type="submit">Criar</button>
            </div>
         </form>
         
         <div class="row">
            <div class="col-sm-6 form-group">
               <label>Questionários não terminados</label>
               <input type="number" class="form-control"><br>
               <table class="table table-condensed table-bordered" border="1">
                  <thead>
                     <tr>
                        <th>Prontuário</th>
                        <th>Criado por</th>
                        <th>Data criação</th>
                     </tr>
                  </thead>
                  <tbody style="font-size: ">
                     <?php
                        $prontuarioDao = new ProntuarioDao();
                        $prontuarios = $prontuarioDao->getAllProntuarios();
                        
                        foreach ($prontuarios as $prontuario){
                           echo "<tr></tr>";
                           echo "<td><a class='btn btn-default' href='/view/1.0-servicoSaude.php?prontuario=".$prontuario['idProntuario']."'>{$prontuario['idProntuario']}</a></td>";
                           echo "<td>".$prontuario['nome']."</td>";
                           echo "<td>".$prontuario['dataCriacao']."</td>";
                           echo "<tr></tr>";
                        }       
                     ?>                     
                  </tbody>
                  
               </table>
            </div>
            
            <div class="col-sm-6 form-group">
               <label>Questionários concluídos</label>
               <input type="number" class="form-control"><br>
               <table class="table table-condensed table-bordered" border="1">
                  <thead>
                     <tr>
                        <th>Prontuário</th>
                        <th>Criado por</th>
                        <th>Data criação</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php                        
//                        foreach ($prontuarios as $prontuario){
//                           echo "<tr></tr>";
//                           echo "<td><a class='btn btn-default' href='/view/1.0-servicoSaude.php?prontuario=".$prontuario['idProntuario']."'>{$prontuario['idProntuario']}</a></td>";
//                           echo "<td>".$prontuario['nome']."</td>";
//                           echo "<td>".$prontuario['dataCriacao']."</td>";
//                           echo "<tr></tr>";
//                        }       
                     ?>   
                  </tbody>
                  
               </table>
            </div>
         </div>
        
                  
      </div>
      <?php
   }
   
}

$i = new Index();
$i->display();
