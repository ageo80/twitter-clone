<?php

  class User extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('user_model');
    }

    public function view($slug = FALSE){
      
    }

    public function register(){
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|is_unique[user.username]|alpha_dash');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('user/register');
        $this->load->view('templates/footer');
      } else {
        $this->user_model->set_user();
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('home');
        $this->load->view('templates/footer');
      }
    }
  }

?>