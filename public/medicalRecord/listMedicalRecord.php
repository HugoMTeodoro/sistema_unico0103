<?php include("../templates/header.php")?>

<br>
<br>
<br>

<?php

    include("../../data/db_connection.php");

    $sql = "SELECT * FROM prontuario";

    $dadosProntuario = $connection -> query($sql);

    if($dadosProntuario -> num_rows > 0)
    {
    ?>
    <div style="margin-left: 100px; margin-right: 100px;">
        <h2>Prontuarios</h2>
        <br>
        <table class="table" style="text-align: center;">
            <tr>
                <th>Problema</th>
                <th>Situação</th>
                <th>Análise</th>
                <th>Observações</th>
                <th>Data (Y/M/D)</th>
                <th>Nome Paciente</th>
                <th>Nome Médico</th>
                <th>Configurações</th>
            </tr>

            <?php
                while($exibir = $dadosProntuario -> fetch_assoc())
                {
                ?>
                    <tr>
                        <td><?php echo $exibir["problema"]?></td>
                        
                        <td><?php echo $exibir["situacao"]?></td>

                        <td><?php echo $exibir["analise"]?></td>

                        <td><?php echo $exibir["observacoes"]?></td>

                        <td><?php

                            $sql = "SELECT data_consulta FROM consulta WHERE consulta_id = " . $exibir["id_consulta"];

                            $resultado = $connection -> query($sql);

                            $row = $resultado -> fetch_assoc();

                            echo $row["data_consulta"];

                        ?></td>
                        
                        <td><?php 
                        
                            $sql = "SELECT nome FROM paciente WHERE CPF = " . $exibir["paciente_cpf"];

                            $resultado = $connection -> query($sql);

                            $row = $resultado -> fetch_assoc();

                            echo $row["nome"];
                        
                        ?></td>
                        
                        <td><?php 
                        
                            $sql = "SELECT nome FROM medico WHERE CRM = '" . $exibir["crm_medico"] . "'";

                            $resultado = $connection -> query($sql);

                            $row = $resultado -> fetch_assoc();

                            echo $row["nome"];
                        
                        ?></td>

                        <td>
                            <button class="btn btn-primary">Imprimir</button>
                            <button type="submit" class="btn btn-danger" formmethod="post">
                                 <a href="editMedicalRecord.php?id=<?php echo $exibir ["prontuario_id"] ?>" style="text-decoration: none; color: white"> Editar </a> 
                            </button>
                            <button type="submit" class="btn btn-danger" formmethod="post">
                                 <a href="deleteMedicalRecord.php?id=<?php echo $exibir ["prontuario_id"] ?>" style="text-decoration: none; color: white"> Excluir </a> 
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
