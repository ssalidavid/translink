<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Settings Moel
 */
class Settings_model extends CI_model{

	var $table = 'settings';
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function save_settings($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function get_maximum_setting_id(){
        $this->db->select_max('sid');
        $this->db->from($this->table);
        $query = $this->db->get();
        $data = $query->row();
        return $data->sid;
    }

    public function get_setting_by_id($id) {
    	$this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('sid', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_settings($id, $data) {
        $this->db->where("sid",$id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }


}