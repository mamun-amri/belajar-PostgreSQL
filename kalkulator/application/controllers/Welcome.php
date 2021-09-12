<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function insert()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = [
				'inputA' => $this->input->post('inputA'),
				'inputB' => $this->input->post('inputB'),
				'hasil' => $this->input->post('hasil'),
			];
			$this->db->insert("kalkulator", $data);
			$this->load->view('welcome_message');
			$this->session->set_flashdata("pesan", "berhasil input data");
			redirect(base_url());
		}
	}

	function _rules()
	{
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('inputA', 'inputA', 'required');
		$this->form_validation->set_rules('inputB', 'inputB', 'required');
	}
}
