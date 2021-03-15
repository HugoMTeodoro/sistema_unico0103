



<?php

    include_once("../../data/db_connection.php");

    $crm = $_POST["txtCRM"];
    $nome = $_POST["txtNome"];
    $idade = $_POST["numIdade"];
    $especialidade_id = $_POST["especialidade_id"];

    $sql = "INSERT INTO 
    medico (CRM, nome, idade, especialidade_id)
    VALUES('$crm', '$nome', '$idade', '$especialidade_id')";

    $resultado = $connection -> query($sql);

    if($resultado)
    {?>
        <script>
            alert("Médico cadastrada com sucesso");
            window.location = "listDoctor.php";
        </script>
    <?php
    }
    else
    { ?>
        <script>
            alert("Ocorreu um erro ao cadastrar o médico.");
            window.location = "listDoctor.php";
        </script>
    
    <?php
    }

?>