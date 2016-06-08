<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/libraries/REST_Controller.php';

class User extends REST_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function login_post()
    {
        if (!$this->post('nick')) {
            $this->response(array('error' => 'No se establecio el valor para nick'), 400);
        }
        if (!$this->post('password')) {
            $this->response(array('error' => 'No se establecio el valor para password'), 400);
        }
        $data = array(
	  			'nick' => $this->post('nick'),
	  			'password' => $this->post('password')
			);
        $user = $this->user_model->login($data);
        if (!is_null($user)) {
            $this->response(array('response' => $user), 200);
        } else {
            $this->response(array('error' => 'Registro no encontrado...'), 404);
        }
    }
    
    public function users_get()
    {
       $paginas = $this->user_model->get();
       if(!is_null($paginas)){
            $this->response(array('response' => $paginas), 200);
       }else{
            $this->response(array('error' => 'No hay registros en la base de datos...'), 404);
       }
    }
    
    public function user_get($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $pagina = $this->user_model->get($id);
        if (!is_null($pagina)) {
            $this->response(array('response' => $pagina), 200);
        } else {
            $this->response(array('error' => 'Registro no encontrado...'), 404);
        }
    }
    
    public function user_post()
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
        $id = $this->user_model->save($data);
        if (!is_null($id)) {
            $this->response(array('response' => $id), 200);
        } else {
            $this->response(array('error', 'Algo fallo; en el servidor...'), 400);
        }
    }
    
    public function user_put()
    {
        if (!$this->put('pagina')) {
            $this->response(null, 400);
        }
        $update = $this->user_model->update($this->put('pagina'));
        if (!is_null($update)) {
            $this->response(array('response' => 'Registro actualizado!'), 200);
        } else {
            $this->response(array('error', 'Algo fallo; en el servidor...'), 400);
        }   
    }
    
    public function user_delete($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $delete = $this->user_model->delete($id);
        if (!is_null($delete)) {
            $this->response(array('response' => 'Registro eliminado!'), 200);
        } else {
            $this->response(array('error', 'Algo fall&oacute; en el servidor...'), 400);
        }
    }
}