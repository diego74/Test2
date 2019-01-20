<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services_model extends CI_Model {

	// Listar los servicios deacuerdo al tipo de servicio
	public function get_services($tag)
	{
	    $this->db->select('*');
		if($tag != 0) { $this->db->where('type_id', $tag); }
		$this->db->where('status !=', 0);
	    $query = $this->db->get('services');
	    return $query->result();
	}

	// Listar todos los tipos de servicio
	public function get_types()
	{
	    $this->db->select('*');
	    $query = $this->db->get('types');
	    return $query->result();
	}

	// Obtener datos de un servicio usando su ID
	public function getServiceByID($service_id)
	{
		$this->db->where('id', $service_id);
        $query = $this->db->get_where('services', array('id' => $service_id));
        return $query->row();
	}

	// // Actualizar servicio
	public function updateService($id, $data = array())
	{
		if ($this->db->update('services', $data, array('id' => $id))) {
            return true;
        }
        return false;
	}

	// // Eliminacion logica de un servicio
	public function deleteService($id)
	{
		if ($this->db->update('services', array('status' => 0), array('id' => $id))) {
			return true;
		}
		return false;
	}
}

/* End of file Services_model.php */
/* Location: ./application/models/Services_model.php */