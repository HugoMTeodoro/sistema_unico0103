<?php 
        include_once("../../data/db_connection.php");
        if (isset($_POST)) {

            $id = $_POST["prontuarioId"];
            $problema = $_POST["problema"];
            $situacao = $_POST["situacao"];
            $analise = $_POST["analise"];
            $observacao = $_POST["observacao"];
            $crm_medico = $_POST["crm_medico"];
            $paciente_cpf = $_POST["paciente_cpf"];
            $id_consulta = $_POST["id_consulta"];

            $sql = "UPDATE prontuario 
            SET problema = '" . $problema . "', " . 
            "situacao = '" . $situacao . "', " . 
            "analise = '" . $analise . "', " . 
            "observacoes = '" . $observacao . "', " . 
            "crm_medico = '" . $crm_medico . "', " . 
            "paciente_cpf = '" . $paciente_cpf . "', " . 
            "id_consulta = " . $id_consulta . " " . 
            "WHERE prontuario_id = " . $id;


            $resultado = $connection -> query($sql);

            if ($resultado) {
 ?>
                <script>
                    alert ("Prontuário editado com sucesso");
                    window.location = "listMedicalRecord.php";
                </script>

                <?php
            
            }
            else {
               ?>
            <script>
                alert("Erro ao editar o registro");
                window.location = "listMedicalRecord.php";
            </script> 
<?php

    }
}

?>