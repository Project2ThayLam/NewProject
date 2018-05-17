<?php

	/**
	* 
	*/
	class Home extends MY_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Event_Model');
			
		}
		function index()
		{	
			
			$total = $this->Event_Model->get_total();
			$this->data['total']= $total;

			$this->load->library('pagination');
			$config = array();
			$config['base_url']    = base_url('home/index');
			$config['total_rows']  = $total;
			$config['per_page']    = 5;
			$config['uri_segment'] = 3;
			$config['next_link']   = "Trang kế";
			$config['prev_link']   = "Trang trước";
			$config['last_link']   = ">>";
			$config['first_link']   = "<<";
			$this->pagination->initialize($config);

			$segment= $this->uri->segment(3);
			$segment = intval($segment);
			$input= array();
			$input['limit']= array($config['per_page'], $segment);


			$list= $this->Event_Model->get_list($input);
			$this->data['list']= $list;
			
			$this->data['temp']= 'site/home/index';
			$this->load->view('site/layout',$this->data);
		}

		function search()
		{
			if($this->input->post('search'))
			{
				$from = $this->input->post('from-date');
				$to = $this->input->post('to-date');
				if($from < $to)
				{
				$input['select'] = array("id_sukien");
				$input['where'] = array();
				$input['where']['ngay >='] = $from;
				$input['where']['ngay <='] = $to;
				$this->load->model('Time_Model');
				$list_id_su_kien = $this->Time_Model->get_list($input);
				if(empty($list_id_su_kien))
				{
					$this->session->set_flashdata('message','Không có kết quả phù hợp');
					redirect();
				}
				
				$array = array();
				foreach ($list_id_su_kien as $row) {
					array_push($array, $row->id_sukien);
				}

				$input1['where_in']= array('id_sukien', $array);
				$total = $this->Event_Model->get_total($input1);
				
				//$list= $this->Event_Model->get_list($input1);
				/*
				$this->load->library('pagination');

				$config = array();
				$config['base_url']    = base_url('home/search');
				$config['total_rows']  = $total;
				$config['per_page']    = 5;
				$config['uri_segment'] = 3;
				$config['next_link']   = "Trang kế";
				$config['prev_link']   = "Trang trước";
				$config['last_link']   = ">>";
				$config['first_link']   = "<<";
				$this->pagination->initialize($config);

				$segment= $this->uri->segment(3);
				$segment = intval($segment);
				
				$input1['limit']= array($config['per_page'], $segment);
				*/
				$list= $this->Event_Model->get_list($input1);
				$this->data['list'] = $list;
				$this->data['temp']= 'site/home/search';
				$this->load->view('site/layout',$this->data);
				}
				else
				{
					$this->session->set_flashdata('message','Ngày không hợp lệ, chọn lại');
					redirect();
				}
				
			}
			else
			{
				redirect();
			}
		}
	}
?>