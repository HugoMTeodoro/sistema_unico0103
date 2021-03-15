<?php

    include_once("../../data/db_connection.php");
    


    $problema = $_POST["problema"];
    $situacao = $_POST["situacao"];
    $analise = $_POST["analise"];
    $observacao = $_POST["observacao"];
    $paciente_cpf = $_POST["paciente_cpf"];
    $crm_medico = $_POST["crm_medico"];
    $id_consulta = $_POST["id_consulta"];

    $sql = "INSERT INTO 
    prontuario (problema, situacao, analise, observacoes,crm_medico ,paciente_cpf, id_consulta)
    VALUES('$problema', '$situacao', '$analise', '$observacao', '$crm_medico', '$paciente_cpf', $id_consulta)";

    $resultado = $connection -> query($sql);
    
    if($resultado)
    {?>
        <script>
            alert("Prontuário cadastrado com sucesso");
            window.location = "listMedicalRecord.php";
        </script>
    <?php
    }
    else
    { ?>
        <script>
            alert("Ocorreu um erro ao cadastrar o prontuário.");
            window.location = "listMedicalRecord.php";
        </script>
    
    <?php
    }

?>