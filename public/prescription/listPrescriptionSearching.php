<?php include("../auth/validar.php") ?>



<?php
$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
?>

<?php

include("../../data/db_connection.php");

$sql = "SELECT * FROM receita WHERE crm_medico LIKE '%$usuarios%'";
if (isset($_SESSION['paciente'])) {
    $sql = "SELECT * FROM receita where id_usuario=$id_usuario and crm_medico LIKE '%$usuarios%'";
}
if (isset($_SESSION['medico'])) {
    $sql2 = "select CRM from medico where id_usuario=$id_usuario";
    $resultado2 = $connection->query($sql2);
    $row = $resultado2->fetch_assoc();

    $crm = $row["CRM"];

    $sql = "SELECT * FROM receita where crm_medico=$crm and crm_medico LIKE '%$usuarios%'";
}




$dadosConsulta = $connection->query($sql);

if ($dadosConsulta->num_rows > 0) {
?>
    <div style="margin-left: 100px; margin-right: 100px;">
        <br>
        <table class="table" style="text-align: center;">
            <tr>
                <th>Medico</th>
                <th>Paciente</th>
                <th>Periodo em dias</th>
                <th>Posologia</th>
                <th>Medicamento</th>
                <th>Opções</th>
            </tr>

            <?php
            while ($exibir = $dadosConsulta->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php

                        $sql = "SELECT nome FROM medico WHERE CRM = '" . $exibir["crm_medico"] . "'";

                        $resultado = $connection->query($sql);

                        $row = $resultado->fetch_assoc();

                        echo $row["nome"];

                        ?></td>

                    <td><?php

                        $sql = "SELECT nome FROM paciente WHERE CPF = " . $exibir["cpf_paciente"];

                        $resultado = $connection->query($sql);

                        $row = $resultado->fetch_assoc();

                        echo $row["nome"];

                        ?></td>
                    <td><?php echo $exibir["periodo"] ?></td>
                    <td><?php echo $exibir["posologia"] ?></td>
                    <td><?php echo $exibir["medicamento"] ?></td>

                    <td>
                        <button type="button" class="btn btn-primary btn-sm">
                            <a href="printPrescription.php?id=<?php echo $exibir["id"] ?>" style="text-decoration: none; color: white">Imprimir</a>
                        </button>

                        <button type="button" class="btn btn-primary btn-sm">
                            <a href="editPrescription.php?id=<?php echo $exibir["id"] ?>" style="text-decoration: none; color: white">Editar</a>
                        </button>

                        <button type="submit" class="btn btn-danger btn-sm" formmethod="post">
                            <a href="deletePrescription.php?id=<?php echo $exibir["id"] ?>" style="text-decoration: none; color: white"> Excluir </a>

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