<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/especial/Pagina.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classesDao/QuestionarioDao.php';

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
   <h4>Todos os registros</h4>
   <div class="row">
      <div class="table-responsive">
         <table class="table">
            <thead>
               <tr>
                  <td>Nome</td>
                  <td>Idade</td>
                  <td>Ocupação</td>
                  <td>Email</td>
                  <td>Como ficou sabendo?</td>
                  <td>Importancia do tema</td>
                  <td>Interação</td>
                  <td>Atendimento</td>
                  <td>Sugestão de tema</td>
                  <td>Críticas</td>
               </tr>
            </thead>

            <tbody>
            <?php
            $questDao = new QuestionarioDao();
            $registros = $questDao->getAllQuestionario();
            foreach ($registros as $registro){
               echo '<tr>';
               echo '<td>'.$registro['nome'].'</td>';
               echo '<td>'.$registro['idade'].'</td>';
               echo '<td>'.$registro['ocupacao'].'</td>';
               echo '<td>'.$registro['email'].'</td>';
               echo '<td>'.$registro['comoSoube'].'</td>';
               echo '<td>'.$registro['impTema'].'</td>';
               echo '<td>'.$registro['interacao'].'</td>';
               echo '<td>'.$registro['atendimento'].'</td>';
               echo '<td>'.$registro['sugerirTema'].'</td>';
               echo '<td>'.$registro['criticaSugestao'].'</td>';
               echo '</tr>';
            }


            ?>
            </tbody>
         </table>
      </div>
      
   </div>
   
   
</div>


      <?php
   }
}
$e = new entrevistaMae();
$e->display();