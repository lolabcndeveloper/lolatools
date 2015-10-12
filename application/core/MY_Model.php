<?php

/**
 * Modelo del que extiende el resto de modelos
 * 
 * Contiene una serie de métodos comunes que se van a utilizar en casi todos
 * 
 */
class MY_Model extends CI_Model {
    var $table_name = '';

    function MY_Model() {
         parent::__construct();
    }     

    function add($record) {
        if ($this->db->insert($this->table_name, $record)){
            return $this->db->insert_id();
        }

        return false;
    }

    function delete($id) {
        $this->db->limit(1);
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
        return $this->db->affected_rows();
    }       

    function get($id){
        $this->db->where('id', $id);
        $this->db->limit(1);
        $rows = $this->db->get($this->table_name);
        return $rows->row_array();
    }

    function get_all() {
        $query = $this->db->get($this->table_name);

        if($query -> num_rows() >= 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function countAll() {
        return $this->db->count_all_results($this->table_name);
    }

    function update($id, $record){
        $this->db->where('id', $id);
        $this->db->limit(1);
        $this->db->update($this->table_name, $record);
        return $this->db->affected_rows();
    }
}

?>