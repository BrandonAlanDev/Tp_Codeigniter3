<?php
class Usuario_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_by_id($id)
    {
        $this->db->select("*");
        $this->db->from("usuarios");
        $this->db->where("usuario_id",$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function check_usuario($usuario,$password) {
        $this->db->select('*');
        $this->db->from("usuarios");
        $this->db->where("usuario",$usuario);
        $this->db->where("password",$password);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $tmp = $query->row_array();
            return $tmp["usuario_id"];
        } else {
            return false;
        }
    }

}
?>