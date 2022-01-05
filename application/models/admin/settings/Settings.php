<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Classes Dashboard
 * created on 05.10.2019 08:30am
 */
 class Settings extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
	}
    
    public function index(){	
        $data['title']="Settings | Index";
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/settings/index');
		$this->load->view('admin/templates/footer');
    }
    

}
?>