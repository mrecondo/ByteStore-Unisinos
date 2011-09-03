<?php

class Produtos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('produto_model','categoria_model'));
        $this->load->library(array('table', 'pagination'));
        $this->load->helper(array('url', 'form'));
        
        $categorias = $this->categoria_model->get_all_categories();
    }

    public function index() {
        $this->lista();
    }

    public function lista() {
        // configuração do pagination
        $config['base_url'] = base_url() . 'index.php/admin/produtos/lista/';
        $config['total_rows'] = $this->produto_model->count_categories();
        $config['per_page'] = '2';
        $config['full_tag_open'] = '<p class="pagination">';
        $config['full_tag_close'] = '</p>';
        $config['first_link'] = '<<';
        $config['last_link'] = '>>';
        $config['uri_segment'] = 4;

        $produtos = $this->produto_model->get_products($config['per_page'], $this->uri->segment(3, 0));

        $this->pagination->initialize($config);

        $data['produtos'] = $produtos;
        $data['title'] = "Produtos";

        $this->load->view('partials/admin/header', $data);
        $this->load->view('admin/produtos/index');
        $this->load->view('partials/admin/footer');
    }

    public function view() {
        $produto = $this->produto_model->get_by_id($this->uri->segment(4));
        $data['title'] = $produto['nome'];
        $data['produto'] = $produto;
        $data['categoria'] = $this->produto_model->get_category($produto['categoria_id']);
        $this->load->view('admin/produtos/produto', $data);
    }

    public function novo() {
        $data['title'] = 'Novo produto';
        $data['categorias'] = $this->categoria_model->get_all_categories();
        $this->load->view('partials/admin/header', $data);
        $this->load->view('admin/produtos/novo', $data);
        $this->load->view('partials/admin/footer');
    }

    public function edit() {
        // editar um produto
    }

    public function kill() {
        // excluir um produto
    }

    public function save() {
        
        extract($_POST);

        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('estoque', 'Estoque', 'numeric');
        $this->form_validation->set_rules('valor', 'Valor', 'decimal');
        $this->form_validation->set_rules('categoria', 'Categoria', '');

        if ((($_FILES["foto"]["type"] == "image/gif")
                || ($_FILES["foto"]["type"] == "image/jpeg")
                || ($_FILES["foto"]["type"] == "image/pjpeg")
                || ($_FILES["foto"]["type"] == "image/png"))
                && ($_FILES["foto"]["size"] < 20000)) {
            $nome_temp = $_FILES["foto"]["tmp_name"];
            $nome_arq = $_FILES["foto"]["name"];

            $num = now() + rand();
            $caminho = "./assets/image/produto/";
            $novo_nome = $caminho . $num . "_" . $nome_arq;

            if (!move_uploaded_file($nome_temp, $novo_nome)) {
                $novo_nome = "";
            }
        }

        $data = array(
            'nome' => $nome,
            'descricao' => $descricao,
            'categoria_id' => $categoria,
            'estoque' => $estoque,
            'valor' => $valor,
            'foto' => (isset($novo_nome)?$novo_nome:''),
            'data_cadastro' => date('Y-m-d H:i:s', now()),
            'usuario_id' => 1
        );

        $this->session->unset_userdata('erro');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Novo produto';
            $data['categorias'] = $this->categoria_model->get_all_categories();
            $this->load->view('partials/admin/header', $data);
            $this->load->view('admin/produtos/novo', $data);
            $this->load->view('partials/admin/footer');
        } else {
            if ($this->db->insert('produtos', $data)) {
                $this->session->set_userdata('erro', 'Produto incluído com sucesso.');
            } else {
                $this->session->set_userdata('erro', 'Erro ao incluir produto. Azar.');
            }
            redirect('admin/produtos/novo');
        }
    }

}

/* End of file produtos.php */
/* Location: ./application/controllers/admin/produtos.php */
