<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>LOLA Tools</title>

    <?php include( './includes/headContent.php' ); ?>

</head>

<body id="login" class="color5"> <!-- opciones: home, video, mecanica, tarjetas | con esto tambien marco la seccion activa en el menu-->
 
 <div id="wrapper">
  
  <div class="content">
    <div class="containerLogin">
      <form id="loginTools" action="" name="loginTools">
        <h1>
          TOOLS
        </h1>
        <input type="text" id="userTools" name="userTools" placeholder="user" /><!--class error border red-->
        <input type="password" id="passTools" name="passTools" /><!--class error border red-->
        
        <span id="loginButton">
          Login <span class="arrowRight"></span>
        </span>
      </form>
    </div><!--containerLogin-->
    <div id="errorLogin" class="hide"><!-- para mostrar quitar la clase hide-->
      <span class="icon"></span>
      <p>
        El usuario o la contrase&ntilde;a son erroneas
      </p>
    </div>
  </div><!--content-->
  
    <?php include( './includes/footerContent.php' ); ?>
 </div><!--wrapper-->
  
</body>
</html>