<?php
    
require("class.phpmailer.php");
  
    $mail = new PHPMailer();
    $mail->Host = "localhost";
    $mail->From = "alguien@jardinurbano.com.uy";
    $mail->FromName = "Registro curso Huerta Orgánica";
    $mail->Subject = "Registro curso Huerta Orgánica";

    $mail->AddAddress('pablo@umo.uy');

    $mail->CharSet = 'UTF-8';

    $body = '<html>
            <head>
              <title>Registro</title>
            </head>
            <body>
               Nombre: '.$_POST['nombre'].' <br>
               Email: '.$_POST['email'].'<br>
               Celular: '.$_POST["celular"].'<br>     
            </body>
            </html>';
    $mail->Body = $body;
    $mail->IsHTML(true);
    $mail->Send();


    $mail2 = new PHPMailer();
    $mail2->Host = "localhost";
    $mail2->From = "alguien@jardinurbano.com.uy";
    $mail2->FromName = "RRegistro curso Huerta Orgánica";
    $mail2->Subject = "Descargá el programa del curso: Huerta Orgñánica";
    $mail2->AddAddress($_POST['email']);
    $mail2->CharSet = 'UTF-8';

    $body2 =  "
   <html>
   <head>
   <meta charset='utf-8'>
   <title>Documento sin título</title>
   </head>

   <body>
   <table width='650' border='0' cellspacing='0' cellpadding='0'>
     <tr>
       <td><h1 style='font-family: Helvetica, Arial, sans-serif; text-align: center;'>Descargá el programa del Curso de Huerta Orgñánica</h1></td>
     </tr>
     <tr>
       <td><p style='font-family: Segoe, Verdana, sans-serif; text-align: center; font-size: 18px;'>A continuación te dejamos el programa del curso para que lo puedas consultar cuando lo desees.</p><br><br><br></td>
     </tr>
     <tr>
       <td align='center'><a href='#' style='padding:15px;text-decoration:none;color:#FFF;text-align: center;background: #8CC542;font-family: Segoe, Verdana, sans-serif;display: inline-block;'>DESCARGAR PROGRAMA</a></td>
     </tr>
   </table>
   </body>
   </html>";
    $mail2->Body = $body2;
    $mail2->IsHTML(true);
    $mail2->Send();
pablo?>