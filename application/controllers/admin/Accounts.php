<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 /**
  * Accounts Controoler
  */
class Accounts extends Admin_Controller{

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('admin/roles/roles_model','role');
 		$this->load->model('admin/member/member_model','member');
 	}


 	public function index(){
 		$data['roles'] = $this->role->get_roles();
 		$data['title'] = $this->sspname.'Member';
 		$this->render_template('admin/accounts/account', $data);
 	}

 	public function generate_member(){
 		$list = $this->member->get_member_information();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $record) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $record->name;
            $row[] = $record->member_id;
            $row[] = $record->phone;
            $row[] = $record->account_no;
            $row[] = number_format($record->account_balance, 2);
            if ($record->photo == "") {
            	$row[] = '<img src="'.base_url('uploads/users/nophoto.jpg').'" style="height:20px; width:20px" class="" onclick="view_photo('."'".$record->id."'".')" />
            	';
            }else{
            	$row[] = '<img src="'.base_url('uploads/members/'.$record->photo).'" style="height:50px; width:auto" onclick="view_photo('."'".$record->id."'".')" />
            	';
            }
            $row[] = '<div class="text-center">
                <!--<a class="btn btn-success btn-sm" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Make Transaction">
                <i class="fa fa-usd"></i>
                </a>-->
                <a class="btn btn-danger btn-sm"  href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Delete Record" onclick="delete_member(' . "'" . $record->id."'".','."'".$record->name . "'" . ')"><i class="fa fa-trash"></i>
                </a>
                </div>
            ';
            //add html for action
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->member->count_all_member(),
            "recordsFiltered" => $this->member->count_filtered_member(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    /** SAVING ACCOUNTS **/

    public function savings_account(){
     $data['title'] = $this->sspname.'Saving Accounts';
     $this->render_template('admin/accounts/savings', $data);
 }

 public function generate_savings_account(){
     $list = $this->savings->get_savings_account_information();
     $data = array();
     $no = $_POST['start'];
     foreach ($list as $record) {
        $no++;
        $row = array();
        $row[] = '<div class="text-center"><input type="checkbox" class="data-check" value="'
        .$record->account_id.'">
        </div>';
        $row[] = $no;
        $row[] = $record->account_name;
        $row[] = number_format($record->account_balance, 2);
        $row[] = number_format($record->charges_amount, 2);
        $row[] = '<div class="text-center">
        <a class="btn  btn-sm" style="background-color:#0277bd;color: #fff;" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="View Record" onclick="view_savings(' . "'" . $record->account_id . "'" .')">
        <i class="fa fa-eye"></i>
        </a>
        <a class="btn btn-success btn-sm" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Update Record" onclick="update_savings(' . "'" . $record->account_id . "'" . ')">
        <i class="fa fa-edit"></i>
        </a>
        <a class="btn btn-danger btn-sm"  href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Delete Record" onclick="delete_savings(' . "'" . $record->account_id . "'" . ',' . "'" .$record->account_name . "'" . ')"><i class="fa fa-trash"></i>
        </a>
        </div>';
        $data[] = $row;
    }
    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->savings->count_all_savings_account(),
        "recordsFiltered" => $this->savings->count_filtered_savings_account(),
        "data" => $data,
    );
	    //output to json format
    echo json_encode($output);
}

public function get_savings_by_account_id($account_id){
    $data = $this->savings->get_by_savings_account_id($account_id);
    echo json_encode($data);
}

public function get_savings_account_info(){
    $data = $this->savings->generate_savings_account();
    echo json_encode($data);
}

public function add_new_savings_account(){
    $this->validate_savings_account();
    $account_name = $this->input->post('account_name');
    $data = array(
      'account_name' => $this->input->post('account_name'),
      'created_at' => date('Y-m-d h:i:s A')
  );
        //check for existence
    $checkexistName    = $this->savings->check_savings_account_name($account_name);
    if ($this->userdata['role'] == 1){
            # check if faculty name already added...
        if($checkexistName > 0){
            echo json_encode("account_name_exists");
        }else{

            $insert = $this->savings->save_savings_account_record($data);
            echo json_encode(array("status" => TRUE));
        } 
    }else{
        echo json_encode("access_denied");
    } 
}

public function update_savings_account(){
    $this->validate_savings_account();
    $data = array(
        'account_name' => $this->input->post('account_name'),
    );
    $accountid =  $this->input->post('accountid');
        # check user permission
    if ($this->userdata['role'] == 1) {
        $this->savings->update_savings_account_record($accountid, $data);
        echo json_encode(array("status" => TRUE));
    }else{
        echo json_encode("access_denied");
    }
}

public function delete_savings_account($account_id){
        # check user permission
    if ($this->userdata['role'] == 1) {
        $this->savings->delete_savings_by_account_id($account_id);
        echo json_encode(array("status" => TRUE));
    }else{
        echo json_encode("access_denied");
    }
}

public function savings_account_bulk_account(){
    $checkedAccountID = $this->input->post('account_id');
        # check user permission
    if ($this->userdata['role'] == 1) {
        foreach ($checkedAccountID as $account_id) {
                # perform class delete...
            $this->savings->delete_savings_by_account_id($account_id);
        }
        echo json_encode(array("status" => TRUE));
    }else{
        echo json_encode("access_denied");
    }
}


private function validate_savings_account(){
   $data = array();
   $data['error_string'] = array();
   $data['inputerror'] = array();
   $data['status'] = TRUE;
   if ($this->input->post('account_name') == '') {
    $data['inputerror'][] = 'account_name';
    $data['error_string'][] = 'Account Name is required';
    $data['status'] = FALSE;
}
if ($data['status'] === FALSE) {
    echo json_encode($data);
    exit();
}
}
}
