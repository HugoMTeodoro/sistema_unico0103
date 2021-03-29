<?php
if ( session_status() !== PHP_SESSION_ACTIVE ){
    session_start();
}

if(isset($_SESSION['medico'])){
    $id_usuario=$_SESSION['medico'];
}else{
    if(isset($_SESSION['paciente'])){
        $id_usuario=$_SESSION['paciente'];
    }else{
        if(isset($_SESSION['adm'])){
            $id_usuario=$_SESSION['adm'];
        }else{
            ?>
        <script>
            
            window.location = "../auth/index.php";
        </script>
        <?php
        }
    }
}
?>