<?php

class administrator extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        }else{
        $data['title'] = 'ByteStore - Administração';
        $this->load->view('partials/admin/header', $data);
        $this->load->view('admin/home/index');
        $this->load->view('partials/admin/footer');
        }
    }

}

?>