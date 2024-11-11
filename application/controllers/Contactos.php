<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos extends CI_Controller {
    public $datos=array();
	public function __construct() {	
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect("auth/login");
		}else{
			$this->load->model("Contacto_model","contacto_model");
			$contactos = $this->contacto_model->findAllByUsuarioId($this->session->userdata('usuario_id'));
			if ($contactos) {
                $this->datos["contactos"] = $contactos;
            }
		}
	
	}
	public function index()
	{
		redirect("contactos/listar");
	}
	public function listar()
	{
		$this->mostrar('contactos/listar');
	}

	public function agregar(){
		$this->load->library('form_validation');
        $this->form_validation->set_rules('nombre','Nombre', 'required');
        $this->form_validation->set_rules('apellido','Apellido','required');
		$this->form_validation->set_rules('correo','Correo','required');
		$this->form_validation->set_rules('telefono','Telefono','required');
        if( $this->form_validation->run() == FALSE ){
            redirect('contactos/index');
        }else{
            $this->load->model('Contacto_model', 'contacto_model');
            $nombre = set_value("nombre");
            $apellido = set_value("apellido");
			$correo = set_value("correo");
			$telefono = set_value("telefono");
			$usuarioid= $this->session->userdata('usuario_id');
            if( $nombre && $apellido && $correo && $telefono && $usuarioid){
				$this->contacto_model->addContacto($nombre,$apellido,$correo,$telefono,$usuarioid);
            	redirect('contactos/index');
            }else{
                redirect('contactos/index');
            }
        }
	}

	public function eliminar($id) {
		if ($this->contacto_model->deleteContacto($id)) {
			$this->session->set_flashdata('mensaje', 'Contacto eliminado con éxito.');
		} else {
			$this->session->set_flashdata('error', 'Error al eliminar el contacto.');
		}
		redirect('contactos/listar');
	}

	function mostrar($vista=""){
		$this->datos["menu"]=$this->load->view("layouts/menu",null,true);
		$this->load->view($vista,$this->datos);
	}
}
