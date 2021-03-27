<?php include("../auth/validar.php") ?>

<?php include("../templates/header.php") ?>

<?php include("../../data/db_connection.php") ?>

<br>
<br>
<br>

<body>
    <form method="POST" id="form-pesquisa" action="">
        <label>Pesquisar: </label>
        <input type="text" name="pesquisa" id="pesquisa" placeholder="Procure o pronturario desejado" SIZE=100>
        <br>
        <br>
    </form>
    <ul class="resultado">

	<?php include("listMedicalRecordNoSearch.php") ?>

	</ul>
</body>
<script>
	$(function() {

		$("#pesquisa").keyup(function() {
			//Recuperar o valor do campo
			var pesquisa = $(this).val();

			//Verificar se há algo digitado
			if (pesquisa != '') {
				var dados = {
					palavra: pesquisa
				}

				$.post('listMedicalRecordSearching.php', dados, function(retorna) {
					//Mostra dentro da ul os resultado obtidos 
					$(".resultado").html(retorna);
				});
			} else {
				$.post('listMedicalRecordNoSearch.php', dados, function(retorna) {
					//Mostra dentro da ul os resultado obtidos 
					$(".resultado").html(retorna);
				});
			}
		});
	});
</script>