<?php
    include("../templates/header.php");
    include_once("../../data/db_connection.php");
?>

<?php
    if (isset ($_GET["cpf"])) {
        $cpf = $_GET["cpf"];
        
        $sql = "SELECT * FROM paciente WHERE CPF = '". $cpf . "'";
        //echo $sql;
        $resultado = $connection->query($sql);
        $paciente = $resultado->fetch_assoc();
    

?>


<div class="form">
        <form action="updatePatient.php" method="POST" style="margin-left: 100px; margin-right: 100px;">
            
            <h3>Editar</h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">CPF</span>
                </div>
                <input type="text" name="txtCPF" class="form-control" id="txtCPF" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php  echo $paciente["CPF"]?>" readonly>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                </div>
                <input type="text" name="txtNome" class="form-control" id="txtNome" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php  echo $paciente["nome"]?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Idade</span>
                </div>
                <input type="number" name="numIdade" class="form-control" id="numIdade" aria-label="Default" aria-describedby="inputGroup-sizing-default"  value="<?php  echo $paciente["idade"]?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Contato</span>
                </div>
                <input type="text" name="txtContato" class="form-control" id="txtContato" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php  echo $paciente["contato"]?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Rua</span>
                </div>
                <input type="text" name="txtRua" class="form-control" id="txtRua" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php  echo $paciente["rua"]?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Bairro</span>
                </div>
                <input type="text" name="txtBairro" class="form-control" id="txtBairro" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php  echo $paciente["bairro"]?>">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Numero</span>
                </div>
                <input type="number" name="numero" class="form-control" id="numero" aria-label="Default" aria-describedby="inputGroup-sizing-default"  value="<?php  echo $paciente["numero"]?>">
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
