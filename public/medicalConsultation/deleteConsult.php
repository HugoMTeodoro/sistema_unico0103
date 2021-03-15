<?php 
        include_once("../../data/db_connection.php");
        if (isset ($_GET["id"])) {
            $sql = "DELETE FROM consulta WHERE consulta_id = " . $_GET["id"];

            if ($connection -> query($sql) === TRUE) {
 ?>
                <script>
            alert ("Consulta excluída com sucesso");
            window.location = "listMedicalConsult.php";
                </script>

                <?php
            

            }
        else {
               ?>
            <script>
            alert("Erro ao excluir o registro");
            window.location = "listMedicalConsult.php";
            </script> 
<?php

    }
}

?>