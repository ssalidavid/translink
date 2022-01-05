<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Users_model
 *
 * @author  
 */
class Users_Model extends CI_Model {

    var $table = 'users';
    var $column_order = array(null,null,'name', 'member_id','status','phone',null, null); //set column field database for datatable orderable
    var $column_search = array('name','member_id','status','phone'); //set column field database for datatable searchable just name , user_name , address are searchable
    var $order = array('id' => 'asc'); // default order 

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($term=''){
        $column = array('U.id','U.photo','U.name','U.phone','U.member_id','R.name AS rolename','U.status','U.*');
        $this->db->select($column);
        $this->db->from($this->table.' AS U');
        $this->db->join('roles AS R','R.role_id = U.role','left');
        $this->db->like('U.id', $term);
        //Searching by the following Columns
        $this->db->or_like('R.name', $term);
        $this->db->or_like('U.name', $term);
        $this->db->or_like('U.phone', $term);
        $this->db->or_like('U.member_id', $term);
        $this->db->or_like('U.status', $term);

        if(isset($_REQUEST['order'])) // here order processing
        {
            $this->db->order_by($column[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_all_users(){
        $term = $_REQUEST['search']['value']; 
        $this->_get_datatables_query($term);
        if($_POST['length'] != -1)
            $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function count_filtered_users() {
        $term = $_REQUEST['search']['value']; 
        $this->_get_datatables_query($term);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_users() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_user_by_id($id) {
        $this->db->select("id,
            member_id,DECODE(password,'sitmPKEY') as password,
            role,status,name,phone,photo,jdate,created_at");
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_All_users_by_idOld($id) {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function view_record_by_user_id($id){
        $column = array('U.id','U.phone','U.*','R.name AS rolename');
        $this->db->select($column);
        $this->db->from($this->table.' AS U');
        $this->db->join('roles AS R','R.role_id = U.role','left');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_staff_role(){
        $column = array('U.*','R.name');
        $this->db->select($column);
        $this->db->from($this->table.'AS U');
        $this->db->join('role AS R','R.role_id = U.role','left');
        $quer = $this->db->get();
        return $query->result();
    }

    public function get_user_roles(){
        $this->db->select('role,name');
        $this->db->from('roles');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function save_users($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function updates($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_user_id($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function update_status($id,$data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function change_password($id,$password){
        return $this->db->query("UPDATE users SET password = ENCODE('".$password."', 'sitmPKEY') WHERE id = ".$id);
    }

    public function member_id_check($member_id){
        $this->db->select('member_id');
        $this->db->from($this->table);
        $this->db->where('member_id',$member_id);
        $query=$this->db->get();
        return $query->num_rows();
    }

    public function get_user_details($uid){
        $column = array('U.*','R.name AS rolename','M.account_no','M.account_balance');
        $this->db->select($column);
        $this->db->from('users AS U');
        $this->db->join('roles AS R','R.role = U.role','left');
        $this->db->join('member AS M','M.member_id = U.member_id','left');
        $this->db->where('U.id', $uid);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_role_name($role_id){
        $this->db->from('roles');
        $this->db->where('role', $role_id);
        $query = $this->db->get();
        $roleIDRow = $query->row_array();
        return $roleIDRow['name'];
    }

    public function check_user_id($uname){
        $this->db->select('name');
        $this->db->from($this->table);
        $this->db->where('id',$uname);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function check_user_contact($contact){
        $this->db->select('phone');
        $this->db->from($this->table);
        $this->db->where('phone',$contact);
        $query=$this->db->get();
        return $query->num_rows();
    }

}
