<script>
    $(function(){
        $("#pesquisa").keyup(function()
        {
            var pesquisa = $(this).val();
            
            //Verificar se há algo digitado
            
            if (pesquisa != '') {
                var dados = {
                    palavra : pesquisa
                }
            }else{
                <?php
                    echo "a";
                ?>
                
            }
                $.post('listMedicalRecord.php', dados,function(retorna) {
                $(".resultado").html(retorna);
                });
            
        });
            
            

       
    });
         //Pesquisar prontuário
       
    


    </script>