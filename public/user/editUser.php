<?php include("../auth/validarADM.php")?>




<?php
    include("../templates/header.php");
    include_once("../../data/db_connection.php");
?>

<?php
   if (isset ($_GET["id"])) 
   {
       $id = $_GET["id"];
       
       $sql = "SELECT * FROM usuarios WHERE id_usuario = '". $id . "'";
       $resultado = $connection->query($sql);
       $usuario = $resultado->fetch_assoc();

      

       
?>
?>


<div class="form">
        <form action="updateUser.php" method="POST" style="margin-left: 100px; margin-right: 100px;">
            <h3>Editar Usuário</h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Usuário</span>
                </div>
                <input type="text" name="txtUsuario" class="form-control" id="txtUsuario" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Senha</span>
                </div>
                <input type="password" name="txtSenha" class="form-control" id="txtSenha" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
            

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Prioridade</span>
                </div>
                <input type="number" name="numPrioridade" class="form-control" id="numPrioridade" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                </div>
                <input type="text" name="txtNome" class="form-control" id="txtNome" aria-label="Default" aria-describedby="inputGroup-sizing-default">
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
