<?php include("../auth/validarADM.php") ?>



<?php

include_once("../../data/db_connection.php");

$crm = $_POST["txtCRM"];
$nome = $_POST["txtNome"];
$idade = $_POST["numIdade"];
$especialidade_id = $_POST["especialidade_id"];
$login = $_POST["login"];
$senha = $_POST["senha"];
$senha=md5($senha);
$pieces = explode(" ", $nome);
$firstname = $pieces[0];

$sql2 = "INSERT INTO 
    usuarios (prioridade, user, senha, nome)
    VALUES(1, '$login', '$senha','$firstname')";

$resultado2 = $connection->query($sql2);
if ($resultado2) {
    $sql3 = "SELECT MAX(id_usuario) as max_id FROM usuarios";
    $resultado3 = $connection->query($sql3);
    $row = $resultado3->fetch_assoc();
    $last_id = $row["max_id"];
    $sql = "INSERT INTO 
    medico (CRM, nome, idade, especialidade_id,id_usuario)
    VALUES('$crm', '$nome', '$idade', '$especialidade_id','$last_id')";
    $resultado = $connection->query($sql);
}




if ($resultado && $resultado2 ){ ?>
    <script>
        alert("Médico cadastrada com sucesso");
        window.location = "listDoctor.php";
    </script>
<?php
} else { ?>
    <script>
        alert("Ocorreu um erro ao cadastrar o médico.");
        window.location = "listDoctor.php";
    </script>

<?php
}

?>