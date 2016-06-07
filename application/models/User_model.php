<?php

class User_model extends CI_Model
{
    /*
        Ref: https://www.youtube.com/watch?v=-F7FsNrxdAM
        https://github.com/JuanWilde/WeatherAPI
    */
    public function __construct()
    {
        parent::__construct();
    }

    public function login($access)
	{
		$query = $this->db->select('*')->from('user')->where(array('nick' => $access['nick'], 'password' => $access['password']));
		if ($query->num_rows() === 1) {
            return $query->row_array();
        }
        return null;
	}
    
    public function get($id = null)
    {
        if (!is_null($id)) {
            $query = $this->db->select('*')->from('page')->where('id', $id)->get();
            if ($query->num_rows() === 1) {
                return $query->row_array();
            }
            return null;
        }
        $query = $this->db->select('*')->from('page')->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return null;
    }
    
    public function save($pagina)
    {
        $this->db->set($this->_setPagina($pagina))->insert('page');
        if ($this->db->affected_rows() === 1) {
            return $this->db->insert_id();
        }
        return null;
    }
    
    public function update($pagina)
    {
        $id = $city['id'];
        $this->db->set($this->_setPagina($pagina))->where('id', $id)->update('page');
        if ($this->db->affected_rows() === 1) {
            return true;
        }
        return null;
    }
    public function delete($id)
    {
        $this->db->where('id', $id)->delete('page');
        if ($this->db->affected_rows() === 1) {
            return true;
        }
        return null;
    }
    private function _setPagina($pagina)
    {
        return array(
            'titulo' => $pagina['titulo'],
            'contenido' => $pagina['contenido'],
            'creadoPor' => $pagina['creadoPor']
        );
    }
}