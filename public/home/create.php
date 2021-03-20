<?php include("../templates/header.php")?>

<html lang="pt-br">

    <div class="container">
    <br><br>
    <hr>
    <br><br>
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Cadastre um médico</h4>
                        <p class="card-text">Um médico é a peça fundamental para o funcionamento de um sistema de saúde</p>
                    </div>
                    <div class="card-footer">
                        <a href="../doctor/createDoctor.php" class="btn btn-primary">Cadastre</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Cadastre uma consulta</h4>
                        <p class="card-text">As consultas são os eventos principais dentro de um sistema de saúde</p>
                    </div>
                    <div class="card-footer">
                        <a href="../medicalConsultation/createMedicalConsult.php" class="btn btn-primary">Cadastre</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Cadastre um paciente</h4>
                        <p class="card-text">O bem estar do paciente é o princípio básico de qualquer sistema de saúde.</p>
                    </div>
                    <div class="card-footer">
                        <a href="../patient/createPatient.php" class="btn btn-primary">Cadastre</a>
                    </div>
                </div>
            </div>
        </div>
    <hr>
    </div>

</html>