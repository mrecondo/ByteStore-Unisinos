<?php

class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $this->load->model('categoria_model');
            $this->load->library('pagination');
            $this->load->helper('url');
        }
    }

    public function index() {
        //echo "Categorias";

        $this->lista();
    }

    public function view() {
        $categoria = $this->categoria_model->get_by_id($this->uri->segment(4));
        $data['categoria'] = $categoria;
        $data['title'] = "Categoria";

        $this->load->view('partials/admin/header', $data);
        $this->load->view('admin/categoria/categoria', $data);
        $this->load->view('partials/admin/footer');
    }

    public function lista() {
        // configuração do pagination
        $config['base_url'] = base_url() . 'index.php/admin/categoria/lista/';
        $config['total_rows'] = $this->categoria_model->count_categories();
        $config['per_page'] = '10';
        $config['full_tag_open'] = '<p class="pagination">';
        $config['full_tag_close'] = '</p>';
        $config['first_link'] = '<<';
        $config['last_link'] = '>>';
        $config['uri_segment'] = 4;

        $categoria = $this->categoria_model->get_categories($config['per_page'], $this->uri->segment(4, 0));

        $this->pagination->initialize($config);

        $data['categoria'] = $categoria;
        $data['title'] = "Categorias";

        $this->load->view('partials/admin/header', $data);
        $this->load->view('admin/categoria/index', $data);
        $this->load->view('partials/admin/footer');
    }

    public function delete($id) {
        $categoria = $this->categoria_model->delete($id);
        $this->session->set_flashdata('erro', 'Categoria excluída com sucesso');
        redirect('admin/categoria/lista');
    }

    public function edit($id) {
        $categoria = $this->categoria_model->get_category($id);
        $data['categoria'] = $categoria;
        $data['action'] = site_url('admin/categoria/save');
        $this->load->view('admin/categoria/save', $data);
    }

    public function save() {
        if ($this->input->post('id', TRUE) > 0) {
            $id = $this->input->post('id', TRUE);
            $value = $this->input->post('categoria', TRUE);
            $this->categoria_model->update($id, $value);
        } else {
            $value = $this->input->post('categoria', TRUE);
            $this->categoria_model->insert($value);
        }
        $this->lista();
    }

    public function insert() {

        $categoria = Array("id" => " ", "categoria" => " ");
        $data['categoria'] = $categoria;
        $data['action'] = site_url('admin/categoria/save');
        $this->load->view('admin/categoria/save', $data);
    }

}

/* fim do arquivo admin/produto.php */