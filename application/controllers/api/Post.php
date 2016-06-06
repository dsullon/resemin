<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/libraries/REST_Controller.php';

class Post extends REST_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
    }
    
    public function index_get()
    {
       $posts = $this->post_model->get();
       if(!is_null($posts)){
            $this->response(array('response' => $posts), 200);
       }else{
            $this->response(array('error' => 'No hay registros en la base de datos...'), 404);
       }
    }
    
    public function find_get($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $post = $this->post_model->get($id);
        if (!is_null($post)) {
            $this->response(array('response' => $post), 200);
        } else {
            $this->response(array('error' => 'Registro no encontrado...'), 404);
        }
    }
    
    public function index_post()
    {
        
        if (!$this->post('titulo')) {
            $this->response(array('error' => 'No se establecio el valor para titulo'), 400);
        }
        if (!$this->post('contenido')) {
            $this->response(array('error' => 'No se establecio el valor para contenido'), 400);
        }
        $data = array(
	  			'titulo' => $this->post('titulo'),
	  			'contenido' => $this->post('contenido')
			);
        $id = $this->post_model->save($data);
        if (!is_null($id)) {
            $this->response(array('response' => $id), 200);
        } else {
            $this->response(array('error', 'Algo fallo; en el servidor...'), 400);
        }
    }
    
    public function index_put()
    {
        if (!$this->put('post')) {
            $this->response(null, 400);
        }
        $update = $this->post_model->update($this->put('post'));
        if (!is_null($update)) {
            $this->response(array('response' => 'Registro actualizado!'), 200);
        } else {
            $this->response(array('error', 'Algo fallo; en el servidor...'), 400);
        }   
    }
    
    public function index_delete($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $delete = $this->post_model->delete($id);
        if (!is_null($delete)) {
            $this->response(array('response' => 'Registro eliminado!'), 200);
        } else {
            $this->response(array('error', 'Algo fall&oacute; en el servidor...'), 400);
        }
    }
}