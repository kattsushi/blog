<?php
class User_model extends CI_Model {

        public $name;
        public $lastname;
        public $user;
        public $password;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function validate_user($user,$password)
        {
            $query = $this->db->get_where('user', array('user' => $user, 'password'=>$password));
            if ($query->num_rows() > 0) {
               return $query->row_array();
            } else {
                return FALSE;
            }
        }

        public function get_name($id)
        {
            $this->db->select('name,lastname');
            $query = $this->db->get_where('user', array('id' => $id));
            $row = $query->row();
            return $row->name.' '.$row->lastname;
        }

        public function register_user(){
            $data = array(
                'name' => $this->input->post('name'),
                'lastname' => $this->input->post('lastname'),
                'user' => $this->input->post('user'),
                'password' => do_hash($this->input->post('password'))
            );
            return $this->db->insert('user', $data);
        }

        public function validate_username($user){
            $query = $this->db->get_where('user', array('user' => $user));
            if ($query->num_rows() > 0) {
                //usuario existe
               return TRUE;
            } else {
                return FALSE;
            }
        }

        public function change_password(){
            $this->db->set('password',do_hash($this->input->post('new_password')));
            $this->db->where('id', $this->session->userdata('user_id'));
            return $this->db->update('user');
        }
}
