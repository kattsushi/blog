<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function get($id)
	{

		$this->load->model('entry_model');
		$this->load->model('user_model');
		$entry = $this->entry_model->get_entry($id);
		$entry['user'] = $this->user_model->get_name($entry['id_user']);
		$data['post'] = $entry;
		if(isset($this->session->userdata['logged']) && ($this->session->userdata['user_id']==$entry['id_user'])){
			$data['page'] = 'edit_post_view';
			$this->load->view('layout',$data);
		}
		else {
			$data['page'] = 'post_view';
			$this->load->view('layout',$data);
		}

	}
	public function new_entry()
	{
		if(isset($this->session->userdata['logged'])){
			$data['page'] = 'new_post_view';
			$this->load->view('layout',$data);
		}
		else {
			redirect('login/');
		}
	}

	public function new_post()
	{
		$this->load->model('entry_model');
		$this->form_validation->set_rules('title', 'Título', 'required');
        $this->form_validation->set_rules('content', 'Contenido', 'required');

        if ($this->form_validation->run() == FALSE)
        {
			$data['page'] = 'new_post_view';
			$this->load->view('layout',$data);
        }
        else
        {
			$entry = $this->entry_model->insert_entry();
			if($entry){
				$data['page'] = 'success_view';
				$data['return'] = 'index';
				$data['text'] = 'Entrada Creada Exitosamente';
				$this->load->view('layout', $data);
			}
			else {
				$data['page'] = 'success_view';
				$data['return'] = 'index';
				$data['text'] = 'Entrada no pudo ser creada';
				$this->load->view('layout', $data);
			}
		}
	}

	public function edit_post()
	{
		$this->load->model('entry_model');
		$entry = $this->entry_model->update_entry();
		if($entry){
			$data['page'] = 'success_view';
			$data['return'] = 'index';
			$data['text'] = 'Entrada Modificada Exitosamente';
			$this->load->view('layout', $data);
		}
		else {
			$data['page'] = 'success_view';
			$data['return'] = 'index';
			$data['text'] = 'Entrada no pudo ser modificada';
			$this->load->view('layout', $data);
		}
	}
}
