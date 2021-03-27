
<?php
    include("../templates/header.php");
    include_once("../../data/db_connection.php");
    include("../templates/header.php")

?>

<?php
    if (isset ($_GET["id"])) {
        $id = $_GET["id"];
        
        $sql = "SELECT * FROM receita WHERE id = '". $id . "'";
        //echo $sql;
        $resultado = $connection->query($sql);
        $receita = $resultado->fetch_assoc();
        
        
        //TODO

?>


<div class="form">
        <form action="updatePrescription.php" method="POST" style="margin-left: 100px; margin-right: 100px;">
            <input type="hidden" value="<?php echo $id?>" name="id" id="id">
            <h3>Editar</h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Medicamento</span>
                </div>
                <input type="text" name="txtMedicamento" class="form-control" id="txtMedicamento" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $receita["medicamento"]?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Posologia</span>
                </div>
                <input type="text" name="txtPosologia" class="form-control" id="txtPosologia" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $receita["posologia"]?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Período em dias</span>
                </div>
                <input type="number" name="numPeriodo" class="form-control" id="numPeriodo" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $receita["periodo"]?>">
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
                                if($receita["cpf_paciente"] === $row["CPF"])
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
                                    <option value="<?php echo $row["CPF"]?>">
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

                            while($row = $medicos -> fetch_assoc())
                            {
                                if($receita["crm_medico"] === $row["CRM"])
                                {
                    ?>
                                    <option value="<?php echo $row["CRM"]?>" selected>
                                        <?php echo $row["nome"] . " - CRM: " . $row["CRM"]?>
                                    </option>
                    <?php
                                }
                                else
                                {
                    ?>                    
                                    <option value="<?php echo $row["CRM"]?>">
                                        <?php echo $row["nome"] . " - CRM: " . $row["CRM"]?>
                                    </option>
                    
                    <?php
                                }
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="buttons">
                <input type="submit" class="btn btn-success" value="Atualizar">
                <input type="reset" class="btn btn-danger" value="Cancelar">
            </div>

        </form>
    </div>


<?php
    }
?>
