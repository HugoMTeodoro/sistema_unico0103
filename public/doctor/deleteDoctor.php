



<?php 
        include_once("../../data/db_connection.php");
        if (isset ($_GET["crm"])) {
            $sql = "DELETE FROM medico WHERE CRM = " . $_GET["crm"];

            if ($connection -> query($sql) === TRUE) {
 ?>
                <script>
            alert ("Médico excluído com sucesso");
            window.location = "listDoctor.php";
                </script>

                <?php
            

            }
        else {
               ?>
            <script>
            alert("Erro ao excluir o registro");
            window.location = "listDoctor.php";
            </script> 
<?php

    }
}

?>