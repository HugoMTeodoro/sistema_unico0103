<?php include("../auth/validaMedico.php")?>
<?php include("../templates/header.php")?>

<br>
<br>
<br>

<?php

    include("../../data/db_connection.php");

    $sql = "SELECT * FROM paciente";

    $dadosConsulta = $connection -> query($sql);

    if($dadosConsulta -> num_rows > 0)
    {
    ?>
    <div style="margin-left: 100px; margin-right: 100px;">
        <h2>Pacientes</h2>
        <br>
        <table class="table" style="text-align: center;">
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Contato</th>
                <th>Rua</th>
                <th>Bairro</th>
                <th>Numero</th>
                <th>Configuracoes</th>
            </tr>

            <?php
                while($exibir = $dadosConsulta -> fetch_assoc())
                {
                ?>
                    <tr>
                        <td><?php echo $exibir["CPF"] ?></td>
                        <td><?php echo $exibir["nome"] ?></td>
                        <td><?php echo $exibir["idade"] ?></td>
                        <td><?php echo $exibir["contato"] ?></td>
                        <td><?php echo $exibir["rua"] ?></td>
                        <td><?php echo $exibir["bairro"] ?></td>
                        <td><?php echo $exibir["numero"] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm">
                                <a href="editPatient.php?cpf=<?php echo $exibir["CPF"]?>" style="text-decoration: none; color: white">Editar</a>
                            </button>
                        
                            <button type="submit" class="btn btn-danger btn-sm" formmethod="post">
                                 <a href="deletePatient.php?cpf=<?php echo $exibir ["CPF"] ?>" style="text-decoration: none; color: white"> Excluir </a> 
                                
                            </button>
                        </td>
                    </tr>
                <?php
                    }
                ?>
        </table>
    </div>
<?php
    }
    else
    {
        echo "Nenhum registro encontrado.";
    }
?>
