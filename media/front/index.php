<?php
  $idBody =   ( isset( $_GET[ 'idBody' ] ) && !empty( $_GET[ 'idBody' ] ) ) ? $_GET[ 'idBody' ] : 'home'; //por defecto seccion home
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>LOLA Tools</title>

    <?php include( './includes/headContent.php' ); ?>

</head>

<body id="<?=$idBody?>" class="color5"> <!-- opciones: home, video, mecanica, tarjetas | con esto tambien marco la seccion activa en el menu-->
 
 <div id="wrapper">
  
  <?php include( './includes/header.php' ); ?>
  
  <div class="content">
    <?php include( './includes/'. $idBody .'.php' ); //home | searchResult | create  ?>
  </div><!--content-->
  
    <?php include( './includes/footerContent.php' ); ?>
 </div><!--wrapper-->
  
</body>
</html>