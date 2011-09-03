<?php

class administrator extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data['title'] = 'ByteStore - Administração';
        $this->load->view('partials/admin/header',$data);
        $this->load->view('admin/home/index');
        $this->load->view('partials/admin/footer');
    }
}
?>