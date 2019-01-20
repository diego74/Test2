<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// load model
		$this->load->model('Services_model');

	}

	public function index($tag = 0)
	{
		// assign the data of all services to an array
		$data['allservices'] = $this->Services_model->get_services($tag);
		$data['alltag'] = $this->Services_model->get_types();
		$data['tag'] = $tag;
		// load the view - view_services.php
		$this->load->view('view_services',$data);
	}

	function get_service_byid($code = NULL) {

		if($service = $this->Services_model->getServiceByID($code)) {

			echo json_encode(array(
					'id' =>$service->id,
					'name' => $service->name ,
					'descript' => $service->description
			));

		} else {
			echo NULL;
		}

	}

	function update_service($id){

		$name = $_POST['name'];
		$descript = $_POST['descript'];

		$service = array(
			'name' => $name,
			'description' => $descript
		);

		$this->Services_model->updateService($id, $service);

	}

	function delete_service($id){

		$this->Services_model->deleteService($id);

	}

}
