<h1>
    <a tabindex="1" accesskey="1" title="Ir a página de inicio [Tecla de acceso directo 1]" href="<?php echo base_url(); ?>">
        Vive Movistar
    </a>
</h1>
<div id="logo">
    <a href="http://www.movistar.es/">Movistar.es</a>
</div>
<a tabindex="2" id="skip" accesskey="2" href="#contenido">
    Saltar la navegación e ir directamente al contenido [Tecla de acceso directo 2]
</a>
<hr>
<div id="caja_buscar" role="navigation" aria-label="Menu idiomas">
    <form  id="formbuscador" action="<?php echo base_url(); ?>buscar">
        <div id="buscar"> 
            <span class="oculto">
                <label for="busqueda">Buscar</label>
            </span>
            <input tabindex="3" type="text" size="15" value="Buscar" accesskey="5" id="busqueda" class="input_buscar" name="q" >
            <input name="bbenviar" type="submit" class="botonBuscar" alt="Buscar" value="Enviar" >
        </div>
    </form>
</div>

<nav id="menu_principal">
    ##menus::nested_menu|principal|1|##
    <div class="clear" ></div>
</nav>

<nav id="migas" class="layout_<?php echo $layout; ?>">
    <?php echo $crumbs; ?>
</nav>
