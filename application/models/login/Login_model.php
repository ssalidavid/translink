<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function check_user_login($member_id, $password){
        $this->db->select("*");
        $this->db->from('users');
        $this->db->where('member_id', $member_id);
        $this->db->where("DECODE(password,'sitmPKEY')", $password);
        $query = $this->db->get();
        return $query->result();
    }

    function get_role_name($role){
        $this->db->select("*");
        $this->db->from("roles");
        $this->db->where("role", $role);
        $query = $this->db->get();
        return $query->result();
    }

}