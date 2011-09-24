<?php

class Produtos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('produto_model', 'categoria_model'));
        $this->load->library(array('table', 'pagination', 'cart'));
//        $this->load->helper(array('url', 'form'));

        $categorias = $this->categoria_model->get_all_categories();
    }

    public function index() {
        $this->lista();
    }
    
    public function lista($cat_id ='') {
        $num = $this->produto_model->count_categories();
        $produtos = $this->produto_model->get_products(100,0,$cat_id);
        
        $data['titulo'] = "ByteStore";
        $data['produtos'] = $produtos;
        $data['categorias'] = $this->categoria_model->get_all_categories();
        
        if($cat_id == '') {
            $this->load->view('partials/header',$data);
            $this->load->view('partials/sidebar',$data);
            $this->load->view('produtos/list',$data);
            $this->load->view('partials/footer');
        } else {
            $this->load->view('produtos/list',$data);
        }
    }
    
    public function view($id) {
        echo "Detalhes do produto $id";
    }
}
/* */
