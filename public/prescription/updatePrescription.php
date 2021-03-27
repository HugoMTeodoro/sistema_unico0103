
<?php

    include_once("../../data/db_connection.php");

    if(isset($_POST))
    {
        $id = $_POST["id"];
        $cpf_paciente = $_POST["paciente_cpf"];
        $crm_medico = $_POST["crm_medico"];
        $periodo = $_POST["numPeriodo"];
        $posologia = $_POST["txtPosologia"];
        $medicamento = $_POST["txtMedicamento"];

        $sql = "UPDATE receita
        SET crm_medico = '". $crm_medico ."', cpf_paciente = '" . $cpf_paciente . "', 
        periodo = " . $periodo . ", posologia = '" . $posologia . "', medicamento = '" . $medicamento . "' 
        WHERE id = " . $id;

        $resultado = $connection -> query($sql);

        if($resultado)
        {?>
            <script>
                alert("Receita editada com sucesso");
                window.location = "listPrescription.php";
            </script>
        <?php
        }
        else
        { ?>
            <script>
                alert("Ocorreu um erro ao editar a receita.");
                window.location = "listPrescription.php";
            </script>

        <?php
        }

    }
?>