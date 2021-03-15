<?php
session_start();
if (isset($_SESSION['medico']) or isset($_SESSION['paciente']) or isset($_SESSION['adm'])) {
    //echo "voce eh um ADM!"; 
    } else {
    ?>
        <script>
            
            window.location = "../auth/index.php";
        </script>
<?php
    }
?>