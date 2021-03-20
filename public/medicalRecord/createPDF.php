<?php
    include_once("../../data/db_connection.php");

    require_once 'domPDF/vendor/autoload.php';

    use Dompdf\Dompdf;

    if(isset($_GET["id"]))
    {
        $consulta_id = $_GET["id"];
        $sqlConsulta = "SELECT * FROM consulta WHERE consulta_id = " . $consulta_id;
        $resultado = $connection->query($sqlConsulta);
        $consulta = $resultado->fetch_assoc();
        $consultaData = $consulta["data_consulta"];
        $paciente_cpf = $consulta["paciente_cpf"];
        $crm_medico = $consulta["crm_medico"];
        
        $sqlPaciente = "SELECT * FROM paciente WHERE CPF = " . $paciente_cpf;
        $resultado = $connection->query($sqlPaciente);
        $paciente = $resultado->fetch_assoc();
        $pacienteNome = $paciente["nome"];
        $pacienteIdade = $paciente["idade"];
        $pacienteContato = $paciente["contato"];
        $pacienteRua = $paciente["rua"];
        $pacienteBairro = $paciente["bairro"];
        $pacienteNumero = $paciente["numero"];

        $sqlMedico = "SELECT * FROM medico WHERE CRM = '" . $crm_medico . "'";
        $resultado = $connection->query($sqlMedico);
        $medico = $resultado->fetch_assoc();
        $medicoNome = $medico["nome"];
        $medicoIdade = $medico["idade"];
        
        $sqlEspecialidade = "SELECT * FROM especialidade_medico WHERE especialidade_id = " . $medico["especialidade_id"];
        $resultado = $connection->query($sqlEspecialidade);
        $especialidade = $resultado->fetch_assoc();
        $especialidade = $especialidade["descricao"];
        
        $sqlProntuario = "SELECT * FROM prontuario WHERE id_consulta = " . $consulta_id;
        $resultado = $connection->query($sqlProntuario);
        $prontuario = $resultado->fetch_assoc();
        $prontuarioProblema = $prontuario["problema"];
        $prontuarioSituacao = $prontuario["situacao"];
        $prontuarioAnalise = $prontuario["analise"];
        $prontuarioObservacoes = $prontuario["observacoes"];
        
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y H:i:s', time());  
    
        $domPDF = new Dompdf();

        $html = '
        <!DOCTYPE html>
        <html lang="pt-br">
            <head>
            <title>Prontuário</title>
                <meta content="text/html; charset=utf8mb4_general_ci" http-equiv="content-type">
                <style>
                    ol{
                        margin:0;padding:0
                    }
        
                    table td,table th{
                        padding:0
                    }
                    .c17{
                        border-right-style:solid;
                        padding:1pt 1pt 1pt 1pt;
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
                        width:136.5pt;
                        border-top-color:#000000;
                        border-bottom-style:solid
                    }
        
                    .c12{
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
                        width:451.4pt;
                        border-top-color:#000000;
                        border-bottom-style:solid
                    }
        
                    .c0{
                        color:#000000;
                        font-weight:400;
                        text-decoration:none;
                        vertical-align:baseline;
                        font-size:14pt;
                        font-family:"Arial";
                        font-style:normal
                    }
        
                    .c5{
                        color:#000000;
                        text-decoration:none;
                        vertical-align:baseline;
                        font-size:14pt;
                        font-family:"Arial";
                        font-style:normal
                    }
                    
                    .c8{
                        color:#000000;
                        text-decoration:none;
                        vertical-align:baseline;
                        font-size:18pt;
                        font-family:"Arial";
                        font-style:normal
                    }
                    
                    .c1{
                        padding-top:0pt;
                        padding-bottom:0pt;
                        line-height:1.15;
                        orphans:2;
                        widows:2;
                        text-align:left
                    }
                    
                    .c4{
                        color:#000000;
                        text-decoration:none;
                        vertical-align:baseline;
                        font-size:17pt;
                        font-family:"Arial";
                        font-style:normal
                    }
                    
                    .c10{
                        padding-top:0pt;
                        padding-bottom:0pt;
                        line-height:1.15;
                        orphans:2;
                        widows:2;
                        text-align:right
                    }
                    
                    .c14{
                        padding-top:0pt;
                        padding-bottom:0pt;
                        line-height:1.15;
                        orphans:2;
                        widows:2;
                        text-align:center
                    }
                    
                    .c11{
                        border-spacing:0;
                        border-collapse:collapse;
                        margin-right:auto
                    }
                    .c6{
                        padding-top:0pt;
                        padding-bottom:0pt;
                        line-height:1.0;
                        text-align:left
                    }
                    
                    .c3{
                        background-color:#ffffff;
                        max-width:451.4pt;
                        padding:72pt 72pt 72pt 72pt
                    }
                    
                    .c15{
                        background-color:#ffffff;
                        font-size:10.5pt
                    }
                    
                    .c18{
                        font-size:7pt
                    }
                    
                    .c16{
                        height:83.9pt
                    }
                    
                    .c2{
                        font-weight:700
                    }
                    
                    .c7{
                        height:11pt
                    }
                    
                    .c9{
                        height:74.1pt
                    }
                    
                    .c13{
                        height:0pt
                    }
                    
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
                        margin:0;color:#000000;
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
    
            <body class="c3">
                <p class="c14">
                    <span class="c4 c2">Sistema &Uacute;nico - Belo Horizonte</span>
                </p>
                
                <p class="c14">
                    <span class="c2 c8">Prontu&aacute;rio M&eacute;dico - '. $data .'</span>
                </p>
                
                <p class="c14 c7">
                    <span class="c2 c4"></span>
                </p>
                
                <p class="c10">
                    <span class="c18">Esse prontu&aacute;rio foi gerado automaticamente pelo Sistema &Uacute;nico.</span>
                </p>
                
                <hr>
                <br>
                <p class="c1">
                    <span class="c5 c2">M&eacute;dico Respons&aacute;vel</span>
                </p>
                
                <a id="t.2f307608e43e26ce0006aba0eeec6bf8145a9ee4"></a>
                <a id="t.0"></a>
                <table class="c11">
                    <tbody>
                        <tr class="c13">
                            <td class="c12" colspan="1" rowspan="1">
                                <p class="c6">
                                    <span class="c0">'.$medicoNome.'</span>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                
                <p class="c1 c7">
                    <span class="c0"></span>
                </p>
                <br>
                <p class="c1">
                    <span class="c2">CRM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="c0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </p>
                
                <a id="t.5fab49f8414fc78ba3562cf9e75f108ab9a25f9c"></a>
                <a id="t.1"></a>
                <table class="c11">
                    <tbody>
                        <tr class="c13">
                            <td class="c17" colspan="1" rowspan="1">
                                <p class="c6">
                                    <span class="c0">'.$crm_medico.'</span>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <p class="c1 c7">
                    <span class="c0"></span>
                </p>
                <br>
                <hr>
                <br>
                <p class="c1">
                    <span class="c2 c5">Paciente</span>
                </p>
                
                <a id="t.5fecfd52dbde5927a1db5bc5c84ffa31222ffba0"></a>
                <a id="t.2"></a>
                <table class="c11">
                    <tbody>
                        <tr class="c13">
                            <td class="c12" colspan="1" rowspan="1">
                                <p class="c6">
                                    <span class="c0">'.$pacienteNome.'</span>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <p class="c1 c7">
                    <span class="c0"></span>
                </p>
                <br>
                
                <p class="c1">
                    <span class="c2 c5">CPF</span>
                    <span class="c0">: '.$paciente_cpf.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="c2 c5">Contato</span>
                    <span class="c0">: '.$pacienteContato.'</span>
                </p>
                <br>
                
                <p class="c1">
                    <span class="c5 c2">Endere&ccedil;o</span>
                </p>
                
                <a id="t.0bfa3a26745407dd70ac7ec98396d93d400926ba"></a>
                
                <a id="t.3"></a>
                <table class="c11">
                    <tbody>
                        <tr class="c13">
                            <td class="c12" colspan="1" rowspan="1">
                                <p class="c6">
                                    <span class="c0">'.$pacienteRua.'</span>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <p class="c1 c7">
                    <span class="c0"></span>
                </p>
                <br>
                <p class="c1">
                    <span class="c2 c5">Bairro</span>
                    <span class="c0">: '.$pacienteBairro.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="c2 c5">N&uacute;mero</span>
                    <span class="c0">: '.$pacienteNumero.'</span>
                </p>
                <p class="c1 c7">
                    <span class="c0"></span>
                </p>
                <hr>
                <br>
                <p class="c1">
                    <span class="c5 c2">Problema</span>
                </p>
                
                <a id="t.8f84220c589c48910fa40b767fc59ccf90991be7"></a>
                <a id="t.4"></a>
                <table class="c11">
                    <tbody>
                        <tr class="c9">
                            <td class="c12" colspan="1" rowspan="1">
                                <p class="c6">
                                    <span class="c0">'.$prontuarioProblema.'</span>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="c1 c7">
                <span class="c0"></span>
                </p>
                <br>
                <br>
                <br>
                <br>
                
                <p class="c1">
                    <span class="c2 c5">Situa&ccedil;&atilde;o</span>
                    <span class="c0">: '.$prontuarioSituacao.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span class="c2 c5">An&aacute;lise</span>
                    <span class="c0">: '.$prontuarioAnalise.'</span>
                </p>
                <br>
                
                <p class="c1">
                    <span class="c5 c2">Observa&ccedil;&otilde;es</span>
                </p>
                
                <a id="t.89b45d81e703c02dff14d42c1972a7a4a82da465"></a>
                
                <a id="t.5"></a>
                <table class="c11">
                    <tbody>
                        <tr class="c16">
                            <td class="c12" colspan="1" rowspan="1">
                                <p class="c6">
                                    <span class="c0">'.$prontuarioObservacoes.'</span>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <br>
                <br>
                <p class="c14">
                    <span>Copyright </span>
                    <span class="c2 c15">&copy; Sistema &Uacute;nico</span>
                </p>
            </body>
        </html>
        ';


        $domPDF->loadHtml($html);

        $domPDF->setPaper('A4', 'portrait');

        $domPDF->render();

        $documentName = "Prontuario_" . $paciente_cpf . ".pdf";

        $domPDF->stream($documentName);
    }
?>