
<?php

    include_once("../../data/db_connection.php");

    $cpf_paciente = $_POST["paciente_cpf"];
    $crm_medico = $_POST["crm_medico"];
    $periodo = $_POST["numPeriodo"];
    $posologia = $_POST["txtPosologia"];
    $medicamento = $_POST["txtMedicamento"];

    $sql = "INSERT INTO 
    receita (crm_medico, cpf_paciente, periodo, posologia, medicamento)
    VALUES('$crm_medico', '$cpf_paciente', '$periodo', '$posologia', '$medicamento')";

    $resultado = $connection -> query($sql);

    if($resultado)
    {?>
        <script>
            alert("Receita cadastrada com sucesso");
            window.location = "listPrescription.php";
        </script>
    <?php
    }
    else
    { ?>
        <script>
            alert("Ocorreu um erro ao cadastrar a receita.");
            window.location = "listPrescription.php";
        </script>
    
    <?php
    }

?>