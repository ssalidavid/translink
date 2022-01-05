<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  /**
   * Savings_account_model Model
   */
	class Savings_account_model extends CI_Model{
		var $table = 'account';
	    var $column_order = array(null,null,'account_name','account_balance','charges_amount', null); //set column field database for datatable orderable
	    var $column_search = array('account_name','account_balance','charges_amount'); 
	    var $order = array('account_name' => 'asc'); // default order 
	  	
	  	public function __construct(){
		   parent::__construct();
		}

		private function _get_datatables_query(){
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

	  	public function get_savings_account_information() {
	        $this->_get_datatables_query();
	        if ($_POST['length'] != -1)
	            $this->db->limit($_POST['length'], $_POST['start']);
	        $query = $this->db->get();
	        return $query->result();
        }

       public function count_filtered_savings_account() {
	        $this->_get_datatables_query();
	        $query = $this->db->get();
	        return $query->num_rows();
        }

       public function count_all_savings_account() {
	        $this->db->from($this->table);
	        return $this->db->count_all_results();
        }

        public function save_savings_account_record($data) {
	        $this->db->insert($this->table, $data);
	        return $this->db->insert_id();
    	}

    	public function check_savings_account_name($account_name){
	        $this->db->select('account_name');
	        $this->db->from($this->table);
	        $this->db->where('account_name',$account_name);
	        $query = $this->db->get();
	        return $query->num_rows();
        }

    	public function get_by_savings_account_id($account_id) {
	        $this->db->select('*');
	        $this->db->from($this->table);
	        $this->db->where('account_id', $account_id);
	        $query = $this->db->get();
	        return $query->row();
    	}

    	public function get_by_savings_account() {
	        $this->db->select('*');
	        $this->db->from($this->table);
	        $this->db->order_by('account_id','ASC');
	        $query = $this->db->get();
	        return $query->row();
    	}

    	public function update_savings_account_record($account_id, $data) {
    		$this->db->where('account_id', $account_id);
	        $this->db->update($this->table, $data);
	        return $this->db->affected_rows();
        }

        public function delete_savings_by_account_id($account_id) {
	        $this->db->where('account_id', $account_id);
	        $this->db->delete($this->table);
	    }

	    public function generate_savings_account() {
	        $this->db->select('account_id, account_name');
	        $this->db->from($this->table);
	        $query = $this->db->get();
	        return $query->result();
    	}

    	public function deposit_transaction_account_balance($account_id, $deposit_amount) {
			$this->db->where('account_id', $account_id);
			$this->db->set('account_balance', 'account_balance +'.$deposit_amount, FALSE);
			return $this->db->update($this->table);
		}

    	public function withdraw_transaction_account_balance($account_id, $withdraw_amount, $withdraw_charge) {
			$this->db->where('account_id', $account_id);
			$this->db->set('account_balance', 'account_balance -'.$withdraw_amount, FALSE);
			$this->db->set('charges_amount', 'charges_amount +'.$withdraw_charge, FALSE);
			return $this->db->update($this->table);
		}

		public function sumup_account_balance_amount(){
			$this->db->select_sum('account_balance');
	        $this->db->from($this->table);
	        $data = $this->db->get();
	        $query = $data->row();
	        return $query->account_balance;
	    }

    }