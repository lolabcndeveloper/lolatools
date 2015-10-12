<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* The MX_Controller class is autoloaded as required */
class ADMIN_Controller extends MX_Controller
{
    public $data = array();

    public $application; 
    
    public $navs = array();
    
    public $current_section = 'portada';
    
    public $default_lang = 'es';
    
    public $languages = array( 'es' );
    
    private $lang_folders = array("es" => "spanish"); 
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('cookie');
        //$this->load->helper('breadcrumb');
  
        
        $this->data['default_lang'] = $this->default_lang;
        $this->data['languages']    = $this->languages;        
        
        $this->initialize();
        
        $this->data['sidebar'] = TRUE;
        
        $this->data['permissions'] = $this->session->userdata('permissions');
        
        //$this->output->enable_profiler(TRUE);
    }
    
    private function initialize()
    {
        $this->config->load('application',TRUE);

        $this->application = $this->config->config['application'];
        
        $this->init_globals();
    }
    
    private function init_globals()
    {
        $this->data['application']  = $this->application;
    }
    
    public function render($type = 'html', $template = 'admin')
    {
        if ( is_null($template) )
            $template = $this->application['default_template'];
            
        if ( !isset($this->data['seo']) )
            $this->set_seo($this->application['title'], $this->application['description'], $this->application['keywords']);
            
        echo Modules::run('display/'.$type.'/index', $this->data, $template);
    }
    
    public function set_region($region, $content)
    {
        $this->data['regions'][$region] = $content;
    }
    
    
    /**
    * SEO Functions 
    * 
    */       
    public function set_seo($title, $description, $keywords)
    {
        $seo = array();
        $seo['title'] = $title;
        $seo['description'] = $description;
        $seo['keywords'] = $keywords;
        
        $this->data['seo'] = $seo;
    }
     
}
