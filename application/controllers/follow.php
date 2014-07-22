<?php

  class Follow extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('follow_model');
      $this->load->helper('url');
      $this->load->library('form_validation');
    }

    public function follow_user(){
      if($this->session->userdata('logged_in')){
        $this->form_validation->set_rules('target-id', 'Follow User', 'required|is_natural_no_zero');
        if ($this->form_validation->run() == FALSE) {
          //failed validation
        } else {
          //passed validation
          $this->follow_model->set_follow();
          redirect('/', 'location');
        }
      } else {
        //login error
      }
    }

    public function unfollow_user(){
      if($this->session->userdata('logged_in')){
        $this->form_validation->set_rules('target-id', 'Follow User', 'required|is_natural_no_zero');
        if ($this->form_validation->run() == FALSE) {
          //failed validation
        } else {
          //passed validation
          $this->follow_model->delete_follow();
          redirect('/', 'location');
        }
      } else {
        //login error
      }
    }
  }

?>