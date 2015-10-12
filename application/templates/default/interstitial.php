<?php
    /*
    * CONFIGURACIÓN DEL INTERSTITIAL
    */
    
    $interstital_obj = new stdClass();
    $interstital_obj->extension = "mov";
    //$interstital_obj->url = "http://jupiter.renovatio-comunicacion.com/promocionesmovistar/assets/images/slideshow/32.mov";
    //$interstital_obj->screenshot = "http://jupiter.renovatio-comunicacion.com/promocionesmovistar/assets/images/slideshow/alt_32.jpg";
?>
<script>
    $(document).ready(function(){
        $("#close_interstitial").click(function(){
           $("#interstitial").remove();
        });
    });
</script>
<style type="text/css">
    #interstitial { height:300px; width:970px; position:absolute; z-index:9998; margin:0 5px; background-color:#fff;}
    #close_interstitial { position:absolute; z-index:9999;}
</style>
<div id="interstitial" >
    <a href="#" id="close_interstitial">Cerrar</a>
    <?php
        if ( $interstital_obj->extension == 'swf' ){ ?>
        <div>    
            <!--[if !IE]> -->
            <object type="application/x-shockwave-flash"
                data="<?php echo $interstital_obj->screenshot; ?>" width="970" height="300">
                <!-- <![endif]-->

                <!--[if IE]>
                <object class="flashVMS_inters" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
                codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
                width="970" height="300">
                <param name="movie" value="<?php echo $interstital_obj->url; ?>" />
                <!-->
                
                <param name="loop" value="true" />
                <param name="menu" value="false" />
                <param name="wmode" value="transparent" />
                <img alt="" src="<?php echo $interstital_obj->screenshot; ?>" style="position:absolute;left:0;" width="970" height="300" 
                     title="Video playback is not supported by your browser" />
            </object>
            <!-- <![endif]-->                            
        </div>
        <?php } else if ( in_array($interstital_obj->extension,array('jpg','gif','png') )) {  ?>
        <div>
            <img src="<?php echo $interstital_obj->url; ?>"/>
        </div>
        <?php } else if ( in_array($interstital_obj->extension,array('flv','f4v','mp4','mov')) ){ ?>
        <div> 
            <?php  if ( $interstital_obj->extension == 'flv' OR 
                    strpos($this->agent->agent_string(), "Firefox") OR 
                    strpos($this->agent->agent_string(), "MSIE")  OR 
                    strpos($this->agent->agent_string(), "Chrome") ) { ?>
                    <object class="<?php echo (strpos($this->agent->agent_string(), "MSIE"))? "flashVMS_inters" : "flashV_inters"; ?>" type="application/x-shockwave-flash" data="<?php echo base_url()."assets/player_movistar/player.swf" ?>" width="970" height="300" style="position:relative;">
                        <param name="movie" value="<?php echo base_url()."assets/player_movistar/player.swf" ?>" />
                        <param name="allowFullScreen" value="true" />
                        <param name="wmode" value="transparent" />
                        <param name="flashVars" value="autoplay=1&amp;controls=false&amp;fullScreenEnabled=true&amp;loop=false&amp;thumbnail=<?php echo $interstital_obj->screenshot; ?>&amp;video=<?php echo $interstital_obj->url; ?>&amp;skin=<?php echo base_url();?>assets/player_movistar/mySkin.swf" />
                        <embed src="<?php echo base_url()."assets/player_movistar/player.swf" ?>" 
                            width="970" 
                            height="300" 
                            style="position:relative;"  
                            flashVars="autoplay=1&amp;controls=true&amp;fullScreenEnabled=true&amp;loop=false&amp;poster=<?php echo $interstital_obj->screenshot; ?>&amp;src=<?php echo $interstital_obj->url; ?>&am;skin=<?php echo base_url();?>assets/player_movistar/mySkin.swf"    
                            allowFullScreen="true" 
                            wmode="transparent" 
                            type="application/x-shockwave-flash" 
                            pluginspage="http://www.adobe.com/go/getflashplayer_en" />
                        <img alt="" src="<?php echo $interstital_obj->screenshot; ?>" style="position:absolute;left:0;" 
                             width="970" height="300" title="Video playback is not supported by your browser" />
                    </object>
                    <script src="<?php echo base_url()."assets/player/html5ext.js" ?>" type="text/javascript"></script>                           

             <?php } else { ?>

                    <?php if ( strpos($this->agent->agent_string(), "iPad") ) { ?>
                        <script>
                            var estado_inters = "Play";
                            var vid_inters;
                            var reloadTimer_inters;

                            function playVideo_inters() {
                                console.log('playVideo_inters');
                                clearTimeout(reloadTimer);
                                playButton = document.getElementById("play");
                                $("#posImg_inters").css("top","320px").css("left","100px");
                                if (estado_inters == "Play") {
                                    vid_inters.play();
                                    estado_inters = "Pause";
                                    $("#imgbtn_inters").attr("src", "<?php echo base_url()."assets/player_movistar/ico_pause.png" ?>");
                                }
                                else {
                                    vid_inters.pause();
                                    estado_inters = "Play";
                                    $("#imgbtn_inters").attr("src", "<?php echo base_url()."assets/player_movistar/ico_play.png" ?>");
                                }
                            }

                            function pauseVideoHTML_inters(){
                                vid_inters.pause();
                                estado_inters = "Play";
                                $("#imgbtn_inters").attr("src", "<?php echo base_url()."assets/player_movistar/play.png" ?>");
                                $("#posImg_inters").css("top","200px").css("left","450px");
                            }

                            function vidEnd_inters() {
                                reloadVideo_inters();
                            }

                            function reloadVideo_inters(){
                                estado_inters = "Play";
                                console.log("reloadVideo_inters");
                                reloadTimer_inters = setTimeout(playVideo_inters, 500);

                            }

                            $(document).ready(function() {
                                vid_inters = document.getElementById("vid_inters");
                                vid_inters.addEventListener('ended', vidEnd_inters, false);
                            });

                        </script>
                        <p id="posImg_inters" style="position:absolute; top: 200px; left: 450px; z-index:999;">
                            <img id="imgbtn_inters" src="<?php echo base_url()."assets/player_movistar/play.png" ?>" onclick="playVideo()">
                        </p>
                        <video src="<?php echo $interstital_obj->url; ?>" id="vid_inters" width="970" height="300" class="qtime_inters"
                            poster="<?php echo $interstital_obj->screenshot; ?>">
                        </video>

                   <?php } else { ?> 

                        <video class="qtime_inters" controls="" poster="<?php echo $interstital_obj->screenshot; ?>" 
                            width="970" 
                            height="300"  
                            onclick="if(/Android/.test(navigator.userAgent))this.play();">
                            <source src="<?php echo $interstital_obj->url; ?>" type="video/mp4" />                            
                            <object type="application/x-shockwave-flash" data="<?php echo base_url()."assets/player/flashfox.swf" ?>" class="flashVMS_inters"  
                                width="970" height="300" style="position:relative; margin-left:175px;">
                                <param name="movie" value="<?php echo base_url()."assets/player_movistar/player.swf" ?>" />
                                <param name="wmode" value="transparent" />
                                <param name="allowFullScreen" value="true" />
                                <param name="flashVars" value="autoplay=1&amp;controls=true&amp;fullScreenEnabled=true&amp;loop=false&amp;poster=<?php echo $interstital_obj->screenshot; ?>&amp;src=<?php echo $interstital_obj->url; ?>" />
                                <embed src="<?php echo base_url()."assets/player_movistar/player.swf" ?>" 
                                    width="970" 
                                    height="300" 
                                    style="position:relative;"  
                                    flashVars="autoplay=1&amp;controls=true&amp;fullScreenEnabled=true&amp;loop=false&amp;poster=<?php echo $interstital_obj->screenshot; ?>&amp;src=<?php echo $interstital_obj->url; ?>"    
                                    allowFullScreen="true" 
                                    wmode="transparent" 
                                    type="application/x-shockwave-flash" 
                                    pluginspage="http://www.adobe.com/go/getflashplayer_en" />
                                <img alt="" src="<?php echo $interstital_obj->screenshot; ?>" style="position:absolute;left:0;" 
                                     width="970" height="300" title="Video playback is not supported by your browser" />
                            </object>
                        </video>

                        <script src="<?php echo base_url()."assets/player/html5ext.js"; ?>" type="text/javascript"></script>                               

                  <?php }  ?>
             <?php }  ?>
             </div>
       <?php } ?>
</div>