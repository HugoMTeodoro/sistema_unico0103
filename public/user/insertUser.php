<?php include("../auth/validarADM.php")?>



<?php

    include_once("../../data/db_connection.php");

    $usuario = $_POST["txtUsuario"];
    $nome = $_POST["txtNome"];
    $senha = $_POST["txtSenha"];
    $prioridade = $_POST["numPrioridade"];

    $sql = "INSERT INTO 
    usuarios (user, senha, prioridade, nome)
    VALUES('$usuario', '$senha', '$prioridade', '$nome')";

    $resultado = $connection -> query($sql);

    if($resultado)
    {?>
        <script>
            alert("Usuário cadastrado com sucesso");
           // window.location = "listDoctor.php";
        </script>
    <?php
    }
    else
    { ?>
        <script>
            alert("Ocorreu um erro ao cadastrar o usuário.");
            //window.location = "listDoctor.php";
        </script>
    
    <?php
    }

?>