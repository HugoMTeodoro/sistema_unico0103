<?php include("../auth/validar.php") ?>

<?php include("../templates/header.php") ?>

<?php include("../../data/db_connection.php") ?>

<br>
<br>
<br>

<body>
    <form method="POST" id="form-pesquisa" action="">
	<div style="margin-left: 100px; margin-right: 100px;">
        <h2>Receitas</h2>

        <br>
        
    <div class="buttons">
                <a href="../prescription/createPrescription.php" class="btn btn-primary">Cadastre uma Receita</a>
        </div>
    
    <br>
    <form method="POST" id="form-pesquisa" action="">
	<div class="input-group mb-3">
	<div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Receita</span>
                </div>
				<input type="text" name="pesquisa" class="form-control" id="pesquisa" aria-label="Default" placeholder="Procure a receita" aria-describedby="inputGroup-sizing-default">
	</div>
    </div>
		
    </form>
    <ul class="resultado">

	<?php include("listPrescriptionNoSearch.php") ?>

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

				$.post('listPrescriptionSearching.php', dados, function(retorna) {
					//Mostra dentro da ul os resultado obtidos 
					$(".resultado").html(retorna);
				});
			} else {
				$.post('listPrescriptionNoSearch.php', dados, function(retorna) {
					//Mostra dentro da ul os resultado obtidos 
					$(".resultado").html(retorna);
				});
			}
		});
	});
</script>