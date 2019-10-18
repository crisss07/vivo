<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado de no Catastro</title>

    <style type="text/css">
        @page {

            margin: 0px;
        }

        body {


            background-image: url('<?php echo base_url(); ?>public/assets/reportes/menbrete.png');

            background-repeat: no-repeat; 


        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            font-size: 13px;
            line-height:14px;
            
            
        }



        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .invoice {
            padding:90px;
        }


    

     
        .tit1{
            font-size: 14px;
            line-height:26px;
            font-style: italic; 
            
        }
         .tit2{
            font-size: 24px;
            line-height:26px;
            font-style: italic;
            font-weight:bold;
            color:#377091;
            
        }


    </style>


</head>
<body>

    <div >
        <br><br><br>
    </div>







    <div class="invoice">
        <h3 align="center" >SOLICITUD DE INICIO DE TRAMITE</h3>

        <hr>
        <p class="tit2" align="center">Numero de Tramite: 0001</p>
        <hr>

        <p></p><br>

        <table width="100%">
            <tr>
                <td class="tit1" style="background-color: #ebf3f3;border-collapse: collapse;padding: 2px;">            
                   <p></p>
                   DATOS DEL SOLICITANTE:
               </td> 
               <td class="tit1" style="background-color: #ebf3f3;border-collapse: collapse;padding: 2px;">
                
            </td>
        </tr>
        <tr>
            <td class="tit1">
                Nombre: 
            </td>                    
            <td class="tit1">
                <?php echo $datos_certificado->nombres.' '.$datos_certificado->paterno.' '.$datos_certificado->materno; ?>

            </td>
        </tr>
        <tr style="background-color: #ebf3f3;border-collapse: collapse;padding: 2px;">
            <td class="tit1">
                Carnet de Identidad:
            </td>
            <td class="tit1">
                <?php echo $datos_certificado->ci; ?>
            </td>
        </tr>
        <tr >
            <td class="tit1">
                 Fecha de Nacimiento
            </td>
            <td class="tit1">
                <?php echo $datos_certificado->fec_nacimiento; ?>
            </td>
        </tr>
        <tr style="background-color: #ebf3f3;border-collapse: collapse;padding: 2px;">
            <td class="tit1">
               Numero de Celular:
            </td>
            <td class="tit1">
                <?php echo $datos_certificado->telefono_celular; ?>
            </td>
        </tr>
        <tr>
            <td class="tit1">
                Domicilio
            </td>
            <td class="tit1">
                <?php echo $datos_certificado->direccion; ?>
            </td>
        </tr>
        <tr style="background-color: #ebf3f3;border-collapse: collapse;padding: 2px;">
            <td class="tit1">
                Correo Electronico
            </td>
            <td class="tit1">
                <?php echo $datos_certificado->email; ?>
            </td>
        </tr>
        <tr>
            <td class="tit1">
                Departamento
            </td>
            <td class="tit1">
                <?php echo $datos_certificado->departamento; ?>

            </td>
        </tr>
  
      


    </table>






</div>

</body>
</html>