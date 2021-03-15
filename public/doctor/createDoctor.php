<?php include("../auth/validarADM.php")?>






<?php include("../templates/header.php");
      include_once("../../data/db_connection.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de médico</title>
</head>
<body>
    <br>
    <br>
    <br>
    
    <div class="form">
        <form action="insertDoctor.php" method="POST" style="margin-left: 100px; margin-right: 100px;">
            <h3>Cadastro de médico</h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">CRM</span>
                </div>
                <input type="text" name="txtCRM" class="form-control" id="txtCRM" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                </div>
                <input type="text" name="txtNome" class="form-control" id="txtNome" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Idade</span>
                </div>
                <input type="number" name="numIdade" class="form-control" id="numIdade" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Especialidade</span>
                </div>
                <select class="form-select" name="especialidade_id" id="especialidade_id">
                    <option value="-1" selected>Selecione uma especialidade para cadastrar</option>
                    <?php
                        
                        $sqlQuery = "SELECT * FROM especialidade_medico ORDER BY especialidade_id";

                        $especialidade = $connection -> query($sqlQuery);

                        if($especialidade -> num_rows > 0)
                        {

                            while($row = $especialidade -> fetch_assoc()){
                    ?>
                    
                        <option value="<?php echo $row["especialidade_id"]?>"><?php echo $row["descricao"]?></option>
                    
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
