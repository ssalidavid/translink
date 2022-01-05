<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Settings  Controller handling System Settings Information 
 * created on 17.10.2019 10:30am
 */
 class Settings extends Admin_controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/settings/settings_model','settings');
	}
    
    public function index(){	
        $data['title'] = $this->sspname."System Setting Information";
        $this->render_template('admin/settings/system',$data);
    }

    public function update_settings(){
        $this->_validate();
        $setting_id = $this->systemdata->sid;
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $data  = array(
            'sname' => $this->input->post('sname'), 
            'smotto' => $this->input->post('smotto'),
            'semail' => $this->input->post('semail'),
            'sphone' => $this->input->post('sphone'),
            'saddress' => $this->input->post('saddress'),
            'swurl' => $this->input->post('swurl'),
            'spname' => $this->input->post('spname'),
            'max_withdraw_amount' => $this->input->post('max_withdraw_amount'), 
            'min_withdraw_amount' => $this->input->post('min_withdraw_amount'),
            'max_deposit_amount' => $this->input->post('max_deposit_amount'),
            'min_deposit_amount' => $this->input->post('min_deposit_amount'),
            
            );
        # check user permission
        if ($this->userdata['role'] == 1) {
        	# access granted...
	        if (!empty($_FILES['logo']['name'])) {
	            $upload = $this->_do_upload();
	            # Removing the existing school logo
	            $logo_query = $this->settings->get_setting_by_id($setting_id);
	            if(file_exists('uploads/logo/'.$logo_query->sphoto) && $logo_query->sphoto){
	                unlink('uploads/logo/'.$logo_query->sphoto);
	            }

	            $data['sphoto'] = $upload;
	        }

	        $this->settings->update_settings($setting_id, $data);
	        //$this->settings->save_settings($data);
	        echo json_encode(array("status" => TRUE));
	    }else{
	    	# access denied...
	    	echo json_encode("access_denied");
	    }
    }

    private function _validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('sname') == '') {
            $data['inputerror'][] = 'sname';
            $data['error_string'][] = 'School Full Name is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('spname') == '') {
            $data['inputerror'][] = 'spname';
            $data['error_string'][] = 'System Short Name is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('sphone') == '') {
            $data['inputerror'][] = 'sphone';
            $data['error_string'][] = 'Telephone Number is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('saddress') == '') {
            $data['inputerror'][] = 'saddress';
            $data['error_string'][] = 'Address Name is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('smotto') == '') {
            $data['inputerror'][] = 'smotto';
            $data['error_string'][] = 'School Motto is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('semail') == '') {
            $data['inputerror'][] = 'semail';
            $data['error_string'][] = 'Email Address is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('swurl') == '') {
            $data['inputerror'][] = 'swurl';
            $data['error_string'][] = 'Website URL Link is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('min_deposit_amount') == '') {
            $data['inputerror'][] = 'min_deposit_amount';
            $data['error_string'][] = 'Minimum Deposit Amount is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('max_deposit_amount') == '') {
            $data['inputerror'][] = 'max_deposit_amount';
            $data['error_string'][] = 'Maximum Deposit Amount is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('min_withdraw_amount') == '') {
            $data['inputerror'][] = 'min_withdraw_amount';
            $data['error_string'][] = 'Minimum Withdraw Amount is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('max_withdraw_amount') == '') {
            $data['inputerror'][] = 'max_withdraw_amount';
            $data['error_string'][] = 'Minimum Withdraw Amount is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    private function _do_upload() {
        $config['upload_path'] = './uploads/logo/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']             = 4000; //set max size allowed in Kilobyte
        //$config['max_width']            = 290; // set max width image allowed
        //$config['max_height']           = 280; // set max height allowed
        $config['file_name'] = round(microtime(true) * 1000); 
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('logo')) { //upload and validate
            $data['inputerror'][] = 'logo';
            $data['error_string'][] = 'Upload Error: ' . $this->upload->display_errors('', ''); 
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    public function update_backgound_photo(){
        # Getting maximun setting id
        $setting_id = $this->systemdata->sid;
        # check if the background photo is uploaded
        if (!empty($_FILES['backgroundImg']['name'])) {
            $upload = $this->_do_upload_background();
            # Removing the existing school background logo
            $logo_query = $this->settings->get_setting_by_id($setting_id);
            if(file_exists('uploads/logo/'.$logo_query->sbackgphoto) && $logo_query->sbackgphoto)
                unlink('uploads/logo/'.$logo_query->sbackgphoto);

            $data['sbackgphoto'] = $upload;

            $this->settings->update_settings($setting_id, $data);
            echo json_encode(array("status" => TRUE));
        }else{
            $data['inputerror'][] = 'backgroundImg';
            $data['error_string'][] = 'Upload Error: Please, select the background photo to be Updated!'; 
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }  
    }

    private function _do_upload_background() {
        $config['upload_path'] = 'uploads/logo/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['min_size']             = 1000; //set max size allowed in Kilobyte
        $config['min_width']            = 1127; // set max width image allowed
        $config['min_height']           = 600; // set max height allowed
        $config['file_name'] = round(microtime(true) * 1000); 
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('backgroundImg')) { //upload and validate
            $data['inputerror'][] = 'backgroundImg';
            $data['error_string'][] = 'Upload Error: ' . $this->upload->display_errors('', ''); 
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
    

}