

	
    

	<div class="containerLogin">
      	<form id="loginTools" action="<?= site_url(FRONT_SLUG.'/login/in'); ?>" name="loginTools" method="post" accept-charset="utf-8">
        	<h1>TOOLS</h1>
        	<input type="text" id="userTools" name="email" value="E-mail" onblur="if (this.value == '') {this.value = 'E-mail';}"  onfocus="if (this.value == 'E-mail') {this.value = '';}" /><!--class error border red-->
        	<input type="password" id="passTools" type="password" name="password" value="Password" onblur="if (this.value == '') {this.value = 'Password';}"  onfocus="if (this.value == 'Password') {this.value = '';}" /><!--class error border red-->

            <!--
            <input class="remember" type="checkbox" name="remember" value="1" />
            <label for="remember" class="remember">Recordarme</label>	
            <label><a href="<?= site_url(FRONT_SLUG.'/users/recover')?>">Recuperar la contraseña</a></label>
            -->
        
        	<span id="loginButton" onclick="loginTools.submit()">Login <span class="arrowRight"></span></span>
            <!--<input class="button" type="submit" name="submit" value="Login" />-->
      	</form>
    </div><!--containerLogin-->
    
    
    <?php if ($this->session->flashdata('state')) { ?>
    <div id="errorLogin">
    	<span class="icon"></span>
        <p class="message"><?= $this->session->flashdata('state'); ?></p>
        <script>
            var idIntervalMessage = setInterval(function(){ 
                $("#errorLogin").fadeOut();
                clearInterval(idIntervalMessage);
            } ,5000);
        </script>
    </div>
	<?php } ?>
    
    
    <!--
    <form action="<?= site_url(FRONT_SLUG.'/login/in'); ?>"  class="loginform">            
        <ul>
            <li>
                <input class="email" type="text" name="email" value="E-mail" onblur="if (this.value == '') {this.value = 'E-mail';}"  onfocus="if (this.value == 'E-mail') {this.value = '';}" />
            </li>
            <li>
                <input class="password" type="password" name="password" value="Contraseña" onblur="if (this.value == '') {this.value = 'Contraseña';}"  onfocus="if (this.value == 'Contraseña') {this.value = '';}"  />
            </li>
            <li>
                <input class="remember" type="checkbox" name="remember" value="1" />
                <label for="remember" class="remember">Recordarme</label>
                <label><a href="<?= site_url(FRONT_SLUG.'/users/recover')?>">Recuperar la contraseña</a></label>
            </li>
        </ul>
        <span class="botones"><input class="button" type="submit" name="submit" value="Iniciar sesión" /></span>
        <div class="clear"></div>
    </form>
    -->     
    
    <!--
    <div id="errorLogin" class="hide">
      	<span class="icon"></span>
      	<p>El usuario o la contrase&ntilde;a son erroneas</p>
    </div>
    -->
  
  
	 
    
    
    
    
