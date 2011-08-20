<?php

class Cliente extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('cliente_model');
        $this->load->library(array('table', 'pagination'));
        $this->load->helper('url');
    }

    public function index() {
        $this->lista();
    }

    public function view($id = 0, $nome = "Novo Cliete") {
        $cliente = $this->cliente_model->get_by_id($id);
        $fields = $this->cliente_model->get_fields();
        
        if($id == 0){
            $data['acao'] = "new";
        }  else {
            $data['acao'] = "edit";
        }
        $data['cliente'] = $cliente;
        $data['titulo'] = $nome;
        $data['campos'] = $this->corrige_fields($fields);
        $data['fields'] = $fields;
        
        $this->load->view('admin/cliente/view', $data);
    }

    public function lista() {
        $config['base_url'] = base_url() . 'index.php/admin/cliente/lista/';
        $config['total_rows'] = $this->cliente_model->count_clients();
        $config['per_page'] = '10';
        $config['full_tag_open'] = '<p class="pagination">';
        $config['full_tag_close'] = '</p>';
        $config['first_link'] = '<<';
        $config['last_link'] = '>>';

        $clientes = $this->cliente_model->get_clients($config['per_page'], $this->uri->segment(3, 0));

        $this->pagination->initialize($config);

        $data['clientes'] = $clientes;
        $data['titulo'] = "Clientes";

        $this->load->view('admin/cliente/index', $data);
    }

    public function corrige_fields($fields) {
        $i = 0;
        foreach ($fields as $field) {
            $newFields[$i] = ucfirst(str_replace('_', ' ', $field));
            $i++;
        }
        return $newFields;
    }

    public function delete($id) {
        echo "exclusão de cliente";
    }

    public function edit() {
        if(!isset($_POST['newsletter'])){
            $_POST['newsletter'] = 0;
        }
        //$res = print_r($_POST);
        $res = $this->cliente_model->edit($_POST);
        echo $res;
    }

}

/* fim do arquivo admin/cliente.php */