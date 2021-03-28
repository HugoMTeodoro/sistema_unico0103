<?php
include_once("../../data/db_connection.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <title></title>

  <link rel="stylesheet" href="../styles/main.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Sistema Unico</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>
      </button>
      <?php

if (isset($_SESSION['paciente'])) {
  $id=$_SESSION['paciente'];
}else{
  if (isset($_SESSION['medico'])) {
    $id=$_SESSION['medico'];
}else{
  if (isset($_SESSION['adm'])) {
    $id=$_SESSION['adm'];
  }
}
}
  
      
      if (isset($_SESSION['paciente']) or isset($_SESSION['medico']) or isset($_SESSION['adm'])) {

      $sql3 = "SELECT nome from  usuarios where id_usuario = $id";
      $resultado3 = $connection->query($sql3);
      $row = $resultado3->fetch_assoc();
      $nome=$row["nome"];
      
      ?>
        <a class="navbar-brand" href="#"><?php echo "- Bem vindo, ".$nome."!"; ?></a>
      <?php
      }
      ?>




      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <?php
          if (isset($_SESSION['medico']) or isset($_SESSION['paciente']) or isset($_SESSION['adm'])) {
          ?>
            <li class="nav-item active">
              <a class="nav-link" href="../home/home.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../prescription/listPrescription.php">Receitas</a>
            </li>
          <?php
          }
          ?>

          <?php
          if (isset($_SESSION['adm'])) {

          ?>

            <li class="nav-item">
              <a class="nav-link" href="../doctor/listDoctor.php">Médicos</a>
            </li>
          <?php
          }
          ?>
          <?php
          if (isset($_SESSION['adm']) or isset($_SESSION['medico'])) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="../medicalConsultation/listMedicalConsult.php">Consultas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../patient/listPatient.php">Pacientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../medicalRecord/listMedicalRecord.php">Prontuários</a>
            </li>
          <?php
          }
          ?>

          <?php
          if (isset($_SESSION['medico']) or isset($_SESSION['paciente']) or isset($_SESSION['adm'])) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="../auth/sair.php">Sair</a>
            </li>
          <?php
          }
          ?>

        </ul>
      </div>
    </div>
  </nav>

  <br>
  <br>

</body>

</html>