<div id="login-box">
    <header id="main">
        <div id="login-logo"></div>
    </header>
    
    <?php 
        if ($this->session->flashdata('state')){
            echo "<div class=\"message\">".$this->session->flashdata('state')."</div>";
    ?>
    <script>var idIntervalMessage = setInterval(function(){ $(".message").fadeOut();clearInterval(idIntervalMessage);} ,5000);</script>
    <?php
         }
    ?>
    
    <form action="<?php echo site_url(ADMIN_SLUG.'/users/recover_do'); ?>" method="post" accept-charset="utf-8" class="loginform">            
        <ul>
            <li>
                <input class="email" type="text" name="email" value="E-mail" onblur="if (this.value == '') {this.value = 'E-mail';}"  onfocus="if (this.value == 'E-mail') {this.value = '';}" />
            </li>
        </ul>
        <span class="botones"><input class="button" type="submit" name="submit" value="Recuperar contraseña" /></span>
        <span class="botones"><input class="button" type="button" name="volver" value="Volver" onclick="document.location='<?php echo base_url().ADMIN_SLUG;?>/login'" /></span>
        <div class="clear"></div>
    </form>
</div>