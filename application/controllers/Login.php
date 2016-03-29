<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['page'] = 'login_view';
		$this->load->view('layout',$data);
	}

	public function logout()
	{
		session_destroy();
		redirect('index');
	}

	public function enter(){

        $this->form_validation->set_rules('user', 'Usuario', 'required|alpha_numeric|trim');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|alpha_numeric|trim|min_length[5]');

        if ($this->form_validation->run() == FALSE)
        {
			$data['page'] = 'login_view';
			$this->load->view('layout',$data);
        }
        else
        {

			$this->load->model('user_model');
			$user=$this->input->post('user');
			$password=do_hash($this->input->post('password'));			
			$user = $this->user_model->validate_user($user,$password);
			if($user){

				$data = [
					'name'=>$user['name'],
					'lastname'=>$user['lastname'],
					'user'=>$user['user'],
					'user_id'=>$user['id'],
					'logged'=>true,
				];
				$this->session->set_userdata($data);
				redirect('index');
			}
			else{
				$data['page'] = 'success_view';
				$data['return'] = 'login';
				$data['text'] = 'Usuario o Contraseña Incorrecta';
				$this->load->view('layout', $data);
			}
        }
	}

	public function validate_user($user){
		$this->load->model('user_model');
		if($this->input->post('user'))
			return $this->user_model->validate_username($user);
		else
			echo $this->user_model->validate_username($user);
	}

	public function register(){

		$this->form_validation->set_rules('name', 'Nombre', 'required|alpha_numeric|trim');
		$this->form_validation->set_rules('lastname', 'Apellido', 'required|alpha_numeric|trim');
		$this->form_validation->set_rules('user', 'Usuario', 'required|alpha_numeric|trim|is_unique[user.user]');
		$this->form_validation->set_rules('password', 'Contraseña', 'required|alpha_numeric|trim|min_length[5]');

		if ($this->form_validation->run() == FALSE)
		{
			$data['page'] = 'register_view';
			$this->load->view('layout',$data);
		}
		else
		{
			if($this->validate_user($this->input->post('user'))){
				echo "El usuario ya existe";
			}else{
				if($this->user_model->register_user()){
					$data['page'] = 'success_view';
					$data['return'] = 'index';
	                $data['text'] = 'Usuario Registrado Exitosamente';
	                $this->load->view('layout', $data);
				}
				else {
					$data['page'] = 'success_view';
					$data['return'] = 'login/register';
	                $data['text'] = 'Usuario no pudo registrarse';
	                $this->load->view('layout', $data);
				}
			}
		}
	}

	public function password()
	{
		if(isset($this->session->userdata['logged'])){
			$data['page'] = 'change_password_view';
			$this->load->view('layout',$data);
		}
		else {
			redirect('login/');
		}

	}

	public function oldpassword_check($password)
    {
		$this->load->model('user_model');
		$password=do_hash($password);
		if($this->user_model->validate_user($this->session->userdata('user'),$password)){
			return TRUE;
		}
		else {
			$this->form_validation->set_message('oldpassword_check', 'La {field} no es válida');
			return FALSE;
		}
    }

	public function change_password(){

		if(isset($this->session->userdata['logged'])){

			$this->form_validation->set_rules('old_password', 'Contraseña Actual', 'required|alpha_numeric|trim|min_length[5]|callback_oldpassword_check');
			$this->form_validation->set_rules('new_password', 'Contraseña Nueva', 'required|alpha_numeric|trim|min_length[5]');
	        $this->form_validation->set_rules('new_password_confirm', 'Confirmar Contraseña', 'required|alpha_numeric|trim|matches[new_password]|min_length[5]');

			if ($this->form_validation->run() == FALSE)
			{
				$data['page'] = 'change_password_view';
				$this->load->view('layout',$data);
			}
			else
			{
				$this->load->model('user_model');
	            if($this->user_model->change_password()){
					$data['page'] = 'success_view';
					$data['return'] = 'index';
	                $data['text'] = 'Cambio de Contraseña Exitoso';
	                $this->load->view('layout', $data);
				}
				else {
					$data['page'] = 'success_view';
	                $data['text'] = 'No se pudo cambiar su contraseña, verifique los datos';
	                $this->load->view('layout', $data);
	            }
			}
		}
		else {
			redirect('login/');
		}

	}
}
