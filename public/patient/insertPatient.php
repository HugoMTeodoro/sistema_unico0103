<?php

    include_once("../../data/db_connection.php");

    $cpf = $_POST["txtCPF"];
    $nome = $_POST["txtNome"];
    $idade = $_POST["numIdade"];
    $contato = $_POST["txtContato"];
    $rua = $_POST["txtRua"];
    $bairro = $_POST["txtBairro"];
    $numero = $_POST["numCasa"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $senha = md5($senha);
    $pieces = explode(" ", $nome);
    $firstname=$pieces[0];

    $sql2="INSERT INTO 
    usuarios (prioridade, user, senha, nome)
    VALUES(2, '$login', '$senha','$firstname')";
    
    $resultado2= $connection -> query($sql2);
    if($resultado2){
    $sql3 = "SELECT MAX(id_usuario) as max_id FROM usuarios";
    $resultado3 = $connection->query($sql3);
    $row = $resultado3->fetch_assoc();
    $last_id=$row["max_id"];

    
    $sql = "INSERT INTO 
    paciente (CPF, nome, idade, contato, rua, bairro, numero, id_usuario)
    VALUES('$cpf', '$nome', '$idade', '$contato', '$rua', '$bairro', $numero, $last_id)";
    $resultado = $connection -> query($sql);
    }
    

    if($resultado && $resultado2)
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