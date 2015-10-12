<div class="search_left">
    <div class="search">
        <h4>Estado</h4>
        ##promociones::search_filter##
    </div>
    <div class="caja">
        <h4>Tags Cloud</h4>
        ##tags::display##
    </div>
</div>
<div class="search_right">
    <div class="titular_contenido ">
         <h3><?php echo $pagina->langs['es']->title; ?></h3>
    </div>
    ##promociones::search|<?php echo $pagina->get_parameter('num_promos'); ?>|<?php echo implode("|", $arguments) ?>##
</div>