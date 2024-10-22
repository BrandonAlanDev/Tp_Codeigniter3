<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public $datos=array();
    public $usuario_model;
	public function index()
	{
		$this->load->view('auth');
	}
    public function login(){
		$this->load->library('form_validation');
        $this->form_validation->set_rules('usuario','Usuario', 'trim|strtolower|required');
        $this->form_validation->set_rules('password','Contraseña','required');
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('auth',$this->datos);
        }else{
            $this->load->model('Usuario_model', 'usuario_model');
            $usuario = set_value("usuario");
            $password = set_value("password");
            if( $uid = $this->usuario_model->check_usuario($usuario, $password) ){
                    $u=$this->usuario_model->get_by_id($uid);
                    $this->session->set_userdata("usuario_id",$uid);
                    $this->session->set_userdata("usuario", $u["usuario"]);
                    redirect('contactos/index');
            }else{
                $this->session->set_flashdata('OP','INCORRECTO');
                redirect('auth/login');
            }
        }
	}
	public function salir()
	{
        $this->session->sess_destroy();
        
		redirect('auth/index');
	}
}
