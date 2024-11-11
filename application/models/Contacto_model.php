<?php
class Contacto_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getById($id) {
        $this->db->select('*');
        $this->db->from('contactos');
        $this->db->where('contacto_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function addContacto($nombre, $apellido, $email, $telefono, $userId) {
        $data = array(
            'contacto_nombre' => $nombre,
            'contacto_apellido' => $apellido,
            'contacto_email' => $email,
            'contacto_telefono' => $telefono,
            'usuario_id' => $userId
        );
        $this->db->insert('contactos', $data);
        return $this->db->affected_rows() > 0;  // Retorna true si se insertó con éxito
    }

    public function updateContacto($id, $nombre, $apellido, $email, $telefono) {
        $data = array(
            'contacto_nombre' => $nombre,
            'contacto_apellido' => $apellido,
            'contacto_email' => $email,
            'contacto_telefono' => $telefono
        );
        $this->db->where('contacto_id', $id);
        $this->db->update('contactos', $data);
        return $this->db->affected_rows() > 0;  // Retorna true si se actualizó con éxito
    }

    public function findAllByUsuarioId($userId) {
        $this->db->select('*');
        $this->db->from('contactos');
        $this->db->where('usuario_id', $userId);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>
