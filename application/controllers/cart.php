<?php

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('produto_model', 'categoria_model'));
        $this->load->library(array('table', 'pagination'));
        $this->load->library('cart');
    }

    public function index() {
        $this->view();
    }
    
    public function view() {
        $data['titulo'] = "Carrinho";
        $this->load->view('partials/header',$data);
        $this->load->view('partials/sidebar',$data);
        if ($this->cart->total_items() <= 0) {
            $data['itens'] = "Carrinho vazio";
        } else {
            $data['itens'] = $this->cart->contents();
        }
        $this->load->view('cart/view',$data);
        $this->load->view('partials/footer');
    }
    
    public function resumo() {
        if ($this->cart->total_items() <= 0) {
            echo "Carrinho vazio";
        } else {
            echo "Você tem ".$this->cart->total_items()." no seu carrinho, ";
            echo "totalizando R$ ".$this->cart->total();
        }
    }
    
    public function compra() {
//        $this->cart->product_id_rules = '.a-z0-9_';
        $this->cart->product_name_rules = ',;&.\:-_ a-z0-9';
        
        $prod_id = $this->input->get('prod_id');
        $produto = $this->produto_model->get_by_id($prod_id);

        $data = array(
            'id' => $produto['id'],
            'qty' => 1,
            'price' => $produto['valor'],
            'name' => htmlspecialchars($produto['nome'])
        );
        
        if(! $this->cart->insert($data)) {
            echo "_erro";
        }
        
    }
    
    public function purge() {
        $this->cart->destroy();
    }
}

?>
