<?php
/**
 * 
 */
class Event extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Event_Model');
	}
	function index()
	{
		$id = $_GET['id'];
		$id = intval($id);
		$info = $this->Event_Model->get_info($id);

		$this->load->model('Time_Model');
		$input= array();
		$input['where']= array('id_sukien' => $id);
		$list_time= $this->Time_Model->get_list($input);
		$total_time = $this->Time_Model->get_total($input);
		

		$first= $this->Time_Model->get_first_record("id_sukien",$id);

		$this->data['total_time']= $total_time;
		$this->data['first']= $first;
		$this->data['list_time']= $list_time;
		$this->data['info']= $info;
		$this->data['temp']= 'site/event/index';
		$this->load->view('site/layout',$this->data);
	}

	function view_map()
	{
		$id_sukien= $_GET['id_sukien'];
		$info= $this->Event_Model->get_info($id_sukien);
		$this->data['info'] = $info;
		$type = "restaurant";
		if($this->input->post('submit')){
			$type = $this->input->post('type');
		}
		$this->load->view('site/event/map',$this->data);
	}
	function view_map1()
	{
		$id_sukien= $_GET['id_sukien'];
		$info= $this->Event_Model->get_info($id_sukien);
		$this->data['info'] = $info;
		$this->load->view('site/event/map1',$this->data);
	}
		function view_map2()
	{
		$id_sukien= $_GET['id_sukien'];
		$info= $this->Event_Model->get_info($id_sukien);
		$this->data['info'] = $info;
		$this->load->view('site/event/map2',$this->data);
	}
		function view_map3()
	{
		$id_sukien= $_GET['id_sukien'];
		$info= $this->Event_Model->get_info($id_sukien);
		$this->data['info'] = $info;
		$this->load->view('site/event/map3',$this->data);
	}
}	
?>