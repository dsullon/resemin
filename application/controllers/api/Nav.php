<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/libraries/REST_Controller.php';

class Nav extends REST_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('nav_model');
    }
    
    public function navs_get()
    {
       $nav = $this->nav_model->obtener();
       if(!is_null($nav)){
            $this->response(array('response' => $nav), 200);
       }else{
            $this->response(array('error' => 'No hay registros en la base de datos...'), 404);
       }
    }
    
    public function nav_get($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $menu = $this->menu_model->obtener($id);
        if (!is_null($menu)) {
            $this->response(array('response' => $menu), 200);
        } else {
            $this->response(array('error' => 'Registro no encontrado...'), 404);
        }
    }
    
    public function nav_post()
    {
        if (!$this->post('menu')) {
            $this->response(null, 400);
        }
        $id = $this->menu_model->grabar($this->post('menu'));
        if (!is_null($id)) {
            $this->response(array('response' => $id), 200);
        } else {
            $this->response(array('error', 'Algo fall&oacute; en el servidor...'), 400);
        }
    }
    
    public function nav_put()
    {
        if (!$this->put('menu')) {
            $this->response(null, 400);
        }
        $update = $this->menu_model->actualizar($this->put('menu'));
        if (!is_null($update)) {
            $this->response(array('response' => 'Registro actualizado!'), 200);
        } else {
            $this->response(array('error', 'Algo fall&oacute; en el servidor...'), 400);
        }   
    }
    
    public function index_delete($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $delete = $this->menu_model->eliminar($id);
        if (!is_null($delete)) {
            $this->response(array('response' => 'Registro eliminado!'), 200);
        } else {
            $this->response(array('error', 'Algo fall&oacute; en el servidor...'), 400);
        }
    }
}