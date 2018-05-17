<?php
/**
 * 
 */
class Schedule extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Schedule_Model');
		if($this->session->userdata('id_login') == NULL)
		{
			$this->session->set_flashdata('message','Bạn phải đăng nhập để thực hiện');
			redirect('site/login');
		}
	}
	function add()
	{
		$user_id= $this->session->userdata('id_login');
		if($this->input->post("them-lich-trinh"))
		{
			$pick_time = $this->input->post('pick_time');
		}
		else
		{
			$pick_time = $_GET['pick_time'];
		}

		//echo $pick_time;
		
		$data = array('user_id' => $user_id,
				'id_thoigian' => $pick_time
			);
		if(!$this->Schedule_Model->check_exists($data))
		{
			if($this->Schedule_Model->create($data))
			{
				$this->session->set_flashdata('message','Đã thêm sự kiện vào lịch trình');
			}
			else
			{
				$this->session->set_flashdata('message','Không thể thêm vào lịch trình');
			}
			redirect('site/schedule/index');
		}
		else
		{
			$this->session->set_flashdata('message','Sự kiện đã có trong lịch trình');
			redirect('site/schedule/index');
		}

		redirect();
	}

	function index()
	{
		$user_id= $this->session->userdata('id_login');
		$str = "SELECT su_kien.*, thoi_gian.ngay, thoi_gian.gio, lich_trinh.id_lichtrinh
			from lich_trinh, su_kien, thoi_gian
			WHERE lich_trinh.id_thoigian= thoi_gian.id_thoigian AND thoi_gian.id_sukien= su_kien.id_sukien AND lich_trinh.user_id = ".$user_id." 
			ORDER BY thoi_gian.ngay ASC ";

		if($query = $this->db->query($str))
		{
			$list = $query->result();

			$this->data['list'] = $list;
			$this->data['temp'] = 'site/schedule/index';
			$this->load->view('site/layout', $this->data);
		}
		else
		{
			return FALSE;
			$this->session->set_flashdata('message','Có lỗi xảy ra, vui lòng thực hiện lại');
			redirect();
		}
	}

	function delete()
	{
		$id_lichtrinh = $_GET['id'];
		$id_lichtrinh = intval($id_lichtrinh);

		if($id_lichtrinh > 0)
		{
			$this->Schedule_Model->delete($id_lichtrinh);
			$this->session->set_flashdata('message','Đã xóa khỏi lịch trình');
		}
		else
		{
			$where = array('user_id' => $this->session->userdata('id_login'));
			$this->Schedule_Model->del_rule($where);
			$this->session->set_flashdata('message','Đã xóa tất cả sự kiện trong lịch trình');
		}

		redirect('site/schedule/index');
	}
}
?>