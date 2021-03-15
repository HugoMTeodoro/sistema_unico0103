<?php
session_start();
if (isset($_SESSION['medico']) or isset($_SESSION['paciente'])) {
    //echo "voce eh um ADM!";
?>
    <script>
        alert("Voce nao tem acesso a essa area");
        window.location = "../home/home.php";
    </script>
    <?php
} else {
    if (isset($_SESSION['adm'])) {
    } else {
    ?>
        <script>
            
            window.location = "../auth/index.php";
        </script>
<?php
    }
}
?>