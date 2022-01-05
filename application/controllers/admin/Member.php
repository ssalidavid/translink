<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Member extends Admin_Controller{
 	
 	function __construct(){
 		parent::__construct();
 		$this->load->model('admin/roles/roles_model','role');
 		
 	}

 	public function index(){
        $role = 2;
 		$data['roleRow'] = $this->role->get_by_role_id($role);
 		$data['title'] = $this->sspname.'Member';
 		$this->render_template('admin/member/members', $data);
 	}

 	public function generate_member(){
 		$list = $this->member->get_member_information();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $record) {
            $no++;
            $row = array();
            $row[] = '<div class="text-center"><input type="checkbox" class="data-check" value="'.
            			$record->id.'">
            		</div>';
            $row[] = $no;
            $row[] = $record->name;
            $row[] = $record->sex;
            $row[] = $record->address;
            $row[] = $record->phone;
            $row[] = $record->nok_name;
            if ($record->photo == "") {
            	$row[] = '<img src="'.base_url('uploads/users/nophoto.jpg').'" style="height:20px; width:20px" class="" onclick="view_photo('."'".$record->id."'".')" />
            	';
            }else{
            	$row[] = '<img src="'.base_url('uploads/members/'.$record->photo).'" style="height:50px; width:auto" onclick="view_photo('."'".$record->id."'".')" />
            	';
            }
            $row[] = '
                <div class="dropdown text-center">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                    Actions
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li>
                        <a class="text-success" href="javascript:void(0)" onclick="view_member(' . "'" . $record->member_id . "'" . ')">
                        <i class="fa fa-eye"></i> View User
                        </a></li>
                        <li><a class="text-primary" href="javascript:void(0)" 
                            onclick="update_member(' . "'" . $record->member_id . "'" . ')">
                            <i class="fa fa-edit"></i> Edit User</a></li>
                        <li>
                            <a class="text-danger" href="javascript:void(0)" 
                                onclick="delete_member(' . "'" . $record->member_id . "'" . ',' . "'" . $record->name . "'" . ')">
                                <i class="fa fa-trash"></i> Delete User
                            </a>
                        </li>
                    </ul>
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

 	public function add_new_member(){
        $this->validate_member_records();
        $member_name = $this->input->post('member_name'); //member's name
        $contact    = $this->input->post('contact'); //member's contact
        //$account_no = $this->input->post('account_no');//member account number
        $password   = $this->generate_password();//password generater for every new member created
        $role_id = $this->input->post('designation'); 
        $account_no = $this->generate_account_no();
        
        $data = array(
            'member_id'    => $this->input->post('member_id'),
         	'name'        => $this->input->post('member_name'),
            'birthday'    => $this->input->post('birthday'),
            'sex'         => $this->input->post('sex'),
            'address'     => $this->input->post('address'),
        	'phone' => trim(preg_replace('/^0/', '+256', $this->input->post('contact'))),
            'account_no'  => $account_no,
            'username' => $this->input->post('username'),
            'nok_name'  => $this->input->post('nok_name'),
            'nok_contact'  => trim(preg_replace('/^0/', '+256', $this->input->post('nok_contact'))),
            'nationality'  => $this->input->post('nationality'),
            'designation' => $this->input->post('designation'),
            'join_date'   => $this->input->post('join_date').' '.date('H:i:s'),
            'date' => date('Y-m-d')
        );
        //check for existence
        $checkexistID = $this->member->check_member_id($this->input->post('member_id'));
        $checkexistContact = $this->member->check_member_contact($contact);
        $checkUserName = $this->member->check_username($this->input->post('username'));
        # check user permission
        if ($this->userdata['role'] == 1 || $this->userdata['role'] == 3){
            # check if the added member id already taken...
            if($checkexistID > 0){
                echo json_encode("member_id_exists");
            }elseif ($checkUserName > 0) {
            	echo  json_encode('username_exist');
            }elseif ($checkexistContact > 0){
            	 echo  json_decode("contact_exists");
            }else{
            	# check if the member photo is being uploaded
            	if (!empty($_FILES['photo']['name'])) {
		            $upload = $this->do_upload_member_photo();
		            $data['photo'] = $upload;
		        }
                $insert = $this->member->save_member_record($data);
                # creating member accounts automatically
                $newData = array(
                	'role' =>  $this->input->post('designation'),
                	'username' => $this->input->post('username'),
                	'member_id' => $this->input->post('member_id'),
                	'password' => $password,
                    'account_no'  => $account_no,
                	'status' => 'active',
                	'name' =>  $this->input->post('member_name'),
                	'phone' =>  trim(preg_replace('/^0/', '+256', $this->input->post('contact'))),
                	'jdate' =>  $this->input->post('join_date'),
                	'created_at' => date('h:i:sa'),
                	);
                # check if the staff photo is being uploaded
            	if (!empty($_FILES['photo']['name'])) {
		            move_uploaded_file($_FILES['photo']['tmp_name'], './uploads/users/'.$upload);
		            $newData['photo'] = $upload;
		        }
		        $this->users_model->save_users($newData);
		        # message to be sent to member after registration
        		#$msg = "New Account Creation!\nHere is your Login Account Details:\nMember ID : ".$this->input->post('member_id')."\nPassword : ".$password."\nYou can login at  ".base_url();
        		# send SMS
        		#$recipients = trim(preg_replace('/^0/', '+256', $this->input->post('contact')));
        		#$results = $this->gateway->sendMessage($recipients, $msg);
        		// if ($results == TRUE) {
        		// 	# message sent...
        		// 	echo json_encode(array("status" => TRUE));
        		// }else{
        		// 	echo json_encode("not_sent");
        		// }
            } 
        }else{
            echo json_encode("access_denied");
        } 
    }

    public function get_records_by_member_id($member_id){
        $data = $this->member->get_by_member_id($member_id);
        echo json_encode($data);
	}

	public function get_members_account_info($member_id){
		$data = $this->member->get_members_info_by_member_id($member_id);
		echo json_encode($data);
	}

	private function generate_password(){
		$chareacters = "ABCDEFGHIJKLMNOPQRSTUVWXYabcdefghijklmnopqrstuvwxyz!023456789@#$%&*()-=_.,/";
		$pass_character = str_shuffle($chareacters);
		$pass = substr($pass_character, 0, 10);
		return $pass;

	}

	private function generate_account_no(){
		$chareacters = "0123456789";
		$pass_character = str_shuffle($chareacters);
		$pass = substr($pass_character, 0, 10);
		return $pass;

	}

	public function update_member_records(){
        $this->validate_member_records();
        $role_id = $this->input->post('designation');
        $roleName = $this->users_model->get_role_name($role_id);
        $data = array(
            'member_id' => $this->input->post('member_id'),
         	'name'  => $this->input->post('member_name'),
            'birthday' => $this->input->post('birthday'),
            'sex' => $this->input->post('sex'),
            'address' => $this->input->post('address'),
            'phone' => trim(preg_replace('/^0/', '+256', $this->input->post('contact'))),
            'account_no' => $this->input->post('account_no'),
            'nok_name'  => $this->input->post('nok_name'),
            'nok_contact'  => trim(preg_replace('/^0/', '+256', $this->input->post('nok_contact'))),
            'nationality'  => $this->input->post('nationality'),
            'designation' => $this->input->post('designation'),
            'join_date'   => $this->input->post('join_date')
        );
        $id = $this->input->post('Mid');
        # check user permission
        if ($this->userdata['role'] == 1 || $this->userdata['role'] == 3) {
        	if (!empty($_FILES['photo']['name'])) {
	            $upload = $this->do_upload_member_photo();
	            # Removing the existing member profile picture
	            $memberRow = $this->member->get_by_member_id($this->input->post('Mid'));
	            if(file_exists('uploads/members/'.$memberRow->photo) && $memberRow->photo){
	                unlink('uploads/members/'.$memberRow->photo);
	            }
	            $data['photo'] = $upload;
            }
            $this->member->update_member_record($id, $data);
            echo json_encode(array("status" => TRUE));
        }else{
            echo json_encode("access_denied");
        }
    }

    public function delete_member_record($member_id){
        # check user permission
        if ($this->userdata['role'] == 1) {
        	# Removing the existing member picture
            $memberRow = $this->member->get_members_info_by_member_id($member_id);
            if(file_exists('uploads/members/'.$memberRow->photo) && $memberRow->photo){
                unlink('uploads/members/'.$memberRow->photo);
            }
            # delete member information from member information
            $this->member->delete_by_member_id($member_id);
            # delete member information from transaction table
            $this->transaction->delete_member_information($member_id);
            echo json_encode(array("status" => TRUE));
        }else{
            echo json_encode("access_denied");
        }
    }

    public function bulk_member_delete(){
        $selectedMemberID = $this->input->post('member_id');
        # check user permission
        if ($this->userdata['role'] == 1) {
            foreach ($selectedMemberID as $member_id) {
            	# Removing the existing member picture
	            $memberRow = $this->member->get_members_info_by_member_id($member_id);
	            if(file_exists('uploads/members/'.$memberRow->photo) && $memberRow->photo){
	                unlink('uploads/members/'.$memberRow->photo);
	            }
                # delete member information from member table
                $this->member->delete_by_member_id($member_id);
                # delete member information from transaction table
                $this->transaction->delete_member_information($member_id);
            }
            echo json_encode(array("status" => TRUE));
        }else{
            echo json_encode("access_denied");
        }
    }

    public function generate_member_id(){
    	$this->input->post('member_id');
    }

    private function do_upload_member_photo() {
    	$staffName = $this->input->post('member_name');
        $config['upload_path'] = './uploads/members/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']             = 8400; //set max size allowed in Kilobyte
        $config['max_width']            = 6000; // set max width image allowed
        $config['max_height']           = 6000; // set max height allowed
        //$config['file_name'] = round(microtime(true) * 1000);
        $config['file_name'] = $staffName; 
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('photo')) { //upload and validate
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload Error: ' . $this->upload->display_errors('', ''); 
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

 	private function validate_member_records(){

    	$data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        if ($this->input->post('member_id') == ''){
            $data['inputerror'][] = 'member_id';
            $data['error_string'][] = 'member Role id is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('member_name') == ''){
            $data['inputerror'][] = 'member_name';
            $data['error_string'][] = 'member name is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('birthday') == ''){
            $data['inputerror'][] = 'birthday';
            $data['error_string'][] = 'Birthday is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('sex') == ''){
            $data['inputerror'][] = 'sex';
            $data['error_string'][] = 'Sex is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('address') == ''){
            $data['inputerror'][] = 'address';
            $data['error_string'][] = 'Address is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('contact') == ''){
            $data['inputerror'][] = 'contact';
            $data['error_string'][] = 'Phone number is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('username') == ''){
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'Username is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('nationality') == ''){
            $data['inputerror'][] = 'nationality';
            $data['error_string'][] = 'Nationality is required';
            $data['status'] = FALSE;
        }
         if ($this->input->post('nok_name') == ''){
            $data['inputerror'][] = 'nok_name';
            $data['error_string'][] = 'next of name is required';
            $data['status'] = FALSE;
        }
         if ($this->input->post('nok_contact') == ''){
            $data['inputerror'][] = 'nok_contact';
            $data['error_string'][] = 'next of kin contact is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('designation') == ''){
            $data['inputerror'][] = 'designation';
            $data['error_string'][] = 'Designation is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('join_date') == ''){
            $data['inputerror'][] = 'join_date';
            $data['error_string'][] = 'Join date is required';
            $data['status'] = FALSE;
        }
        if ($data['status'] === FALSE){
            echo json_encode($data);
            exit();
        }
    }
}