
<?php

include_once("../../data/db_connection.php");


if ((isset($_POST['user'])) && (isset($_POST['senha']))) {

    $user = $_POST['user'];
    $senha = $_POST['senha'];
    $senha=md5($senha);
    $sql = "select * from usuarios where user = '$user' and senha = '$senha'";
    $resultado = $connection->query($sql);
    $num = mysqli_num_rows($resultado);
    if ($num == 1) {
        while ($percorrer = $resultado->fetch_assoc()) {

            $adm = $percorrer['prioridade'];
            $nome = $percorrer['id_usuario'];

            session_start();

            if ($adm == 0) {
                $_SESSION['adm']=$nome;
                //echo "voce eh adm";
            }

            if ($adm == 1) {
                $_SESSION['medico']=$nome;
                //echo "voce eh medico";
            }

            if ($adm == 2) {
                $_SESSION['paciente']=$nome;
                //echo "voce eh paciente";
            }

?>
            <script>
               window.location = "../home/home.php";
            </script>
        <?php

        }
    } else {

        ?>
        <script>
            alert("Credenciais incorretas");
           window.location = "index.php";
        </script>
<?php

    }
}
