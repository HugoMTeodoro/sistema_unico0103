<?php include("../auth/validar.php")?>

<?php include("../templates/header.php")?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de paciente</title>
</head>
<body>
    <br>
    <br>
    <br>
    
    <div class="form">
        <form action="insertPatient.php" method="POST" style="margin-left: 100px; margin-right: 100px;">
            <h3>Cadastro de paciente</h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">CPF</span>
                </div>
                <input type="text" name="txtCPF" class="form-control" id="txtCPF" aria-label="Default" aria-describedby="inputGroup-sizing-default">
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
                    <span class="input-group-text" id="inputGroup-sizing-default">Contato</span>
                </div>
                <input type="text" name="txtContato" class="form-control" id="txtContato" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Rua</span>
                </div>
                <input type="text" name="txtRua" class="form-control" id="txtRua" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Bairro</span>
                </div>
                <input type="text" name="txtBairro" class="form-control" id="txtBairro" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Numero</span>
                </div>
                <input type="number" name="numCasa" class="form-control" id="numCasa" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>

            <div class="buttons">
                
                <input type="submit" class="btn btn-success" value="Cadastrar">
                <input type="reset" class="btn btn-danger" value="Cancelar">

            </div>


        </form>
    </div>


</body>
</html>
