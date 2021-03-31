<?php include("../auth/validar.php") ?>
<?php include("../auth/validaMedico.php") ?>


<?php include("../templates/header.php");
include_once("../../data/db_connection.php");
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de consulta</title>
</head>

<body>
    <br>
    <br>
    <br>

    <div class="form">
        <form action="insertMedicalConsult.php" method="POST" style="margin-left: 100px; margin-right: 100px;">
            <h3>Cadastro de consulta</h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Data</span>
                </div>
                <input type="datetime-local" name="date" class="form-control" id="date" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Paciente</span>
                </div>
                <select class="form-select" name="paciente_cpf" id="paciente_cpf">
                    <option value="-1" selected>Selecione um paciente</option>
                    <?php

                    $sqlQuery = "SELECT * FROM paciente ORDER BY nome";

                    $pacientes = $connection->query($sqlQuery);

                    if ($pacientes->num_rows > 0) {

                        while ($row = $pacientes->fetch_assoc()) {
                    ?>

                            <option value="<?php echo $row["CPF"] ?>">
                                <?php echo $row["nome"] . " - CPF: " . $row["CPF"] ?>
                            </option>

                    <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Médico</span>
                </div>
                <select class="form-select" name="crm_medico" id="crm_medico">
                    <option value="-1" selected>Selecione um médico disponível</option>
                    <?php

                    if (isset($_SESSION['adm'])) {
                        $sqlQuery = "SELECT * FROM medico";
                    } else {
                        $sqlQuery = "SELECT * FROM medico where id_usuario='$id_usuario'";
                    }


                    $medicos = $connection->query($sqlQuery);

                    if ($medicos->num_rows > 0) {

                        while ($row = $medicos->fetch_assoc()) {
                    ?>

                            <option value="<?php echo $row["CRM"] ?>">
                                <?php echo $row["nome"] . " - CRM: " . $row["CRM"] ?>
                            </option>

                    <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="buttons">
                <input type="submit" class="btn btn-success" value="Cadastrar">
                <input type="reset" class="btn btn-danger" value="Cancelar">
            </div>

        </form>
    </div>


</body>

</html>