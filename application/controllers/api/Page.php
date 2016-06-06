<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/libraries/REST_Controller.php';

class Page extends REST_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model');
    }
    
    public function pages_get()
    {
       $paginas = $this->page_model->get();
       if(!is_null($paginas)){
            $this->response(array('response' => $paginas), 200);
       }else{
            $this->response(array('error' => 'No hay registros en la base de datos...'), 404);
       }
    }
    
    public function page_get($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $pagina = $this->page_model->get($id);
        if (!is_null($pagina)) {
            $this->response(array('response' => $pagina), 200);
        } else {
            $this->response(array('error' => 'Registro no encontrado...'), 404);
        }
    }
    
    public function page_post()
    {
        /*if (!$this->post('pagina')) {
            $this->response(array('error', $this->post('pagina')), 400);
        }*/
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
        $id = $this->page_model->save($data);
        if (!is_null($id)) {
            $this->response(array('response' => $id), 200);
        } else {
            $this->response(array('error', 'Algo fallo; en el servidor...'), 400);
        }
    }
    
    public function page_put()
    {
        if (!$this->put('pagina')) {
            $this->response(null, 400);
        }
        $update = $this->page_model->update($this->put('pagina'));
        if (!is_null($update)) {
            $this->response(array('response' => 'Registro actualizado!'), 200);
        } else {
            $this->response(array('error', 'Algo fallo; en el servidor...'), 400);
        }   
    }
    
    public function page_delete($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $delete = $this->page_model->delete($id);
        if (!is_null($delete)) {
            $this->response(array('response' => 'Registro eliminado!'), 200);
        } else {
            $this->response(array('error', 'Algo fall&oacute; en el servidor...'), 400);
        }
    }
}