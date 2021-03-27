<?php include("../auth/validarADM.php")?>

<?php include("../templates/header.php")?>
<br>
<br>
<br>


<?php
    include("../../data/db_connection.php");

    $sql = "SELECT * FROM medico";

    $dadosConsulta = $connection -> query($sql);

    if($dadosConsulta -> num_rows > 0)
    {
    ?>
    <div style="margin-left: 100px; margin-right: 100px;">
        <h2>Médicos</h2>
        <br>
        <table class="table" style="text-align: center;">
            <tr>
                <th>CRM</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Especialidade</th>
                <th>Configurações</th>
            </tr>

            <?php
                while($exibir = $dadosConsulta -> fetch_assoc())
                {
                ?>
                    <tr>
                        <td><?php echo $exibir["CRM"] ?></td>
                        <td><?php echo $exibir["nome"] ?></td>
                        <td><?php echo $exibir["idade"] ?></td>
                        <td>
                        <?php 

                            $especialidade_id = $exibir["especialidade_id"];

                            $sqlQuery = "SELECT * FROM especialidade_medico WHERE especialidade_id = " . $exibir["especialidade_id"];

                            $result = $connection -> query($sqlQuery);

                            if($result)
                            {
                                while($row = $result->fetch_assoc())
                                    echo $row["descricao"];
                        
                            }
                            
                        ?>
                        </td>
                        
                        <td>
                            <button type="submit" class="btn btn-primary btn-sm" formmethod="get">
                                <a href="editDoctor.php?crm=<?php echo $exibir["CRM"]?>" style="text-decoration: none; color: white">Editar</a> 
                            </button>
                        
                            <button type="submit" class="btn btn-danger btn-sm" formmethod="post">
                                 <a href="deleteDoctor.php?crm=<?php echo $exibir ["CRM"] ?>" style="text-decoration: none; color: white"> Excluir </a> 
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
