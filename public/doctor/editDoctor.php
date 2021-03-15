<?php include("../auth/validarADM.php")?>




<?php
    include("../templates/header.php");
    include_once("../../data/db_connection.php");
?>

<?php
    if (isset ($_GET["crm"])) {
        $crm = $_GET["crm"];
        
        $sql = "SELECT * FROM medico WHERE CRM = '". $crm . "'";
        //echo $sql;
        $resultado = $connection->query($sql);
        $medico = $resultado->fetch_assoc();
    

    //echo $medico["nome"]. " ". $medico["CRM"];
?>


<div class="form">
        <form action="updateDoctor.php" method="POST" style="margin-left: 100px; margin-right: 100px;">
            <h3>Editar</h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">CRM</span>
                </div>
                <input type="text" name="txtCRM" class="form-control" id="txtCRM" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php  echo $medico["CRM"]?>" readonly>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                </div>
                <input type="text" name="txtNome" class="form-control" id="txtNome" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php  echo $medico["nome"]?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Idade</span>
                </div>
                <input type="number" name="numIdade" class="form-control" id="numIdade" aria-label="Default" aria-describedby="inputGroup-sizing-default"  value="<?php  echo $medico["idade"]?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Especialidade</span>
                </div>
                <select class="form-select" name="especialidade_id" id="especialidade_id">
                    
                    <?php
                        
                        $sqlQuery = "SELECT * FROM especialidade_medico ORDER BY especialidade_id";

                        $especialidade = $connection -> query($sqlQuery);

                        if($especialidade -> num_rows > 0)
                        {

                            while($row = $especialidade -> fetch_assoc()){
                                if ($row["especialidade_id"] === $medico["especialidade_id"]) {         
                    ?>
                        <option value="<?php echo $row["especialidade_id"]?>" selected><?php echo $row["descricao"]?></option>
                        <?php
                                }else {
                                    
                                
                         ?>
                        <option value="<?php echo $row["especialidade_id"]?>"><?php echo $row["descricao"]?></option>
                    
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
