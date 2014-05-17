<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function ___construct()
	{
		parent::___construct();
	}

	public function index()
	{
		$this->tambah_user();
	}

	public function tambah_user()
	{
		$data=array(
			"action" => base_url('index.php/welcome/save_user'),
			"title"	 => 'tambah data user'
			);
		$sql="SELECT * FROM user";
		$data['hasil']=$this->db->query($sql);
		$this->load->view('form_tambah',$data);
	}

	public function save_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name','first_name','trim|required|min_length[6]|max_length[32]|xss_clean');
		$this->form_validation->set_rules('last_name','last_name','trim|required|min_length[6]|max_length[32]|xss_clean');
		$this->form_validation->set_rules('email','email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('alamat','alamat','trim|required|min_length[20]|max_length[100]|xss_clean');
		$this->form_validation->set_rules('umur','age','trim|required|numeric|min_length[2]|max_length[2]|xss_clean');
		$this->form_validation->set_rules('contact','No Hp','trim|required|numeric|min_length[8]|max_length[13]|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$this->tambah_user();
		}

		else 
		{
			$data=array(
			"first_name" 	=> $this->input->post('first_name'),
			"last_name" 	=> $this->input->post('last_name'),
			"email" 		=> $this->input->post('email'),
			"alamat" 		=> $this->input->post('alamat'),
			"umur" 			=> $this->input->post('umur'),
			"contact" 		=> $this->input->post('contact')
			);
			$this->db->insert('user',$data);
			redirect('welcome/tambah_user');
		}
	}

	public function remove_user($id="")
	{
		$this->db->delete('user', array('id' => $id));
		redirect('welcome/tambah_user');

	}

	public function edit_user($id="")
	{
		$data=array(
			"action" => base_url('index.php/welcome/update_user/'.$id),
			"title"	 => "form edit user",
			"data"	 => $this->db->get_where('user', array( 'id' => $id ))
			);
			$this->load->view('form_edit',$data);
	}

	public function update_user($id="")
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name','first_name','required');
		$this->form_validation->set_rules('last_name','last_name','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		$this->form_validation->set_rules('umur','age','required');
		$this->form_validation->set_rules('contact','No Hp','required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->edit_user($id="");
		}
		
		else
		{
			$data=array(
			"first_name" 	=> $this->input->post('first_name'),
			"last_name" 	=> $this->input->post('last_name'),
			"email" 		=> $this->input->post('email'),
			"alamat" 		=> $this->input->post('alamat'),
			"umur" 			=> $this->input->post('umur'),
			"contact" 		=> $this->input->post('contact')
			);
			$this->db->update('user',$data,array('id' => $id));
			redirect('welcome/tambah_user');
		}
	}


}
