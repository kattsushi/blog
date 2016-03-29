<?php

    class Index extends CI_Controller{

        public function __construct() {
            parent::__construct();
        }

        public function index() {
            $this->load->model('entry_model');
            $this->load->model('user_model');
            $entries = $this->entry_model->get_last_ten_entries();
            $total=$this->entry_model->count_entries();
            for ($i=0; $i < count($entries); $i++) {
                //echo $entries[$i]['id_user'];
                $entries[$i]['user'] = $this->user_model->get_name($entries[$i]['id_user']);
            }
            $data['next'] = ($total>=10) ? 10 : -1 ;
            $data['prev'] = -1;
            $data['entries']=$entries;
            $data['page'] = 'index_view';
            $this->load->view('layout',$data);
        }

        public function entries($value) {
            if($value>=0){
                $this->load->model('entry_model');
                $this->load->model('user_model');
                $entries=$this->entry_model->next_entries($value);
                $total=$this->entry_model->count_entries();
                for ($i=0; $i < count($entries); $i++) {
                    $entries[$i]['user'] = $this->user_model->get_name($entries[$i]['id_user']);
                }
                $data['next'] = (($total-($value+10))>=0) ? $value+10 : -1 ;
                $data['prev'] = ($value-10>=0) ? $value-10 : -1 ;
                $data['entries']=$entries;
                $data['page'] = 'index_view';
                $this->load->view('layout',$data);
            }
            else{
                $this->index();
            }
        }
    }
