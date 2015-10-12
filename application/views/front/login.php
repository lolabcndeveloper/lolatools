<div id="login-box">
    <header id="main">
        <div id="login-logo"></div>
    </header>
    
    <?php if ($this->session->flashdata('state')) { ?>
    <div class="message"><?= $this->session->flashdata('state'); ?></div>
    <script>
		var idIntervalMessage = setInterval(function(){ 
			$(".message").fadeOut();
			clearInterval(idIntervalMessage);
		} ,5000);
    </script>
    
    <?php } ?>
    
    <form action="<?= site_url(FRONT_SLUG.'/login/in'); ?>" method="post" accept-charset="utf-8" class="loginform">            
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
    <!-- <div class="legal"><a href="http://www.tentecms.com">© TenteCMS</a></div> -->
</div>