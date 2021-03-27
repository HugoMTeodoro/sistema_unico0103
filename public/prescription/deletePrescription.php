
<?php 
        include_once("../../data/db_connection.php");
        if (isset ($_GET["id"])) {
            $sql = "DELETE FROM receita WHERE id = " . $_GET["id"];

            if ($connection -> query($sql) === TRUE) {
 ?>
                <script>
            alert ("Receita excluída com sucesso");
            window.location = "listPrescription.php";
                </script>

                <?php
            

            }
        else {
               ?>
            <script>
            alert("Erro ao excluir o registro");
            window.location = "listPrescription.php";
            </script> 
<?php

    }
}

?>