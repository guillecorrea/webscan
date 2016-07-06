<?php
session_name("WEBSCAN");
session_start();
$updst = "?v=".time();
?>

<!DOCTYPE html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta name="theme-color" content="#006eb7">
    <meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <link rel="shortcut icon" href="img/scanner.png" type="image/x-icon" />
	<link rel="icon" sizes="192x192" href="img/scanner.png">

    <title>Web Scanner</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css<?php echo $updst; ?>" rel="stylesheet">
  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<nav class="navbar navbar-default navbar-fixed-top " >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="Brand" src="img/scanner.png" height=24px>
      </a>
       
    </div>
  </div>
</nav>

<div class="row" style="margin-top:50px;" >
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img id=idimgscan src="img/scanner_gris.png" alt="..."  >
      <div class="caption" style="text-align:center;">
      <p>
         <div class="alert alert-info" role="alert" style="display:none;"> Digitalizando ... </div>
        <div class="alert alert-warning" role="alert" style="display:none;">...</div>
        <div class="alert alert-danger" role="alert" style="display:none;"> Error al digitalizar </div>
      </p>
          <p >
     
          <a href="#" class="btn btn-primary" role="button" dat-bot=escanear >Escanear </a>
     
          <a href="#" class="btn btn-default disabled" download target="_blank" role="button" dat-bot=descargarimg > 
          
          <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
          Imagen</a>
          <a href="#" class="btn btn-default disabled "  download target="_blank" role="button" dat-bot=descargarpdf >
          <span class="glyphicon glyphicon-download" aria-hidden="true"></span>  Pdf</a>
          <a href="#" class="btn btn-default disabled "   role="button" dat-bot=print >
          <span class="glyphicon glyphicon-print" aria-hidden="true"></span>  </a>
          </p>
      </div>
    </div>
  </div>
</div>



     <script src="js/jquery.js<?php echo $updst; ?>&v=1.12.0"></script>
   <script src="js/bootstrap.min.js<?php echo $updst; ?>"></script>
    <script src="js/webscan.js<?php echo $updst; ?>"></script>


  </body>
  </html>


