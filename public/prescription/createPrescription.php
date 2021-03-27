<?php include("../auth/validar.php")?>

<?php include("../templates/header.php");
      include_once("../../data/db_connection.php");
        if(isset($_GET))
        {
            $cpf = $_GET["cpf"];
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de receita</title>
</head>
<body>
    <br>
    <br>
    <br>
    
    <div class="form">
        <form action="insertPrescription.php" method="POST" style="margin-left: 100px; margin-right: 100px;">
            <h3>Cadastro de receita</h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Medicamento</span>
                </div>
                <input type="text" name="txtMedicamento" class="form-control" id="txtMedicamento" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Posologia</span>
                </div>
                <input type="text" name="txtPosologia" class="form-control" id="txtPosologia" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Período em dias</span>
                </div>
                <input type="number" name="numPeriodo" class="form-control" id="numPeriodo" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Paciente</span>
                </div>
                <select class="form-select" name="paciente_cpf" id="paciente_cpf">
                    <option value="-1" selected>Selecione um paciente</option>
                    <?php

                        $sqlQuery = "SELECT * FROM paciente ORDER BY nome";

                        $pacientes = $connection -> query($sqlQuery);

                        if($pacientes -> num_rows > 0)
                        {

                            while($row = $pacientes -> fetch_assoc())
                            {
                                if($row["CPF"] === $cpf)
                                {

                    ?>
                    
                    
                                    <option value="<?php echo $row["CPF"]?>" selected>
                                        <?php echo $row["nome"] . " - CPF: " . $row["CPF"]?>
                                    </option>
                    
                    <?php
                                }
                                else
                                {
                    ?>
                                    <option value="<?php echo $row["CPF"]?>" >
                                        <?php echo $row["nome"] . " - CPF: " . $row["CPF"]?>
                                    </option>
                    <?php
                                }
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

                        $sqlQuery = "SELECT * FROM medico ORDER BY nome";

                        $medicos = $connection -> query($sqlQuery);

                        if($medicos -> num_rows > 0)
                        {

                            while($row = $medicos -> fetch_assoc()){
                    ?>
                    
                    <option value="<?php echo $row["CRM"]?>">
                        <?php echo $row["nome"] . " - CRM: " . $row["CRM"]?>
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
<?php
    }
?>