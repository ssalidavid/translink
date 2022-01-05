<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 /**
  * Roles Controoler
  */
 class Roles extends Admin_Controller{

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('admin/roles/roles_model','role');
 	}

    public function index(){
        $data['title'] = $this->sspname.'Roles';
        $this->render_template('admin/role/roles', $data);
    }

    public function generate_role(){
        $list = $this->role->get_role_information();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $record) {
            $no++;
            $row = array();
            $row[] = '<div class="text-center"><input type="checkbox" class="data-check" value="'
            .$record->role_id.'">
            </div>';
            $row[] = $no;
            $row[] = $record->name;
            $row[] = '<div class="text-center">
            <a class="btn  btn-sm" style="background-color:#0277bd;color: #fff;" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="View Record" onclick="view_role(' . "'" . $record->role_id . "'" .')">
            <i class="fa fa-eye"></i>
            </a>
            <a class="btn btn-success btn-sm" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Update Record" onclick="update_role(' . "'" . $record->role_id . "'" . ')">
            <i class="fa fa-edit"></i>
            </a>
            <a class="btn btn-danger btn-sm"  href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Delete Record" onclick="delete_role(' . "'" . $record->role_id . "'" . ',' . "'" .$record->name . "'" . ')"><i class="fa fa-trash"></i>
            </a>
            </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->role->count_all_role(),
            "recordsFiltered" => $this->role->count_filtered_role(),
            "data" => $data,
        );
	    //output to json format
        echo json_encode($output);
    }

    public function get_records_by_role_id($role_id){
        $data = $this->role->get_by_role_id($role_id);
        echo json_encode($data);
    }

    public function add_new_role(){
        $this->validate_role_records();
        $role_name = $this->input->post('role');
        $max_role = $this->role->get_maximun_role_id();
        $role = $max_role + 1;

        $data = array(
        	'role' =>  $role,
          'name' => $this->input->post('role'),
          'role_type' => 'custom'
      );
        //check for existence
        $checkexistName    = $this->role->check_role_name($role_name);
        if ($this->userdata['role'] == 1){
            # check if faculty name already added...
            if($checkexistName > 0){
                echo json_encode("role_name_exists");
            }else{

                $insert = $this->role->save_role_record($data);
                echo json_encode(array("status" => TRUE));
            } 
        }else{
            echo json_encode("access_denied");
        } 
    }

    public function update_role_records(){
        $this->validate_role_records();
        $data = array(
            'name' => $this->input->post('role'),
        );
        $role_id =  $this->input->post('roleid');
        # check user permission
        if ($this->userdata['role'] == 1) {
            $this->role->update_role_record($role_id, $data);
            echo json_encode(array("status" => TRUE));
        }else{
            echo json_encode("access_denied");
        }
    }

    public function delete_role_record($role_id){
        # check user permission
        if ($this->userdata['role'] == 1) {
            $this->role->delete_by_role_id($role_id);
            echo json_encode(array("status" => TRUE));
        }else{
            echo json_encode("access_denied");
        }
    }

    public function bulk_role_delete(){
        $selectedRoleID = $this->input->post('role_id');
        # check user permission
        if ($this->userdata['role'] == 1) {
            foreach ($selectedRoleID as $role_id) {
                # perform class delete...
                $this->role->delete_by_role_id($role_id);
            }
            echo json_encode(array("status" => TRUE));
        }else{
            echo json_encode("access_denied");
        }
    }


    private function validate_role_records(){
    	$data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        if ($this->input->post('role') == '') {
            $data['inputerror'][] = 'role';
            $data['error_string'][] = 'Role Name is required';
            $data['status'] = FALSE;
        }
        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

}