<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends CI_Model {


    function __construct() {
        parent::__construct();
    }

    function get($client_id) {
        $query = "SELECT * FROM tools_client WHERE id = '".$client_id."'";
        $client = $this->db->query($query)->row(0);
        return $client;
    }

    function get_all() {
        $query = "SELECT * FROM tools_client";
        $clients = $this->db->query($query)->result();
        return $clients;
    }

    function save($name) {

        $date = date('Y-m-d H:i:s');
        $data = array('name' => $name, 'created' => $date);
        $query = $this->db->insert_string('tools_client', $data);

        $result_query = $this->db->query($query);

        if ($result_query) {
            $result = array('result' => 'ok');
        }
        else {
            $result = array('result' => 'error');
        }


        //print_r($result);

        return $result;

    }

}
?>