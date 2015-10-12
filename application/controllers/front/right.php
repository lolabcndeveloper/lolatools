<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Right extends MY_Controller
{
    //private $slug = 'right';

    function __construct()
    {
        parent::__construct();
        $this->load->library('auth/ion_auth');
        $this->load->library('session');

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



    function save()
    {
        $this->check_login(false);

        //$this->load->helper('file');
        //$this->load->library('upload');
        $this->load->model('front_model');

        //Recogemos los datos
        $right_data = array();

        $right_data['project_id'] = $this->input->post('project_id');
        $right_data['countries'] = $this->input->post('countries');
        $right_data['description'] = $this->input->post('description');

        $right_data['production_email'] = $this->input->post('production_email');
        $right_data['production_from'] = $this->input->post('production_from');
        $right_data['production_to'] = $this->input->post('production_to');
        $right_data['production_budget_approved'] = $this->input->post('production_budget_approved');
        $right_data['production_contract_approved'] = $this->input->post('production_contract_approved');

        $right_data['contract_email'] = $this->input->post('contract_email');
        $right_data['contract_from'] = $this->input->post('contract_from');
        $right_data['contract_to'] = $this->input->post('contract_to');
        $right_data['contract_budget_approved'] = $this->input->post('contract_budget_approved');
        $right_data['contract_contract_approved'] = $this->input->post('contract_contract_approved');

        $right_data['music_email'] = $this->input->post('music_email');
        $right_data['music_from'] = $this->input->post('music_from');
        $right_data['music_to'] = $this->input->post('music_to');
        $right_data['music_budget_approved'] = $this->input->post('music_budget_approved');
        $right_data['music_contract_approved'] = $this->input->post('music_contract_approved');

        $right_data['others_email'] = $this->input->post('others_email');
        $right_data['others_from'] = $this->input->post('others_from');
        $right_data['others_to'] = $this->input->post('others_to');
        $right_data['others_budget_approved'] = $this->input->post('others_budget_approved');
        $right_data['others_contract_approved'] = $this->input->post('others_contract_approved');


        //Guardamos el fichero si lo hay
        $config['upload_path'] = UPLOADS_SLUG;
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|jpeg';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('production_budget')) {
            $file_data = $this->upload->data();
            $right_data['production_budget'] = $file_data['file_name'];
        }
        if ($this->upload->do_upload('production_contract')) {
            $file_data = $this->upload->data();
            $right_data['production_contract'] = $file_data['file_name'];
        }
        if ($this->upload->do_upload('contract_budget')) {
            $file_data = $this->upload->data();
            $right_data['contract_budget'] = $file_data['file_name'];
        }
        if ($this->upload->do_upload('contract_contract')) {
            $file_data = $this->upload->data();
            $right_data['contract_contract'] = $file_data['file_name'];
        }
        if ($this->upload->do_upload('music_budget')) {
            $file_data = $this->upload->data();
            $right_data['music_budget'] = $file_data['file_name'];
        }
        if ($this->upload->do_upload('music_contract')) {
            $file_data = $this->upload->data();
            $right_data['music_contract'] = $file_data['file_name'];
        }
        if ($this->upload->do_upload('others_budget')) {
            $file_data = $this->upload->data();
            $right_data['others_budget'] = $file_data['file_name'];
        }
        if ($this->upload->do_upload('others_contract')) {
            $file_data = $this->upload->data();
            $right_data['others_contract'] = $file_data['file_name'];
        }


        $id = $this->input->post('right_id');
        //Create new right
        if ($id == '') {
            $right_data['created'] = date('Y-m-d H:i:s');
            $right_data['modified'] = date('Y-m-d H:i:s');
            $result = $this->front_model->save_right($right_data);
            echo json_encode($result);
        }
        //Update right
        else {
            $right_data['id'] = $this->input->post('right_id');
            $right_data['modified'] = date('Y-m-d H:i:s');


            if ($this->upload->do_upload('production_budget_update')) {
                $file_data = $this->upload->data();
                $right_data['production_budget'] = $file_data['file_name'];
                $right_data['production_budget_approved'] = 0;
                $this->front_model->remove_file_right($id, 'production_budget');
            }
            if ($this->upload->do_upload('production_contract_update')) {
                $file_data = $this->upload->data();
                $right_data['production_contract'] = $file_data['file_name'];
                $right_data['production_contract_approved'] = 0;
                $this->front_model->remove_file_right($id, 'production_contract');
            }
            if ($this->upload->do_upload('contract_budget_update')) {
                $file_data = $this->upload->data();
                $right_data['contract_budget'] = $file_data['file_name'];
                $right_data['contract_budget_approved'] = 0;
                $this->front_model->remove_file_right($id, 'contract_budget');
            }
            if ($this->upload->do_upload('contract_contract_update')) {
                $file_data = $this->upload->data();
                $right_data['contract_contract'] = $file_data['file_name'];
                $right_data['contract_contract_approved'] = 0;
                $this->front_model->remove_file_right($id, 'contract_contract');
            }
            if ($this->upload->do_upload('music_budget_update')) {
                $file_data = $this->upload->data();
                $right_data['music_budget'] = $file_data['file_name'];
                $right_data['music_budget_contract'] = 0;
                $this->front_model->remove_file_right($id, 'music_budget');
            }
            if ($this->upload->do_upload('music_contract_update')) {
                $file_data = $this->upload->data();
                $right_data['music_contract'] = $file_data['file_name'];
                $right_data['music_contract_approved'] = 0;
                $this->front_model->remove_file_right($id, 'music_contract');
            }
            if ($this->upload->do_upload('others_budget_update')) {
                $file_data = $this->upload->data();
                $right_data['others_budget'] = $file_data['file_name'];
                $right_data['others_budget_approved'] = 0;
                $this->front_model->remove_file_right($id, 'others_budget');
            }
            if ($this->upload->do_upload('others_contract_update')) {
                $file_data = $this->upload->data();
                $right_data['others_contract'] = $file_data['file_name'];
                $right_data['others_contract_approved'] = 0;
                $this->front_model->remove_file_right($id, 'others_contract');
            }

            $result = $this->front_model->update_right($right_data);
            echo json_encode($result);
        }

    }

    function get(){
        $this->check_login(false);

        $this->load->model('front_model');

        //Recogemos los datos
        $id = $this->input->post('id');
        $right = $this->front_model->get_right($id);
        $result = array(
            'status' => 'ok',
            'type' => '',
            'data' => $right
        );
        echo json_encode($result);

    }

    function save_file() {

        $id = $this->input->post('right_id');

        //Guardamos el fichero si lo hay
        $config['upload_path'] = UPLOADS_SLUG;
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|jpeg';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('production_budget')) {
            $file_data = $this->upload->data();
            $right_data['production_budget'] = $file_data['file_name'];
        }
    }

}
?>