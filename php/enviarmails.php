<?php
require("class.phpmailer.php");
  
    $mail = new PHPMailer();
    $mail->Host = "localhost";
    $mail->From = "jardinurbano@montevideo.com.uy";
    $mail->FromName = "Registro curso Huerta Orgánica";
    $mail->Subject = "Jardín Urbano | Curso Huerta Organica Nov17";
    $mail->AddAddress('jardinurbano@montevideo.com.uy');
    $mail->AddBCC("magnetizadoss@gmail.com");

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
    $mail2->From = "jardinurbano@montevideo.com.uy";
    $mail2->FromName = "Registro curso Huerta Orgánica";
    $mail2->Subject = "Descargá el programa del curso: Huerta Orgánica";
    $mail2->AddAddress($_POST['email']);
    $mail2->CharSet = 'UTF-8';

    $body2 =  "
   <html>
   <head>
   <meta charset='utf-8'>
   <title>Registro curso Huerta Orgánica</title>
   </head>
   <body>
   <table width='650' border='0' cellspacing='0' cellpadding='0'>
     <tr>
       <td><h1 style='font-family: Helvetica, Arial, sans-serif; text-align: center;'>Descargá el programa del Curso de Huerta Orgánica</h1></td>
     </tr>
     <tr>
       <td><p style='font-family: Segoe, Verdana, sans-serif; text-align: center; font-size: 18px;'>A continuación te dejamos el programa del curso para que lo puedas consultar cuando lo desees.</p><br><br><br></td>
     </tr>
     <tr>
       <td align='center'><a href='http://jardinurbano.com.uy/landing/pdf/curso-huerta-organica-2017.pdf' style='padding:15px;text-decoration:none;color:#FFF;text-align: center;background: #8CC542;font-family: Segoe, Verdana, sans-serif;display: inline-block;'>DESCARGAR PROGRAMA</a></td>
     </tr>
   </table>
   </body>
   </html>";
    $mail2->Body = $body2;
    $mail2->IsHTML(true);
    $mail2->Send();

    $Nombre=$_POST['nombre'];
    $Email=$_POST['email'];
    $Celular=$_POST['celular'];
    $dbhost='localhost';
    $dbschema='jardinur_leads';
    $dbuser='jardinur_landmin';
    $dbuserpass='Umo EC2017';

error_reporting(E_ALL);
ini_set('log_errors', 'on');
    if (isset($_POST['nombre']) && !empty($_POST['nombre']) &&
        isset($_POST['email']) && !empty($_POST['email']))
     {


      $db = new PDO('mysql:dbname='.$dbschema.';host='.$dbhost, $dbuser, $dbuserpass);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $db->prepare("INSERT INTO leads (id, Nombre, Email, Celular) VALUES (null, :nombre, :email, :celular)");
      $stmt->execute(array(
          ':nombre' => $Nombre,
          ':email' => $Email,
          ':celular' => $Celular,
      ));
      header("Location: ../gracias.php");
    
    } else{
      echo "Error al enviar los datos";
    }

?>