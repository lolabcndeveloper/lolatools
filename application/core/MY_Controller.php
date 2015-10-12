<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* The MX_Controller class is autoloaded as required */
class MY_Controller extends MX_Controller
{
    public $data = array();
    
    public $current_lang;  
    public $default_lang;
    public $languages;
    public $lang_folders; 
    
    public $application; 
    
    public $navs = array();
    
    public $current_section = 'portada';
    
    public function __construct()
    {
        parent::__construct();
        
        //$this->load->helper('cookie');
        //$this->load->helper('breadcrumb'); 
        
        $this->initialize();
        
        //$this->data['sidebar'] = TRUE;
        
        //$this->get_language();
    }
    
    private function initialize()
    {
        $this->config->load('application',TRUE);

        $this->application = $this->config->config['application'];
        
        $this->default_lang = $this->application['default_lang'];
        $this->lang_folders = $this->application['lang_folders'];
        $this->languages    = $this->application['languages'];
        
        $this->init_globals();
    }
    
    private function init_globals()
    {
        $this->data['application']  = $this->application;
        $this->data['default_lang'] = $this->default_lang;
        $this->data['current_lang'] = $this->current_lang;
        $this->data['languages']    = $this->languages;                           
    }
    
    public function render($type = 'html', $template = null)
    {
        if ( is_null($template) )
            $template = $this->application['default_template'];
            
            
        if ( !isset($this->data['seo']) )
            $this->set_seo($this->application['title'], $this->application['description'], $this->application['keywords']);
        else
            $this->set_seo($this->application['title'], $this->application['description'], $this->application['keywords'], $this->data['seo']);
            
            
        if ( !isset($this->data['layout']) )
            $this->data['layout'] = 'none';
            
        echo Modules::run('display/'.$type.'/index', $this->data, $template);
    }
    
    public function set_region($region, $content)
    {
        $this->data['regions'][$region] = $content;
    }
    
    
    /**
    * Language Functions 
    * 
    */
    public function get_language()
    {
        $uri_lang_available = in_array($this->uri->segment(1), $this->languages) ? true : false;
        
        $lang = get_cookie('tis_language');
        
        if ($uri_lang_available)
        {
            if ($lang == false || ($lang != false && $lang != $this->uri->segment(1)))
            {
                $lang = $this->uri->segment(1);
                $this->set_language($lang);
            }           
        } else if ($lang === true) {
            $this->set_language($lang);
        } else {
            $lang = $this->default_lang;
            $this->set_language($lang);            
        }
        
        $this->current_lang = $lang;
        $this->data['current_lang'] = $lang;
        $lang_folder = $this->lang_folders[$this->current_lang];
        
        $this->lang->load('ui', $lang_folder);
        
        return $this->current_lang;
    } 
    
    /**
    * Cambia la página e interfaz de idioma
    * 
    * @param mixed $lang
    */
    public function set_language($lang)
    {
        $cookie = array(
               'name'       => 'tis_language',
               'value'      => $lang,
               'expire'     => 30 * 24 * 3600,
               'path'       => '/'
            );
        
        $this->current_lang = $lang;
        $this->data['current_lang'] = $this->current_lang;
        set_cookie($cookie);            
    } 
    
    /**
    * SEO Functions 
    * 
    */       
    public function set_seo($title, $description, $keywords, $data = NULL)
    {
        if( is_null($data) )
        {
            $seo = new stdClass();
            $seo->title = $title;
            $seo->description = strip_tags($description);
            $seo->keywords = $keywords;
            $seo->image = NULL;
            
            $this->data['seo'] = $seo;
        } else {
            $seo = new stdClass();
            $seo->title = ( $data->title == '' ) ? $title : $data->title;
            $seo->description = ( $data->description == '' ) ? strip_tags($description) : strip_tags($data->description);
            $seo->keywords = ( $data->keywords == '' ) ? $keywords : $data->keywords;
            $seo->image = $data->image;
            
            $this->data['seo'] = $seo;            
        }
    }
     
}
