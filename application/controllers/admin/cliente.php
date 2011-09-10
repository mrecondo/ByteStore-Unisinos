<?php

class Cliente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cliente_model');        
        $this->load->helper(array('form'));
        $this->load->library(array('table', 'pagination'));
    }

    public function index() {
        $this->lista();
    }

    public function corrige_data($date) {
        $explode = explode('-', $date);
        $dia = explode(' ', $explode[2]);
        $data = $dia[0] . '/' . $explode[1] . '/' . $explode[0];
        return $data;
    }

    public function view($id = 0, $nome = "Novo Cliete") {
        if ($id == 'novo') {
            $data['acao'] = "novo";
            $data['title'] = 'Novo Cliente';
            $id = $this->cliente_model->get_max_id_clientes();
            $data['id'] = ($id->id + 1);
        } else {
            $data['acao'] = "edit";
            $cliente = $this->cliente_model->get_by_id($id);
            $cliente['data_cadastro'] = $this->corrige_data($cliente['data_cadastro']);
            $data['cliente'] = $cliente;
            $data['title'] = $nome;
        }
        $fields = $this->cliente_model->get_fields();
        $data['campos'] = $this->corrige_fields($fields);
        $data['fields'] = $fields;
        $this->load->view('partials/admin/header', $data);
        $this->load->view('admin/cliente/view', $data);
        $this->load->view('partials/admin/footer');
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
        $data['title'] = "Clientes";
        $this->load->view('partials/admin/header', $data);
        $this->load->view('admin/cliente/index', $data);
        $this->load->view('partials/admin/footer');
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
        $data['id'] = $id;
        $data['block'] = 1;
        $res = $this->cliente_model->edit($data);
        $this->session->set_flashdata('erro', 'Cliente excluído com sucesso');
        redirect('admin/cliente');
    }
    public function ativa($id) {
        $data['id'] = $id;
        $data['block'] = 0;
        $res = $this->cliente_model->edit($data);
        $this->session->set_flashdata('erro', 'Cliente ativado com sucesso');
        redirect('admin/cliente');
    }
    public function edit() {
        if (!isset($_POST['newsletter'])) {
            $_POST['newsletter'] = 0;
        }
        $res = $this->cliente_model->edit($_POST);
        if ($res) {
            echo "Atualização efetuada com Sucesso";
        } else {
            echo "Erro ao atualizar dados, contacte o Administrador";
        }
    }
    public function novo() { 
            $res = $this->cliente_model->save($_POST);
            if ($res) {
                echo "Atualização efetuada com Sucesso";
            } else {
                echo "Erro ao atualizar dados, contacte o Administrador";
            }        
    }
}

/* fim do arquivo admin/cliente.php */