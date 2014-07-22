<?php

  class User_meta extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('user_meta_model');
    }

    public function save(){
      $this->load->helper('url');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('website', 'Website', 'trim|xss_clean|prep_url');
      $this->form_validation->set_rules('about', 'About', 'trim|xss_clean|required');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('user/account');
        $this->load->view('templates/footer');
      } else {
        $this->user_meta_model->save_user_meta();
        redirect('/account', 'location');
      }
    }
  }

?>