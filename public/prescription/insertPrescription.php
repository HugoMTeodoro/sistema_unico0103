<?php include("../auth/validar.php")?>
<?php

    include_once("../../data/db_connection.php");

    $cpf_paciente = $_POST["paciente_cpf"];
    $crm_medico = $_POST["crm_medico"];
    $periodo = $_POST["numPeriodo"];
    $posologia = $_POST["txtPosologia"];
    $medicamento = $_POST["txtMedicamento"];

    $sql2 = "select id_usuario from paciente where cpf = '$cpf_paciente'";
    $resultado2 = $connection->query($sql2);
    $row = $resultado2->fetch_assoc();
    $id=$row["id_usuario"];

    $sql = "INSERT INTO 
    receita (crm_medico, cpf_paciente, periodo, posologia, medicamento,id_usuario)
    VALUES('$crm_medico', '$cpf_paciente', '$periodo', '$posologia', '$medicamento',$id)";

    

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