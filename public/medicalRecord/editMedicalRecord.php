<?php
    include("../templates/header.php");
    include_once("../../data/db_connection.php");
?>

<?php
    if (isset ($_GET["id"])) {
        $id = $_GET["id"];
        
        $sql = "SELECT * FROM prontuario WHERE prontuario_id = '". $id . "'";
        //echo $sql;
        $resultado = $connection->query($sql);
        $prontuario = $resultado->fetch_assoc();
        
?>


<div class="form">
        <form action="updateMedicalRecord.php" method="POST" style="margin-left: 100px; margin-right: 100px;">
            
            <h3>Editar</h3>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Id do Prontuário</span>
                </div>

                <input type="number" name="prontuarioId" class="form-control input-sm" id="prontuarioId" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $prontuario["prontuario_id"]?>" readonly>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Descrição</span>
                </div>

                <textarea name="problema" id="problema" cols="100" rows="3" maxlength="200"><?php echo $prontuario["problema"]?></textarea>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Situação</span>
                </div>

                <select name="situacao" id="situacao">
                <?php 
                    if(strcmp($prontuario["situacao"], "ativo") == 0)
                    {
                ?>
                        <option value="ativo" selected>Ativo</option>
                        <option value="inativo">Inativo</option>
                <?php
                    }
                    else
                    {
                ?>
                        <option value="ativo">Ativo</option>
                        <option value="inativo" selected>Inativo</option>
                <?php
                    }
                ?>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Análise</span>
                </div>

                <select name="analise" id="analise">
                    <?php
                        $analise = $prontuario["analise"];
                        if(strcmp($analise, "subjetivo") == 0)
                        {
                    ?>
                            <!-- anamnese, coleta de dados subjetivos, descrição livre -->
                            <option value="subjetivo" selected>Subjetivo</option>
                            <!-- exame fisico, exames laboratoriais -->
                            <option value="objetivo">Objetivo</option>
                            <!-- hipoteses, raciocinio clinico, duvidas, observacoes -->
                            <option value="avaliacao">Avaliação</option>
                            <!-- cada problema tem um plano: diagnostico, terapeutico, educacional -->
                            <option value="plano">Plano</option>
                    <?php
                        }
                        elseif(strcmp($analise, "objetivo") == 0)
                        {
                    ?>
                            <option value="subjetivo">Subjetivo</option>
                            <option value="objetivo" selected>Objetivo</option>
                            <option value="avaliacao">Avaliação</option>
                            <option value="plano">Plano</option>
                    <?php
                        }
                        elseif(strcmp($analise, "avaliacao") == 0)
                        {
                    ?>
                            <option value="subjetivo">Subjetivo</option>
                            <option value="objetivo">Objetivo</option>
                            <option value="avaliacao" selected>Avaliação</option>
                            <option value="plano">Plano</option>
                    <?php
                        }
                        elseif(strcmp($analise, "plano") == 0)
                        {
                    ?>
                            <option value="subjetivo">Subjetivo</option>
                            <option value="objetivo">Objetivo</option>
                            <option value="avaliacao">Avaliação</option>
                            <option value="plano" selected>Plano</option>
                    <?php
                        }
                    ?>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Observações</span>
                </div>

                <textarea name="observacao" id="observacao" cols="107" rows="5" maxlength="500"><?php echo $prontuario["observacoes"]?></textarea>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Médico</span>
                </div>
                <select class="form-select" name="crm_medico" id="crm_medico">
                    <?php

                        $sqlQuery = "SELECT * FROM medico ORDER BY nome";

                        $medicos = $connection -> query($sqlQuery);

                        if($medicos -> num_rows > 0)
                        {

                            while($row = $medicos -> fetch_assoc()){
                                if(strcmp($prontuario["crm_medico"], $row["CRM"]) == 0)
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
                                if(strcmp($prontuario["paciente_cpf"], $row["CPF"]) == 0)
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

            <!--falta fazer uma funcao para listar as consultas que o paciente participou-->
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Consulta</span>
                </div>
                <select class="form-select" name="id_consulta" id="id_consulta">
                    <?php

                        $sqlQuery = "SELECT * FROM consulta";

                        $consultas = $connection -> query($sqlQuery);

                        if($consultas -> num_rows > 0)
                        {

                            while($row = $consultas -> fetch_assoc()){
                                if(strcmp($prontuario["id_consulta"], $row["consulta_id"]) == 0)
                                {
                    ?>
                                    <option value="<?php echo $row["consulta_id"]?>" selected>
                                        <?php echo "Data: " . $row["data_consulta"]?>
                                    </option> 
                            <?php
                                }
                                else
                                {
                            ?>
                                    <option value="<?php echo $row["consulta_id"]?>">
                                        <?php echo "Data: " . $row["data_consulta"]?>
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
