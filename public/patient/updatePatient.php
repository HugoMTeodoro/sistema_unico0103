<?php 
        include_once("../../data/db_connection.php");
        if (isset($_POST)) {
            
            $cpf = $_POST["txtCPF"];
            $nome = $_POST["txtNome"];
            $idade = $_POST["numIdade"];
            $contato = $_POST["txtContato"];
            $rua = $_POST["txtRua"];
            $bairro = $_POST["txtBairro"];
            $numero = $_POST["numero"];


            $sql = "UPDATE paciente 
            SET CPF = '" . $cpf . "', nome = '" . $nome . "', idade = ". $idade .", contato = '". $contato .  
            "', rua = '" . $rua . "', bairro = '" . $bairro ."', numero = " . $numero .
            " WHERE CPF = '" . $cpf . "'";

            $resultado = $connection -> query($sql);

            if ($resultado) {
 ?>
                <script>
            alert ("Paciente editado com sucesso");
            window.location = "listPatient.php";
                </script>

                <?php
            
            }
            else {
               ?>
            <script>
            alert("Erro ao editar o registro");
            window.location = "listPatient.php";
            </script> 
<?php

    }
}

?>