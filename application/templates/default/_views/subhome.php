<?php 
    if(strlen(trim($pagina->content)) > 0) {
?>
<article>
    <?php echo $pagina->content; ?>
    <?php echo $pagina->langs[$current_lang]->description; ?>
</article>
<?php 
    }
?>
