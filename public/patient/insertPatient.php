<?php

    include_once("../../data/db_connection.php");

    $cpf = $_POST["txtCPF"];
    $nome = $_POST["txtNome"];
    $idade = $_POST["numIdade"];
    $contato = $_POST["txtContato"];
    $rua = $_POST["txtRua"];
    $bairro = $_POST["txtBairro"];
    $numero = $_POST["numCasa"];

    $sql = "INSERT INTO 
    paciente (CPF, nome, idade, contato, rua, bairro, numero)
    VALUES('$cpf', '$nome', '$idade', '$contato', '$rua', '$bairro', $numero)";

    $resultado = $connection -> query($sql);

    if($resultado)
    {?>
        <script>
            alert("Paciente cadastrado com sucesso");
            window.location = "listPatient.php";
        </script>
    <?php
    }
    else
    { ?>
        <script>
            alert("Ocorreu um erro ao cadastrar o paciente.");
            window.location = "listPatient.php";
        </script>
    
    <?php
    }

?>