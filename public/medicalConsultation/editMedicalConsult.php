<?php include("../auth/validaMedico.php")?>

<?php
    include("../templates/header.php");
    include_once("../../data/db_connection.php");


    if (isset ($_GET["id"])) 
    {
        $id = $_GET["id"];
        
        $sql = "SELECT * FROM consulta WHERE consulta_id = '". $id . "'";
        //echo $sql;
        $resultado = $connection->query($sql);
        $consulta = $resultado->fetch_assoc();

        $dc = trim($consulta["data_consulta"]);
        $data = date("Y-m-d", strtotime($dc));
        $hora = date("H:i",strtotime($dc));
        $datac = $data."T".$hora;

        
?>
    
        <div class="form">
            <form action="updateMedicalConsult.php" method="POST" style="margin-left: 100px; margin-right: 100px;">
                <h3>Edição de consulta</h3>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Id da consulta</span>
                </div>

                <input type="number" name="consultaId" class="form-control input-sm" id="consultaId" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $consulta["consulta_id"]?>" readonly>
            </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Data</span>
                    </div>
                    <!-- todo -->
                    <input type="datetime-local" name="date" class="form-control" id="date" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                    value= "<?php echo $datac?>" >
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Paciente</span>
                    </div>
                    <select class="form-select" name="paciente_cpf" id="paciente_cpf">
                        <?php

                            $sqlQuery = "SELECT * FROM paciente ORDER BY nome";

                            $pacientes = $connection -> query($sqlQuery);

                            if($pacientes -> num_rows > 0)
                            {

                                while($row = $pacientes -> fetch_assoc()){
                                    if(strcmp($consulta["paciente_cpf"], $row["CPF"]) == 0)
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
                        <?php

                            $sqlQuery = "SELECT * FROM medico";

                            $medicos = $connection -> query($sqlQuery);

                            if($medicos -> num_rows > 0)
                            {

                                while($row = $medicos -> fetch_assoc()){
                                    if(strcmp($consulta["crm_medico"], $row["CRM"]) == 0)
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
