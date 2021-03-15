<?php include("../auth/valida.php")?>

<?php 
        include_once("../../data/db_connection.php");
        if (isset ($_GET["cpf"])) {
            $sql = "DELETE FROM paciente WHERE CPF = " . $_GET["cpf"];

            if ($connection -> query($sql) === TRUE) {
 ?>
                <script>
            alert ("Paciente excluído(a) com sucesso");
            window.location = "listPatient.php";
                </script>

                <?php
            

            }
        else {
               ?>
            <script>
            alert("Erro ao excluir o registro");
            window.location = "listPatient.php";
            </script> 
<?php

    }
}

?>