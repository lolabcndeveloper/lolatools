<?php

class MY_Security extends CI_Security {

	function MY_Security() {
         parent::__construct();
    }     

    public function xss_clean($str, $is_image = FALSE) {
        $str = rawurlencode($str);
        return parent::xss_clean($str, $is_image);
    }

}

?>