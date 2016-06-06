<?php

class Post_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get($id = null)
    {
        if (!is_null($id)) {
            $query = $this->db->select('*')->from('post')->where('id', $id)->get();
            if ($query->num_rows() === 1) {
                return $query->row_array();
            }
            return null;
        }
        $query = $this->db->select('*')->from('post')->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return null;
    }
    
    public function save($menu)
    {
        $this->db->set($this->_setMenu($menu))->insert('post');
        if ($this->db->affected_rows() === 1) {
            return $this->db->insert_id();
        }
        return null;
    }
    
    public function update($menu)
    {
        $id = $city['id'];
        $this->db->set($this->_setMenu($menu))->where('id', $id)->update('post');
        if ($this->db->affected_rows() === 1) {
            return true;
        }
        return null;
    }
    public function delete($id)
    {
        $this->db->where('id', $id)->delete('post');
        if ($this->db->affected_rows() === 1) {
            return true;
        }
        return null;
    }
    private function _setMenu($menu)
    {
        return array(
            'titulo' => $menu['titulo'],
            'contenido' => $menu['contenido']
        );
    }
}