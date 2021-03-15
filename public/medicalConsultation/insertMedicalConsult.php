<?php include("../auth/validaMedico.php")?>


<?php

    include_once("../../data/db_connection.php");

    $data = $_POST["date"];
    $paciente_cpf = $_POST["paciente_cpf"];
    $crm_medico = $_POST["crm_medico"];

    $sql = "INSERT INTO 
    consulta (data_consulta, paciente_cpf, crm_medico)
    VALUES('$data', '$paciente_cpf', '$crm_medico')";

    $resultado = $connection -> query($sql);

    if($resultado)
    {?>
        <script>
            alert("Consulta cadastrada com sucesso");
            window.location = "listMedicalConsult.php";
        </script>
    <?php
    }
    else
    { ?>
        <script>
            alert("Ocorreu um erro ao cadastrar a consulta.");
            window.location = "listMedicalConsult.php";
        </script>
    
    <?php
    }

?>