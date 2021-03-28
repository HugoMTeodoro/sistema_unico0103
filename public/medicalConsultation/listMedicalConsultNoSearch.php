<?php
$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
?>


<?php



    include("../../data/db_connection.php");

    $sql = "SELECT * FROM consulta";

    $dadosConsulta = $connection -> query($sql);

    if($dadosConsulta -> num_rows > 0)
    {
    ?>
    <div class="form">
        <div style="margin-left: 100px; margin-right: 100px;">
            <h2>Consultas</h2>
            <br>
            <table class="table" style="text-align: center;">
                <tr>
                    <th>Horário (Y/M/D)</th>
                    <th>Nome Paciente</th>
                    <th>Nome Médico</th>
                    <th>Itens</th>
                </tr>

                <?php
                    while($exibir = $dadosConsulta -> fetch_assoc())
                    {
                    ?>
                        <tr>
                            <td><?php echo $exibir["data_consulta"] ?></td>
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
                                <!--Gerar um prontuário passando data_consulta, paciente_cpf, crm_medico-->
                                <?php
                                
                                    $sqlProntuario = "SELECT * FROM prontuario WHERE id_consulta = ". $exibir["consulta_id"];
                                    $resultado = $connection->query($sqlProntuario);
                                    $prontuario = $resultado->fetch_assoc();
                                    if(isset($prontuario["prontuario_id"])){
                                        //já existe um prontuário para essa consulta
                                    }
                                    else
                                    {
                                ?>
                                        <button type="submit" class="btn btn-primary btn-sm" formmethod="post">
                                            <a href="../medicalRecord/createMedicalRecord.php?id=<?php echo $exibir["consulta_id"]?>" style="text-decoration: none; color: white">Gerar um prontuário</a>
                                        </button>
                                <?php
                                    }
                                ?>

                                <button type="button" class="btn btn-primary btn-sm">
                                    <a href="../prescription/createPrescription.php?cpf=<?php echo $exibir["paciente_cpf"]?>" style="text-decoration: none; color: white">Gerar uma receita</a>
                                </button>
                                <button type="submit" class="btn btn-danger btn-sm" formmethod="post">
                                    <a href="deleteConsult.php?id=<?php echo $exibir ["consulta_id"] ?>" style="text-decoration: none; color: white"> Excluir </a> 
                                    
                                </button>
                                <button type="submit" class="btn btn-danger btn-sm" formmethod="post">
                                    <a href="editMedicalConsult.php?id=<?php echo $exibir ["consulta_id"] ?>" style="text-decoration: none; color: white"> Editar </a> 
                                </button>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
            </table>
        </div>
    </div>
<?php
    }
    else
    {
        echo "Nenhum registro encontrado.";
    }
?>
