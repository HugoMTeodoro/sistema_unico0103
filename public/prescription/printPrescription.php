<?php
    include_once("../../data/db_connection.php");

    require_once '../medicalRecord/domPDF/vendor/autoload.php';

    use Dompdf\Dompdf;

    if(isset($_GET["id"]))
    {
        $receita_id = $_GET["id"];
        $sqlReceita = "SELECT * FROM receita WHERE id = " . $receita_id;
        $resultado = $connection->query($sqlReceita);
        $receita = $resultado->fetch_assoc();
        $periodo = $receita["periodo"];
        $paciente_cpf = $receita["cpf_paciente"];
        $crm_medico = $receita["crm_medico"];
        $posologia = $receita["posologia"];
        $medicamento = $receita["medicamento"];
        
        $sqlPaciente = "SELECT * FROM paciente WHERE CPF = " . $paciente_cpf;
        $resultado = $connection->query($sqlPaciente);
        $paciente = $resultado->fetch_assoc();
        $pacienteNome = $paciente["nome"];

        $sqlMedico = "SELECT * FROM medico WHERE CRM = '" . $crm_medico . "'";
        $resultado = $connection->query($sqlMedico);
        $medico = $resultado->fetch_assoc();
        $medicoNome = $medico["nome"];
        
        $sqlEspecialidade = "SELECT * FROM especialidade_medico WHERE especialidade_id = " . $medico["especialidade_id"];
        $resultado = $connection->query($sqlEspecialidade);
        $especialidade = $resultado->fetch_assoc();
        $especialidade = $especialidade["descricao"];
        
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y H:i:s', time());  
    
        $domPDF = new Dompdf();

        $html = '
        <html>
            <head>
                <meta content="text/html; charset=UTF-8" http-equiv="content-type">
                <style type="text/css">
                    ol{margin:0;padding:0}
                    table td,table th{padding:0}
                    .c7{
                        border-right-style:solid;
                        padding:5pt 5pt 5pt 5pt;
                        border-bottom-color:#000000;
                        border-top-width:1pt;
                        border-right-width:1pt;
                        border-left-color:#000000;
                        vertical-align:top;
                        border-right-color:#000000;
                        border-left-width:1pt;
                        border-top-style:solid;
                        border-left-style:solid;
                        border-bottom-width:1pt;
                        width:225.7pt;
                        border-top-color:#000000;
                        border-bottom-style:solid
                    }
                    .c0{
                        padding-top:0pt;
                        padding-bottom:0pt;
                        line-height:1.15;
                        orphans:2;
                        widows:2;
                        text-align:left;
                        height:11pt
                    }
                    .c1{
                        color:#000000;
                        font-weight:700;
                        text-decoration:none;
                        vertical-align:baseline;
                        font-size:17pt;
                        font-family:"Arial";
                        font-style:normal
                    }
                    .c4{
                        color:#000000;
                        font-weight:400;
                        text-decoration:none;
                        vertical-align:baseline;
                        font-size:11pt;
                        font-family:"Arial";
                        font-style:normal
                    }
                    .c5{
                        padding-top:0pt;
                        padding-bottom:0pt;
                        line-height:1.15;
                        orphans:2;
                        widows:2;
                        text-align:left
                    }
                    .c2{
                        padding-top:0pt;
                        padding-bottom:0pt;
                        line-height:1.15;
                        orphans:2;
                        widows:2;
                        text-align:center
                    }
                    .c10{
                        border-spacing:0;
                        border-collapse:collapse;
                        margin-right:auto
                    }
                    .c9{
                        padding-top:0pt;
                        padding-bottom:0pt;
                        line-height:1.0;
                        text-align:left
                    }
                    .c11{
                        background-color:#ffffff;
                        max-width:451.4pt;
                        padding:72pt 72pt 72pt 72pt
                    }
                    .c14{
                        padding-top:0pt;
                        padding-bottom:0pt;
                        line-height:1.15;
                        orphans:2;
                        widows:2;
                        text-align:center
                    }
                    .c20{
                        padding-top:0pt;
                        padding-bottom:0pt;
                        line-height:1.15;
                        orphans:2;
                        widows:2;
                        text-align:right
                    }
                    .c6{font-size:13pt;font-weight:700}
                    .c12{font-size:17pt;font-weight:700}
                    .c3{height:11pt}
                    .c8{height:0pt}
                    .title{
                        padding-top:0pt;
                        color:#000000;
                        font-size:26pt;
                        padding-bottom:3pt;
                        font-family:"Arial";
                        line-height:1.15;
                        page-break-after:avoid;
                        orphans:2;
                        widows:2;
                        text-align:left
                    }
                    .subtitle{
                        padding-top:0pt;
                        color:#666666;
                        font-size:15pt;
                        padding-bottom:16pt;
                        font-family:"Arial";
                        line-height:1.15;
                        page-break-after:avoid;
                        orphans:2;
                        widows:2;
                        text-align:left
                    }
                    li{
                        color:#000000;
                        font-size:11pt;
                        font-family:"Arial"
                    }
                    p{
                        margin:0;
                        color:#000000;
                        font-size:11pt;
                        font-family:"Arial"
                    }
                    h1{
                        padding-top:20pt;
                        color:#000000;
                        font-size:20pt;
                        padding-bottom:6pt;
                        font-family:"Arial";
                        line-height:1.15;
                        page-break-after:avoid;
                        orphans:2;
                        widows:2;
                        text-align:left
                    }
                    h2{
                        padding-top:18pt;
                        color:#000000;
                        font-size:16pt;
                        padding-bottom:6pt;
                        font-family:"Arial";
                        line-height:1.15;
                        page-break-after:avoid;
                        orphans:2;
                        widows:2;
                        text-align:left
                    }
                    h3{
                        padding-top:16pt;
                        color:#434343;
                        font-size:14pt;
                        padding-bottom:4pt;
                        font-family:"Arial";
                        line-height:1.15;
                        page-break-after:avoid;
                        orphans:2;
                        widows:2;
                        text-align:left
                    }
                    h4{
                        padding-top:14pt;
                        color:#666666;
                        font-size:12pt;
                        padding-bottom:4pt;
                        font-family:"Arial";
                        line-height:1.15;
                        page-break-after:avoid;
                        orphans:2;
                        widows:2;
                        text-align:left
                    }
                    h5{
                        padding-top:12pt;
                        color:#666666;
                        font-size:11pt;
                        padding-bottom:4pt;
                        font-family:"Arial";
                        line-height:1.15;
                        page-break-after:avoid;
                        orphans:2;
                        widows:2;
                        text-align:left
                    }
                    h6{
                        padding-top:12pt;
                        color:#666666;
                        font-size:11pt;
                        padding-bottom:4pt;
                        font-family:"Arial";
                        line-height:1.15;
                        page-break-after:avoid;
                        font-style:italic;
                        orphans:2;
                        widows:2;
                        text-align:left
                    }
                </style>
            </head>
            
            <body class="c11">
                <p class="c2">
                    <span class="c1">Sistema &Uacute;nico - Belo Horizonte</span>
                </p>
                
                <p class="c2">
                    <span class="c12">Receita - '.$data.'</span>
                </p>
                
                <p class="c0">
                    <span class="c4"></span>
                </p>
                
                <p class="c20">
                    <span class="c18">Essa receita foi gerada automaticamente pelo Sistema &Uacute;nico.</span>
                </p>
                <br>
                <p class="c5">
                    <span class="c6">M&eacute;dico Respons&aacute;vel:</span>
                    <span>&nbsp;'.$medicoNome.'</span>
                </p>
                
                <p class="c5">
                    <span class="c6">CRM:</span>
                    <span class="c4">&nbsp;'.$crm_medico.'</span>
                </p>
                <br>
                <p class="c5">
                    <span class="c6">Paciente:</span>
                    <span class="c4">&nbsp;'.$pacienteNome.'</span>
                </p>
                
                <p class="c0">
                    <span class="c4"></span>
                </p>
                <hr>
                <p class="c0">
                    <span class="c4"></span>
                </p>
                
                <p class="c0">
                    <span class="c4"></span>
                </p>
                
                <p class="c2">
                    <span class="c1">Informa&ccedil;&otilde;es</span>
                </p>
                
                <p class="c0">
                    <span class="c4"></span>
                </p>
                
                <a id="t.0dc4efa4018ff12fd52c5d776e8be9eafd4eefa7"></a>
                <a id="t.0"></a>
                <table class="c10">
                    <tbody>
                        <tr class="c8">
                            <td class="c7" colspan="1" rowspan="1">
                                <p class="c9">
                                    <span class="c4">Medicamento</span>
                                </p>
                            </td>
                            
                            <td class="c7" colspan="1" rowspan="1">
                                <p class="c9">
                                    <span class="c4">'.$medicamento.'</span>
                                </p>
                            </td>
                        </tr>
                        
                        <tr class="c8">
                            <td class="c7" colspan="1" rowspan="1">
                                <p class="c9">
                                    <span class="c4">Posologia</span>
                                </p>
                            </td>
                            
                            <td class="c7" colspan="1" rowspan="1">
                                <p class="c9">
                                    <span class="c4">'.$posologia.'</span>
                                </p>
                            </td>
                        </tr>
                        
                        <tr class="c8">
                            <td class="c7" colspan="1" rowspan="1">
                                <p class="c9">
                                    <span class="c4">Per&iacute;odo em dias</span>
                                </p>
                            </td>
                            
                            <td class="c7" colspan="1" rowspan="1">
                                <p class="c9">
                                    <span class="c4">'.$periodo.'</span>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <p class="c0">
                    <span class="c4"></span>
                </p>
                
                <p class="c0">
                    <span class="c4"></span>
                </p>
                
                <p class="c0">
                    <span class="c4"></span>
                </p>
                
                <p class="c0">
                    <span class="c4"></span>
                </p>
                
                <p class="c0">
                    <span class="c4"></span>
                </p>
                <hr>
                <p class="c0">
                    <span class="c4"></span>
                </p>
                
                <p class="c0">
                    <span class="c4"></span>
                </p>
                
                <p class="c0">
                    <span class="c4"></span>
                </p>
                
                <p class="c0">
                    <span class="c4"></span>
                </p>
                
                <p class="c0">
                    <span class="c4"></span>
                </p>
                <p class="c2">
                    <span class="c4">______________________________________________________</span>
                </p>
                
                <p class="c2">
                    <span class="c4">Assinatura M&eacute;dico Respons&aacute;vel</span>
                </p>
                
                <p class="c2 c3">
                    <span class="c4"></span>
                </p>
                
                <p class="c2 c3">
                    <span class="c4"></span>
                </p>
                
                <p class="c2">
                    <span class="c4">______________________________________________________</span>
                </p>
                
                <p class="c2">
                    <span class="c4">Assinatura Farmac&ecirc;utico Respons&aacute;vel</span>
                </p>
                <br>
                <br>
                <br>
                <br>
                <p class="c14">
                    <span>Copyright </span>
                    <span class="c2 c15">&copy; Sistema &Uacute;nico</span>
                </p>
            </body>
        </html>';


        $domPDF->loadHtml($html);

        $domPDF->setPaper('A4', 'portrait');

        $domPDF->render();

        $documentName = "Receita_" . $paciente_cpf . ".pdf";

        $domPDF->stream($documentName);
    }
?>