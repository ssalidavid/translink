<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  /**
   * Member Model
   */
class Member_model extends CI_Model{
  	var $table = 'member';
    var $column_order = array(null,null,'name', 'sex','address','phone','member_id',null, null); 
    var $column_search = array('name','address', 'sex','address','phone','member_id','account_no','account_balance'); 
    var $order = array('name' => 'asc'); // default order 

    public function __construct(){
    	parent::__construct();
    }

    private function _get_datatables_query() {
    	$this->db->from($this->table);
    	$i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search

                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                	$this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
                }
                $i++;
            }

        if (isset($_POST['order'])) { // here order processing
        	$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
        	$order = $this->order;
        	$this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_member_information() {
    	$this->_get_datatables_query();
    	if ($_POST['length'] != -1)
    		$this->db->limit($_POST['length'], $_POST['start']);
    	$query = $this->db->get();
    	return $query->result();
    }

    public function get_member(){
    	$column = array('S.*','R.name');
    	$this->db->select($column);
    	$this->db->from('member AS S');
    	$this->db->join('roles AS R','R.role_id = S.department','left');
    	$this->db->order_by('S.id','ASC');
    	$query =  $this->db->get();
    	return $query->result();
    }

    public function get_all_members(){
    	$this->db->select('*');
    	$this->db->from($this->table);
    	$query = $this->db->get();
    	return $query->result();
    }

    public function check_member_id($member_id){
    	$this->db->select('member_id');
    	$this->db->from($this->table);
    	$this->db->where('member_id',$member_id);
    	$query = $this->db->get();
    	return $query->num_rows();
    }
    public function check_member_contact($contact){
    	$this->db->select('phone');
    	$this->db->from($this->table);
    	$this->db->where('phone',$contact);
    	$query=$this->db->get();
    	return $query->num_rows();
    }
    public function check_username($username){
    	$this->db->select('username');
    	$this->db->from($this->table);
    	$this->db->where('username',$username);
    	$query=$this->db->get();
    	return $query->num_rows();
    }

    public function count_filtered_member() {
    	$this->_get_datatables_query();
    	$query = $this->db->get();
    	return $query->num_rows();
    }

    public function count_all_member(){
    	$this->db->from($this->table); 
    	return $this->db->count_all_results();
    }

    public function save_member_record($data) {
    	$this->db->insert($this->table, $data);
    	return $this->db->insert_id();
    }

    public function get_by_member_id($member_id) {
    	$this->db->select('*');
    	$this->db->from($this->table);
    	$this->db->where('id', $member_id);
    	$query = $this->db->get();
    	return $query->row();
    }

    public function get_member_info($member_id) {
    	$this->db->select('name,phone,account_balance,account_no');
    	$this->db->from($this->table);
    	$this->db->where('member_id', $member_id);
    	$query = $this->db->get();
    	return $query->row();
    }

    public function update_member_record($id, $data) {
    	$this->db->where('id', $id);
    	$this->db->update($this->table, $data);
    	return $this->db->affected_rows();
    }

    public function delete_by_member_id($member_id) {
    	$this->db->where('id', $member_id);
    	$this->db->delete($this->table);
    }

    public function get_members_info_by_member_id($member_id) {
    	$this->db->select('*');
    	$this->db->from($this->table);
    	$this->db->where('member_id', $member_id);
    	$query = $this->db->get();
    	return $query->row();
    }

    public function get_member_account_balance_amount($member_id){
    	$this->db->select('account_balance');
    	$this->db->from($this->table);
    	$this->db->where('member_id', $member_id);
    	$data = $this->db->get();
    	$query = $data->row();
    	return $query->account_balance;
    }

    public function deposit_transaction_member_account_balance($member_id, $deposit_amount) {
    	$this->db->where('member_id', $member_id);
    	$this->db->set('account_balance', 'account_balance +'.$deposit_amount, FALSE);
    	return $this->db->update($this->table);
	}
	
	public function sumup_user_account_balance_amount(){
        $this->db->select('account_balance');
        $this->db->from($this->table);
        $this->db->where('member_id', $this->userdata['member_id']);
        $data = $this->db->get();
        $query = $data->row();
        return $query->account_balance;
    }

    public function get_user_account_number(){
        $this->db->select('account_no');
        $this->db->from($this->table);
        $this->db->where('member_id', $this->userdata['member_id']);
        $data = $this->db->get();
        $query = $data->row();
        return $query->account_no;
    }

    public function withdraw_transaction_member_account_balance($member_id, $total_member_take_amount) {
    	$this->db->where('member_id', $member_id);
    	$this->db->set('account_balance', 'account_balance -'.$total_member_take_amount, FALSE);
    	return $this->db->update($this->table);
    }

    public function count_total_members(){
    	$this->db->from($this->table); 
    	return $this->db->count_all_results();
    }
}