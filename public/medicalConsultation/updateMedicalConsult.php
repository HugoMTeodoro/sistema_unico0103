<?php include("../auth/validaMedico.php")?>

<?php 
        include_once("../../data/db_connection.php");
        if (isset($_POST)) {

            $id = $_POST["consultaId"];
            $data = $_POST["date"];
            $crm_medico = $_POST["crm_medico"];
            $paciente_cpf = $_POST["paciente_cpf"];

            $sql = "UPDATE consulta 
            SET data_consulta = '" . $data . "', " . 
            "paciente_cpf = '" . $paciente_cpf . "', " . 
            "crm_medico = '" . $crm_medico . "' " . 
            "WHERE consulta_id = " . $id;

            $resultado = $connection -> query($sql);

            if ($resultado) {
 ?>
                <script>
                    alert ("Consulta editada com sucesso");
                    window.location = "listMedicalConsult.php";
                </script>

                <?php
            
            }
            else {
               ?>
            <script>
                alert("Erro ao editar o registro");
                window.location = "listMedicalConsult.php";
            </script> 
<?php

    }
}

?>