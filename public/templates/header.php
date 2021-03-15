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
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../home/home.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../doctor/listDoctor.php">Médicos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../medicalConsultation/listMedicalConsult.php">Consultas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../medicalRecord/listMedicalRecord.php">Prontuários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../patient/listPatient.php">Pacientes</a>
          </li>
          <!-- testar se a pessoa está logada para mostrar esse botão-->
          <li class="nav-item">
            <a class="nav-link" href="../auth/sair.php">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <br>
    <br>
    
  </body>

</html>