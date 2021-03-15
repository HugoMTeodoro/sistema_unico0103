


<?php 
        include_once("../../data/db_connection.php");
        if (isset($_POST)) {
            
            $crm = $_POST["txtCRM"];
            $nome = $_POST["txtNome"];
            $idade = $_POST["numIdade"];
            $especialidade_id = $_POST["especialidade_id"];


            $sql = "UPDATE medico 
            SET CRM = '" . $crm . "', nome = '" . $nome . "', idade = ". $idade .", especialidade_id = ". $especialidade_id .  
            " WHERE CRM = '" . $crm . "'";

            $resultado = $connection -> query($sql);

            if ($resultado) {
 ?>
                <script>
            alert ("Médico editado com sucesso");
            window.location = "listDoctor.php";
                </script>

                <?php
            
            }
            else {
               ?>
            <script>
            alert("Erro ao editar o registro");
            window.location = "listDoctor.php";
            </script> 
<?php

    }
}

?>