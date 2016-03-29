<?php

class Entry_model extends CI_Model {

        public $title;
        public $content;
        public $date;
        public $id_user;
        public $id;

        public function __construct()
        {
            parent::__construct();
        }

        public function get_entry($id)
        {
            $query = $this->db->get_where('entries', array('id'=>$id));
            return $query->row_array();
        }

        public function get_last_ten_entries()
        {
                $this->db->limit(10);
                $this->db->order_by('date', 'DESC');
                $query =$this->db->get('entries');
                return $query->result_array();
        }

        public function insert_entry()
        {
                $this->title    = $this->input->post('title');
                $this->content  = $this->input->post('content');
                $this->id_user  = $this->session->userdata('user_id');
                return $this->db->insert('entries', $this);
        }

        public function update_entry()
        {
            $this->id       = $this->input->post('id');
            $this->title    = $this->input->post('title');
            $this->content  = $this->input->post('content');
            $this->id_user  = $this->session->userdata('user_id');
            return $this->db->update('entries', $this, array('id' => $this->id));
        }

        public function next_entries($value){
            $this->db->limit(10,$value);
            $this->db->order_by('date', 'DESC');
            $query = $this->db->get('entries');
            return $query->result_array();
        }

        public function count_entries(){
            $query = $this->db->query('SELECT count(*) total FROM entries');
            $row= $query->row_array();
            return $row['total'];
        }

}
