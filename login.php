<!DOCTYPE html>

<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="/bootstrap/css/meucss.css">
      <script src="/bootstrap/js/jquery-3.1.1.min.js"></script>
      <script src="/bootstrap/js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="container">
         <form name="nome" action="controll/logicaLogin.php" method="post">
            <div class="row">
               <h1 style="text-align: center">Faça seu login</h1>
               <div class="col-sm-6 form-group">
                  <label>Usuário</label>
                  <input class="form-control" type="text" name="usuario" />
               </div>
               
               <div class="col-sm-6 form-group">
                  <label>Senha</label>
                  <input class="form-control" type="password" name="senha" />
               </div>
             </div>
            
            <input class="btn btn-block btn-primary" type="submit" value="Fazer login" />
         </form>
      </div>
   </body>
</html>
