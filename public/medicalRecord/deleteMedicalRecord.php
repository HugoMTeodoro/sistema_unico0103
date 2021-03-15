<?php 
        include_once("../../data/db_connection.php");
        if (isset ($_GET["id"])) {
            $sql = "DELETE FROM prontuario WHERE prontuario_id = " . $_GET["id"];

            if ($connection -> query($sql) === TRUE) {
 ?>
                <script>
            alert ("Prontuário excluído com sucesso");
            window.location = "listMedicalRecord.php";
                </script>

                <?php
            

            }
        else {
               ?>
            <script>
            alert("Erro ao excluir o registro");
            window.location = "listMedicalRecord.php";
            </script> 
<?php

    }
}

?>