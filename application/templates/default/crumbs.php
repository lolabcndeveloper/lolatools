<?php 
    //$current_url = base_url().$current_lang."/";
    $current_url = base_url();
?>
<p><?php echo $this->lang->line('breadcrumbs.estasen'); ?>: 
    <a href="<?php echo $current_url ?>"><?php echo $this->lang->line('header.webtitle'); ?></a>

    <?php if ( isset($crumbs) && is_array($crumbs) ){ ?>
    
        <?php if ( count($crumbs) > 0 ) { ?>
            &nbsp;&gt;&nbsp;
        <?php } ?>

        <?php foreach ( $crumbs as $key => $c ){ 
            $current_url .= $c['link']."/";
        ?>
            <?php if ( $c['link'] == '' ){ ?>
                <span><?php echo $c['label']; ?></span>
            <?php } else { ?>
                <a href="<?php echo $current_url; ?>"><?php echo $c['label']; ?></a>    
            <?php } ?>
            
            <?php if ( $key < count($crumbs)-1 ) { ?>
                &nbsp;&gt;&nbsp;
            <?php } ?>
        <?php } ?>
    <?php } ?>        
</p>
