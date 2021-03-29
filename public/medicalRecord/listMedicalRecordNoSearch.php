<?php include("../../data/db_connection.php") ?>
<?php include("../auth/validar.php") ?>
<?php



$sql = "SELECT * FROM prontuario";

if (isset($_SESSION['paciente'])) {
    $sql2 = "select paciente_cpf from paciente where id_usuario=$id_usuario";
    $resultado2 = $connection->query($sql2);
    $row = $resultado2->fetch_assoc();

    $cpf=$row["paciente_cpf"];
    
    $sql = "SELECT * FROM prontuario where paciente_cpf=$cpf";
}
if (isset($_SESSION['medico'])) {
    $sql2 = "select CRM from medico where id_usuario=$id_usuario";
    $resultado2 = $connection->query($sql2);
    $row = $resultado2->fetch_assoc();

    $crm=$row["CRM"];
    
    $sql = "SELECT * FROM prontuario where crm_medico=$crm";
    
}

$dadosProntuario = $connection->query($sql);

if ($dadosProntuario->num_rows > 0) {
?>
    

    

   
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
        while ($exibir = $dadosProntuario->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $exibir["problema"] ?></td>

                <td><?php echo $exibir["situacao"] ?></td>

                <td><?php echo $exibir["analise"] ?></td>

                <td><?php echo $exibir["observacoes"] ?></td>

                <td><?php

                    $sql = "SELECT data_consulta FROM consulta WHERE consulta_id = " . $exibir["id_consulta"];

                    $resultado = $connection->query($sql);

                    $row = $resultado->fetch_assoc();

                    echo $row["data_consulta"];

                    ?></td>

                <td><?php

                    $sql = "SELECT nome FROM paciente WHERE CPF = " . $exibir["paciente_cpf"];

                    $resultado = $connection->query($sql);

                    $row = $resultado->fetch_assoc();

                    echo $row["nome"];

                    ?></td>

                <td><?php

                    $sql = "SELECT nome FROM medico WHERE CRM = '" . $exibir["crm_medico"] . "'";

                    $resultado = $connection->query($sql);

                    $row = $resultado->fetch_assoc();

                    echo $row["nome"];

                    ?></td>

                <td>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <a href="createPDF.php?id=<?php echo $exibir["id_consulta"] ?>" style="text-decoration: none; color: white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                            </svg>
                        </a>
                    </button>
                    <br>
                    <button type="submit" class="btn btn-success btn-sm" formmethod="post">
                        <a href="editMedicalRecord.php?id=<?php echo $exibir["prontuario_id"] ?>" style="text-decoration: none; color: white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>
                    </button>
                    <br>
                    <button type="submit" class="btn btn-danger btn-sm" formmethod="post">
                        <a href="deleteMedicalRecord.php?id=<?php echo $exibir["prontuario_id"] ?>" style="text-decoration: none; color: white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </a>
                    </button>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>
    </div>
<?php
} else {
    echo "Nenhum registro encontrado.";
}
?>