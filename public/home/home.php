<?php
session_start();
if (isset($_SESSION['medico']) or isset($_SESSION['paciente']) or isset($_SESSION['adm'])) {
    //echo "voce eh um ADM!"; 
    } else {
    ?>
        <script>
            
            window.location = "../auth/index.php";
        </script>
<?php
    }
?>




<?php include("../templates/header.php")?>

<html lang="pt-BR">
    <head>
        <title>Home - Sistema Unico</title>
    </head>

    <body>
      
        <header class="bg-success py-5 mb-5">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-12">
                    <h1 class="display-4 text-white mt-5 mb-2">Sistema Unico</h1>
                    <p class="lead mb-5 text-white-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio vitae omnis impedit mollitia eum est rerum, odit, beatae quis assumenda fuga dolorum officia nisi vel dolores culpa repellat distinctio error?</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="container">

            <div class="row">
            <div class="col-md-8 mb-5">
                <h2>O que queremos resolver ?</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
            </div>
            <div class="col-md-4 mb-5">
                <h2>Contate-nos</h2>
                <hr>
                <address>
                <br>Ouro Branco
                <br>Minas Gerais, Brasil.
                <br>
                </address>
                <address>
                (31) 95555-5555
                <br>
                <a href="mailto:#">name@example.com</a>
                </address>
            </div>
            </div>

            <div class="row">
               <div class="col-md-4 mb-5">
                    <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Você é médico ?</h4>
                        <p class="card-text">Temos um sistema íntegro para o armazenamento do histórico dos seus pacientes
                                                e agendamento das consultas!</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-success">Saiba mais</a>
                    </div>
                    </div>
                </div>
               
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Você é funcionário ?</h4>
                        <p class="card-text">Nosso sistema é muito eficiente para os processos de uma clínica ou hospital, 
                                        oferecendo um histórico dos prontuários e das consultas.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-success">Saiba mais</a>
                    </div>
                    </div>
                </div>
               
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Você é cliente ?</h4>
                        <p class="card-text">O sistema guarda todos os seus prontuários e históricos, além da agenda 
                         de suas consultas.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-success">Saiba mais</a>
                    </div>
                    </div>
                </div>
            </div>

        </div>
        
        <footer class="py-5 bg-dark">

            <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
            </div>

        </footer>


    </body>
</html>