<style type="">
.clearfix:after {
    clear: both;
}
.clearfix:before, .clearfix:after {
    content: "";
    display: table;
}

.photo{
}

.oculta2{display:none;}

.photo img, #tumblelog img {
    display: block;
}
.col3 img {
    /*max-width: 275px;*/
}

.col3 {
  /*  width: 275px; */
}

#containerimg div{position:relative;}

#containerimg div span{
    position:absolute; 
    background: url(<?php echo base_url() ?>assets/css/www/images/play_video.png) no-repeat left top;
    width:37px;
    height:37px;
}
#containerimg div span{ 
    top:40%;
    left:40%;
}
#containerimg div.photo:hover{
    /*background: none repeat scroll 0 0 #0396d6;*/
}

</style>
<h2 class="page-title"><?php echo $pagina->langs['es']->title; ?></h2>
<div class="clear"></div>
<div class="search_left">
    ##secciones::galeria_filter|<?php echo $menu->slug; ?>##
</div>
<div class="search_right" style="padding: 0; margin-left:20px; width: 660px; background-color: #F1F3F2;">
    ##galeria::get_all_media## 
</div>
    
</div>
<script>
   $(function(){
    var $container = $('#containerimg');
    $container.imagesLoaded( function(){
      $container.masonry({
        itemSelector : '.photo',
        columnWidth: 85
      });
    });
    if($("a[rel='modo_estandard']").length>0){$("a[rel='modo_estandard']").colorbox({iframe:true, width:"700", height:"385", opacity:"0.5", scrolling: true});}
   });
</script>