<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends MY_Controller
{
    private $slug = 'project';

    function __construct()
    {
        parent::__construct();
        $this->load->library('auth/ion_auth');
        $this->load->library('session');
        //$this->load->library('form_validation');
        //$this->load->helper('url');

        //$this->load->model("admin/crud_".$this->slug);

        $this->data['selected_navigation'] = 'project';
        //$this->data['sidebar'] = TRUE;

        //$this->check_login();

    }


    private function check_login($redirect)
    {
        if ( !$this->ion_auth->logged_in() )
        {
            //redirect(ADMIN_SLUG.'/login');
            //show_404();
            //redirect('/index.php');
            if ($redirect) {
                redirect(FRONT_SLUG . '/login');
                return;
            }
            else {
                $result = array(
                    'status' => 'error',
                    'type' => 'login',
                    'data' => 'The user is not logged in.'
                );
                echo json_encode($result);
                exit;
            }

        }
    }


    function index()
    {
        //$this->check_login();
        //$this->lista(0);
        $this->create();
    }



    function create()
    {
        $this->check_login(true);

        //$this->load->helper('html');

        $this->data['idBody'] = 'createForm';
        $this->data['id'] = '';
        $this->data['client'] = $this->input->get('client');
        $this->data['media'] = $this->input->get('media');
        $this->data['name'] = $this->input->get('name');
        $this->data['client_owner'] = '';
        $this->data['production_owner'] = '';
        $this->data['account_owner'] = '';
        $this->data['file'] = '';

        $this->set_region('content', $this->load->view('../templates/default/views/project', $this->data, true));
        //$this->set_region('content', $this->load->view('../templates/default/views/login', $this->data, true));
        $this->render();
    }

    function edit() {
        $this->check_login(true);

        $this->load->model('front_model');

        $id = $this->input->get('id');
        $project = $this->front_model->get_project($id);
        $countries =  $this->front_model->get_right_countries($id);

        $this->data['idBody'] = "editForm";
        $this->data['countries'] = $countries;
        $this->data = array_merge($this->data, $project);

        $this->set_region('content', $this->load->view('../templates/default/views/project', $this->data, true));
        $this->render();
    }


    function save()
    {
        $this->check_login(false);

        //$this->load->helper('file');
        //$this->load->library('upload');
        $this->load->model('front_model');

        //Recogemos los datos
        $project_data = array();
        $project_data['client'] = $this->input->post('client');
        $project_data['name'] = $this->input->post('name');
        $project_data['media'] = $this->input->post('media');
        $project_data['client_owner'] = $this->input->post('client_owner');
        $project_data['production_owner'] = $this->input->post('production_owner');
        $project_data['account_owner'] = $this->input->post('account_owner');

        //Guardamos el fichero si lo hay
        $config['upload_path'] = UPLOADS_SLUG;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|mov|avi';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $file_data = $this->upload->data();
            $project_data['file'] = $file_data['file_name'];
        }
        else {
            //echo $this->upload->display_errors();
        }


        $id = $this->input->post('id');
        //Create new project
        if ($id == '') {
            $project_data['created'] = date('Y-m-d H:i:s');
            $project_data['modified'] = date('Y-m-d H:i:s');
            $result = $this->front_model->save_project($project_data);
            echo json_encode($result);
        }
        //Update existing project
        else {
            $project_data['id'] = $this->input->post('id');
            $project_data['modified'] = date('Y-m-d H:i:s');
            $result = $this->front_model->update_project($project_data);
            echo json_encode($result);
        }

    }

}

/* End of file */

