<?php include("../templates/header.php") ?>
<html>

<head>
   <link rel="stylesheet" href="../styles/login.css">
</head>

<body>
   <div class="sidenav">
      <div class="login-main-text">
         <h2>Sistema Unico<br></h2>
         <p>Faça o login ou registre-se por aqui.<br></p>
         <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. At et neque aliquam velit quis explicabo suscipit enim dolore, dolorum excepturi beatae error est blanditiis placeat saepe omnis delectus similique perspiciatis?
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic necessitatibus aspernatur facere atque assumenda pariatur? Voluptates ex laboriosam ratione sequi fugit maiores, magni ipsum fugiat numquam ducimus quia ea blanditiis?s
         </p>
      </div>
   </div>
   <div class="main">
      <div class="col-md-6 col-sm-12">
         <div class="login-form">
            <form class="form-signin" method="POST" action="login.php">
               <div class="form-group">
                  <label>Usuário</label>
                  <input name="user" type="text" class="form-control" placeholder="Username">
               </div>
               <div class="form-group">
                  <label>Senha</label>
                  <input name="senha" type="password" class="form-control" placeholder="Password">
               </div>
               <button type="submit" class="btn btn-success">Login</button>
               <button type="submit" class="btn btn-warning">Register</button>
            </form>            
         </div>
      </div>
   </div>
</body>

</html>