<?php include("../auth/validaMedico.php")?>
<?php include("../auth/validar.php")?>

<?php 
    include("../templates/header.php");
    include_once("../../data/db_connection.php");

    if(isset($_GET["id"]))
    {
        $consulta_id = $_GET["id"];
        $sqlConsulta = "SELECT * FROM consulta WHERE consulta_id = " . $consulta_id;
        $resultado = $connection->query($sqlConsulta);
        $consulta = $resultado->fetch_assoc();
        $consultaData = $consulta["data_consulta"];
        $paciente_cpf = $consulta["paciente_cpf"];
        $crm_medico = $consulta["crm_medico"];
    }

?>

<html lang="pt-br">
<head>
    <meta charset="utf8mb4_general_ci">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de prontuário</title>
</head>
<body>
    <br>
    <br>
    <br>
    
    <div class="form">
        <form action="insertMedicalRecord.php" method="POST" style="margin-left: 100px; margin-right: 100px;">
            <h3>Cadastro de prontuário</h3><br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Descrição</span>
                </div>

                <textarea name="problema" id="problema" cols="100" rows="3" maxlength="200"></textarea>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Situação</span>
                </div>

                <select name="situacao" id="situacao">
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Análise</span>
                </div>

                <select name="analise" id="analise">
                    <!-- anamnese, coleta de dados subjetivos, descrição livre -->
                    <option value="subjetivo">Subjetivo</option>

                    <!-- exame fisico, exames laboratoriais -->
                    <option value="objetivo">Objetivo</option>

                    <!-- hipoteses, raciocinio clinico, duvidas, observacoes -->
                    <option value="avaliacao">Avaliação</option>

                    <!-- cada problema tem um plano: diagnostico, terapeutico, educacional -->
                    <option value="plano">Plano</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Observações</span>
                </div>

                <textarea name="observacao" id="observacao" cols="107" rows="5" maxlength="500"></textarea>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Médico</span>
                </div>
                <select class="form-select" name="crm_medico" id="crm_medico">
                    <option value="-1" selected>Selecione um médico disponível</option>
                    <?php

                    $sqlQuery = "SELECT * FROM medico where id_usuario='$id_usuario'";

                        $medicos = $connection -> query($sqlQuery);

                        if($medicos -> num_rows > 0)
                        {

                            while($row = $medicos -> fetch_assoc()){
                                if($row["CRM"] === $crm_medico)
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
                    <option value="-1" selected>Selecione um paciente</option>
                    <?php

                        $sqlQuery = "SELECT * FROM paciente ORDER BY nome";

                        $pacientes = $connection -> query($sqlQuery);

                        if($pacientes -> num_rows > 0)
                        {

                            while($row = $pacientes -> fetch_assoc()){
                                if($row["CPF"] === $paciente_cpf)
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
                    <option value="-1" selected>Selecione uma consulta</option>
                    <?php

                        $sqlQuery = "SELECT * FROM consulta";

                        $consultas = $connection -> query($sqlQuery);

                        if($consultas -> num_rows > 0)
                        {

                            while($row = $consultas -> fetch_assoc()){
                                if($row["consulta_id"] === $consulta_id)
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
                                    <option value="<?php echo $row["consulta_id"]?>" selected>
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
                <input type="submit" class="btn btn-success" value="Cadastrar">
                <input type="reset" class="btn btn-danger" value="Cancelar">
            </div>