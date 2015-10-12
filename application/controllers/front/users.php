<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends ADMIN_Controller 
{
    private $slug = 'users';

    function __construct()
    {
        parent::__construct();
        $this->load->library('auth/ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
        
        $this->load->model("admin/crud_".$this->slug);
        
        $this->data['selected_navigation'] = 'users';

        $this->data['sidebar'] = TRUE;
    }
    
    private function check_login()
    {
        if ( !$this->ion_auth->logged_in() )
        {
            //redirect(ADMIN_SLUG.'/login');
			show_404();
			//redirect('/index.php');
            return;
        }        
    }
    
    function recover()
    {
        $this->data['javascript']= array();
        $this->data['stylesheet']= array('admin/login.css');
        $this->data['sidebar']   = FALSE;  
        
        $this->set_region('content', $this->load->view('admin/recover', $this->data, true));           
        $this->render();
    }
    
    function recover_do()
    {
        $forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

        if ($forgotten)
        { 
            //$this->session->set_flashdata('state', 'Has iniciado el proceso de recuperación de contraseña, te hemos enviado un correo para que confirmes el cambio de contraseña');
			$this->session->set_flashdata('state', 'Te hemos enviado un correo para que confirmes el cambio de contraseña');
            redirect(ADMIN_SLUG.'/login');               
        }
        else
        {
            //$this->session->set_flashdata('state', 'El correo indicado no existe');
			$this->session->set_flashdata('state', 'Te hemos enviado un correo para que confirmes el cambio de contraseña');
            redirect(base_url().ADMIN_SLUG."/users/recover", 'refresh');
        }        
    }
    
    function reset_password($code)
    {
        $reset = $this->ion_auth->forgotten_password_complete($code);

        if ($reset)
        {  //if the reset worked then send them to the login page
            $this->session->set_flashdata('state', $this->ion_auth->messages());
            redirect(base_url().ADMIN_SLUG."/login", 'refresh'); 
        }
        else
        { //if the reset didnt work then send them back to the forgot password page
            $this->session->set_flashdata('state', $this->ion_auth->errors());
            redirect(base_url().ADMIN_SLUG."/login", 'refresh');
        }
    }

    function index()
    {
        //$this->check_login();
        $this->lista(0);
    }
    
    function lista($page = 0)
    {              
        $this->check_login();
        $this->data['javascript']= array('jquery.tablednd.js');
        $this->data['stylesheet']= array();
        
        $this->data['selected_subnavigation'] = 'list';
        
        $this->data['stylesheet']= array('uniform/uniform.default.css', 'admin/listado.css' );

        $this->load->library('pagination');
        $model = "crud_".$this->slug;
        
        $this->data['slug']                = $this->slug;
        
        $filtro = array('type'=>'e', 'field'=>'groups.name', 'value'=>'admin');
        $this->data['lista']               = $this->$model->get_list($page, 10, NULL);
        
        $this->data['num_rows']            = $this->$model->count_list($this->session->userdata('admin.filtro.usuarios'));    
        
        $this->data['fields']              = $this->$model->fields;
        $this->data['has_langs']           = $this->$model->has_langs;
        $this->data['lang_field_in_list']  = $this->$model->lang_field_in_list;  
        $this->data['lang_title_in_list']  = $this->$model->lang_title_in_list;      
        
        $this->data['filtro'] = $this->session->userdata('admin.filtro.usuarios');
        
        $config = array();
        $config['base_url']    = site_url(ADMIN_SLUG.'/users/lista/');
        $config['total_rows']  = $this->data['num_rows'];
        $config['per_page']    = 10;
        $config['uri_segment'] = 4;          
        
        $this->pagination->initialize($config);
        
        $this->data['pagination'] = $this->pagination->create_links();
        
        $this->data['page_title'] = "Listado de Usuarios";

        $this->set_region('content', $this->load->view('admin/users/list', $this->data, true));           
        $this->render();        
        
    }
    
    function edit($id)
    {
        $this->check_login();
        $model = "crud_".$this->slug;
        
        $this->data['slug']                = $this->slug;
        
        $this->data['javascript'] = array( 'jquery.uniform.min.js');
        $this->data['stylesheet'] = array( 'uniform/uniform.default.css' ,'admin/item.css');

        $this->data['item'] = $this->$model->get_item($id);
        
        $this->data['form'] = $this->$model->define_form($this->data['item']);
        $this->data['has_langs']   = $this->$model->has_langs; 
        $this->data['lang_fields'] = $this->$model->lang_fields;              
        
        $this->data['tab_contents'] = array();
        $this->data['selected_tab'] = "";

        $this->data['selected_subnavigation'] = 'list';
        
        $this->set_region('content', $this->load->view('admin/users/edit', $this->data, true));           
        $this->render();        
    }
    
    function create()
    {
        $this->check_login();
        $model = "crud_".$this->slug;
        
        $this->data['slug']                = $this->slug;
        
        $this->data['javascript'] = array( 'jquery.uniform.min.js');
        $this->data['stylesheet'] = array( 'uniform/uniform.default.css' ,'admin/item.css');

        $this->data['form'] = $this->$model->define_form();
        $this->data['has_langs']   = $this->$model->has_langs; 
        $this->data['lang_fields'] = $this->$model->lang_fields;              
        
        $this->data['tab_contents'] = array();
        $this->data['selected_tab'] = "";

        $this->data['selected_subnavigation'] = 'list';
        
        $this->set_region('content', $this->load->view('admin/users/create', $this->data, true));           
        $this->render();  
    }
    
    function change_password($user_id)
    {
         $this->check_login();
         $data = array();
         $data['user_id'] = $user_id;
         echo $this->load->view('admin/users/change_password', $data, TRUE);
    }   
    
    function guardar_password()
    {
        $this->check_login();
        $id        = $this->input->post('user_id');
        $password  = $this->input->post('password');
        $password2 = $this->input->post('password2');
        
        $data = array('password' => $password);
        if ($this->ion_auth->update_user($id, $data) )
        {
            $model = "crud_".$this->slug;  
            $user = $this->$model->get_item($id); 
            
            $user = $this->$model->get_item($id);           
            
            redirect(ADMIN_SLUG.'/login/out');
        }
    }
    
    public function remove($id)
    {
        $this->check_login();
        $model = "crud_".$this->slug;  
        $user = $this->$model->get_item($id);
        
        $this->remove_cmsuser($id);
    }
    
    private function remove_cmsuser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        
        $this->db->where('user_id', $id);
        $this->db->delete('meta');
    }
    
    
    function guardar()
    {
        $this->check_login();
        $tab = $this->input->post('tab');
        if ( $tab == "general")
        {
            $this->save_general_tab();
        }
    }
    
    private function save_general_tab()
    {
        $id = $this->input->post('id');
        if ( $id == "-1" )
        {
            $update_data = array();
            $update_data['username'] = strtolower($this->input->post('nombre'));
            $update_data['active'] = $this->input->post('active') ? 1 : 0;
            $update_data['password'] = $this->input->post('password');
            $update_data['email']    = $this->input->post('email');
            
            $additional_data = array(
                'nombre' => $this->input->post('nombre'),
                'apellidos' => $this->input->post('apellidos'),
                'group_id' => $this->input->post('group_id')
            );
                        
            $id = $this->ion_auth->register($update_data['username'], $update_data['password'], $update_data['email'], $additional_data);
            
            $this->activate_user($id);
        } else {            
            $update_data = array();
            $update_data['username'] = strtolower($this->input->post('nombre'));
            $update_data['active'] = $this->input->post('active') ? 1 : 0;
            
            $additional_data = array(
                    'nombre' => $this->input->post('nombre'),
                    'apellidos' => $this->input->post('apellidos'),
                    'group_id' => $this->input->post('group_id')
            );
            
            $update_data = array_merge($update_data, $additional_data);       
            
            $this->ion_auth->update_user($id, $update_data);
        }
        redirect(ADMIN_SLUG.'/users/edit/'.$id);
    }
    
    private function activate_user($id)
    {
        $data = array();
        $data['activation_code'] = '';
        $data['active'] = 1;
        
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
    
    function groups($page = 0)
    {
        $this->check_login();
        $this->data['javascript']= array('jquery.tablednd.js');
        $this->data['stylesheet']= array();
        
        $this->data['selected_subnavigation'] = 'groups';
        
        $this->data['stylesheet']= array('uniform/uniform.default.css', 'admin/listado.css' );

        $this->load->library('pagination');
        
        $model = "crud_groups";
        $this->load->model("admin/".$model);
        
        $this->data['slug']                = $this->slug;
        
        $this->data['lista']               = $this->$model->get_list($page, 10, NULL, $this->session->userdata('admin.filtro.usuarios'));
        
        $this->data['num_rows']            = $this->$model->count_list($this->session->userdata('admin.filtro.usuarios'));    
        
        $this->data['fields']              = $this->$model->fields;
        $this->data['has_langs']           = $this->$model->has_langs;
        $this->data['lang_field_in_list']  = $this->$model->lang_field_in_list;  
        $this->data['lang_title_in_list']  = $this->$model->lang_title_in_list;      
        
        $this->data['filtro'] = $this->session->userdata('admin.filtro.usuarios');
        
        $config = array();
        $config['base_url']    = site_url(ADMIN_SLUG.'/users/lista/');
        $config['total_rows']  = $this->data['num_rows'];
        $config['per_page']    = 10;
        $config['uri_segment'] = 4;
        
        $this->pagination->initialize($config);
        
        $this->data['pagination'] = $this->pagination->create_links();
        
        $this->data['page_title'] = "Listado de Usuarios";
        
        $this->set_region('content', $this->load->view('admin/users/groups', $this->data, true));           
        $this->render();
    }
    
    function edit_group($id)
    {
        $this->check_login();
        $this->data['javascript']= array();
        $this->data['stylesheet']= array();
        
        $this->data['selected_subnavigation'] = 'groups';
        
        $model = "crud_groups";
        $this->load->model("admin/".$model);
        
        $this->data['slug']                = 'groups';
        
        $this->data['javascript'] = array( 'jquery.uniform.min.js');
        $this->data['stylesheet'] = array( 'uniform/uniform.default.css' ,'admin/item.css', 'admin/permisos.css');
        
        $this->data['item'] = $this->$model->get_item($id);
        
        $this->data['form'] = $this->$model->define_form($this->data['item']);
        $this->data['has_langs']   = $this->$model->has_langs; 
        $this->data['lang_fields'] = $this->$model->lang_fields;              
        
        $this->data['tab_contents'] = array();
        foreach( $this->$model->tabs as $key=>$value )
        {
            if (isset($value['type']) )
            {
                switch ($value['type']){
                    case "child":
                        if ( $this->get_selected_tab($tab) == $this->get_selected_tab($key) )
                        {
                            $this->data['tab_contents'][$key] = Modules::run(ADMIN_SLUG.'/'.$value['table'].'/lista', $page, $id);
                        } else {
                            $this->data['tab_contents'][$key] = Modules::run(ADMIN_SLUG.'/'.$value['table'].'/lista', 0, $id);
                        }                    
                        break;
                    case "function":
                        $this->data['tab_contents'][$key] = $this->$value['table']($this->data['item']);
                        break;
                        
                }                ; 
            }
        }
        
        $this->data['selected_tab'] = "permisos";
        
        $this->set_region('content', $this->load->view('admin/users/edit_group', $this->data, true));           
        $this->render();
    } 
    
    function create_group()
    {   
        $this->check_login();
        $this->data['selected_subnavigation'] = 'groups';
        
        $model = "crud_groups";
        $this->load->model("admin/".$model);
        
        $this->data['slug']                = 'groups';
        
        $this->data['javascript'] = array( 'jquery.uniform.min.js');
        $this->data['stylesheet'] = array( 'uniform/uniform.default.css' ,'admin/item.css');
        
        
        $this->data['form'] = $this->$model->define_form();
        $this->data['has_langs']   = $this->$model->has_langs; 
        $this->data['lang_fields'] = $this->$model->lang_fields;              
        
        $this->data['tab_contents'] = array();
        $this->data['selected_tab'] = "";

        $this->set_region('content', $this->load->view('admin/users/create_group', $this->data, true));           
        $this->render();        
    }   
    
    function guardar_group()
    {
        $action = $this->input->post('btnAction');
        
        $this->check_login();
        $id = $this->input->post('id');
        
        $data = array();
        if ( $action == "permisos" )
        {
            $data['permissions'] = $this->parse_permissions($this->input->post('modules'));
        } else {
            $data['name']        = $this->input->post('name');
            $data['description'] = $this->input->post('description');
        }
 
        $model = "crud_groups";
        $this->load->model("admin/".$model);        
        
        if ( $id == -1 )
        {
            $id = $this->$model->insert_item($data);
        } else {
            $this->$model->update_item($id, $data);
        }
        redirect(ADMIN_SLUG.'/groups/edit/'.$id);
    }
    
    function remove_group($id)
    {
        // Asignamos a los usuarios de este grupo el grupo de members
        $this->db->set('group_id', 2);
        $this->db->where('group_id', $id);
        $this->db->update('users');
        
        // Elminamos grupo
        $this->db->where('id', $id);    
        $this->db->delete('groups');
        
        
        redirect(ADMIN_SLUG.'/groups/'); 
    }    
    
    private function parse_permissions($per)
    {
        return json_encode($per);
    }
    
    
    function permissions($item = NULL)
    {
        $this->check_login();
        if ( !is_null($item) )        
        {
            $data = array();
            $data['item'] = $item;
            $data['slug'] = "groups";
            $data['permisos'] = json_decode($item->permissions, TRUE);
            $data['modules'] = array(
                'usuarios' => array('label'=>'Usuarios',
                                    'roles'=>array(
                                                'admin_users'=>array('label'=>'Administrar Usuarios'),
                                                'grupos'=>array('label'=>'Grupos')
                                             )
                                    ),
                'paginas' => array('label'=>'Páginas'),
                'menus' => array('label'=>'Menús'), 
                'sidebar' => array('label'=>'Sidebar'),
                'modulos' => array('label'=>'Módulos',
                                 'roles'=>array(
                                                'slideshow'=>array('label'=>'Slideshow'),
                                                'secciones'=>array('label'=>'Secciones > Subsecciones'),
                                                'promociones'=>array('label'=>'Editar promociones'),
                                                'promociones_erase'=>array('label'=>'Eliminar promociones'),
												'deportistas'=>array('label'=>'Deportistas'),
                                                'galeria'=>array('label'=>'Galería Multimedia')
                                             )
                                    ),
				'facebook' => array('label'=>'Facebook')
                                                                          
            );
            
            return $this->load->view('admin/users/permissions', $data, true);
        }
    }      
    
    function edit_permissions($id_permissions)
    {
        $this->check_login();
        $this->data['javascript']= array();
        $this->data['stylesheet']= array();
        
        $this->data['selected_subnavigation'] = 'permissions';
        
        $this->set_region('content', $this->load->view('admin/users/edit_permission', $this->data, true));           
        $this->render();
    }                
}

/* End of file */
 
