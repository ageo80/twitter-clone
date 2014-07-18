<?php

  class Tweet extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('tweet_model');
    }

    public function view($id = FALSE){
      
    }

    public function create_tweet(){
      $this->load->helper('url');
      $this->load->library('form_validation');

      if($this->session->userdata('logged_in')){
        $this->form_validation->set_rules('tweet', 'Tweet', 'trim|required|max_length[140]');
        if ($this->form_validation->run() == FALSE) {
          //didn't pass validation
          $this->load->view('templates/header');
          $this->load->view('templates/nav');
          $this->load->view('stream');
          $this->load->view('templates/footer');
        } else {
          //passed validation
          $this->tweet_model->set_tweet();
          redirect('/', 'location');
        }
        //post tweet
      } else {
        //login error
      }
    }    
  }

?>