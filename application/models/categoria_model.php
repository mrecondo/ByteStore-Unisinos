<?php

class Categoria_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_categories() {
        $res = $this->db->get('categorias'); // equivalente ao mysql_query()
        //return $res->result(); // equivalente ao mysql_fetch_object()
        return $res->result_array(); // equivalente ao mysql_fetch_array()
    }

    /* public function get_category($qtde,$offset) {
      $select = 'p.id as id,';
      $select.= 'p.nome as nome,';
      $select.= 'p.estoque as estoque,';
      $select.= 'p.valor as valor,';
      $select.= 'p.data_cadastro as data,';
      $select.= 'p.foto as foto,';
      $select.= 'p.usuario_id as usuario,';
      $select.= 'c.categoria as categoria';
      $this->db->select($select);
      $this->db->from('produtos p');
      $this->db->join('categorias c','p.categoria_id = c.id');
      $this->db->limit($qtde,$offset);
      $res = $this->db->get();
      return $res->result();
      } */

    public function get_fields() {
        return $this->db->list_fields('categorias');
    }

    public function count_categories() {
        //$this->db->where("id != ''");       
        return $this->db->count_all_results('categorias');
    }

    public function get_by_id($id) {
        $res = $this->db->get_where('categorias', array('id' => $id));
        return $res->row_array();
    }

    public function get_categories($qtde, $offset) {
        //$res = $this->db->get('categorias',$qtde,$offset);
        //return $res->result_array();
        $select = 'c.id as id,';
        $select.= 'c.categoria as categoria';
        $this->db->select($select);
        $this->db->from('categorias c');
        $this->db->limit($qtde, $offset);
        $res = $this->db->get();
        return $res->result();
    }

    public function get_category($id) {
        $res = $this->db->get_where('categorias', array('id' => $id));
        return $res->row_array();
    }

    public function delete($id) {        
        $this->db->where('id', $id);
        $this->db->delete('categorias');
    }

    public function update($id, $value) {
        $data = array(
            'categoria' => $value
        );
        $this->db->where('id', $id);
        $this->db->update('categorias', $data);
    }

    public function insert($value) {
        $data = array(
            'categoria' => $value
        );
        $this->db->insert('categorias', $data);
    }

}

?>
