<?php
/**
 * Admin Controller 
 */
class MY_Controller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
}


/**
 * 
 */
class Admin_Controller extends MY_Controller{
	
	public function __construct()
	{
		parent::__construct();
		
		if (empty($_SESSION['id'])){
			$this->session->set_flashdata('error', '<i class="fa fa-exclamation-triangle"></i>  Session Expired: Your Login Session has Expired!<br> Please, Re-login Again!',2);
            redirect(base_url('admin/login'));
        }else{
        	# load users model
       		$this->load->model("users/users_Model","users_model");
	        $this->userdata = $this->users_model->get_user_details($_SESSION['id']);
	        # load member model
	        $this->load->model('admin/member/member_model','member');
	        # load saving account model
	        $this->load->model('admin/accounts/savings_account_model','savings');
	
	        # load setting model
        	$this->load->model('admin/settings/settings_model','settings');
	        # get setting id maximun
	        $setting_id = $this->settings->get_maximum_setting_id();
	        # get system information
	        $this->systemdata = $this->settings->get_setting_by_id($setting_id);
	        # check if the system name is not null
	        if ($this->systemdata->spname == '') {
	            $this->sspname = $this->systemdata->spname;
	        }else{
	            $this->sspname = $this->systemdata->spname.' | ';
	        }
	        # load SMS API Library
	        require_once APPPATH.'libraries/bulksms/AfricasTalkingGateway.php';
		    require_once APPPATH.'libraries/bulksms/config_bulk_sms.php';
		    $this->username = APPUSER;
		    $this->apikey = APPAPIKEY;
        	$this->gateway = new AfricasTalkingGateway($this->username, $this->apikey);
        }
	}


	public function render_template($page = null, $data = array()){
		$data['uroles'] = $this->users_model->get_user_roles();
 		$this->load->view('admin/templates/header',$data);
		$this->load->view($page, $data);
		$this->load->view('admin/templates/footer',$data);
	}

	public function render_404_template(){
		$data['title'] = "404 - Page Not Found";
        $this->load->view('errors/404',$data);
	}
}