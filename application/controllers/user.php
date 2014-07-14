<?php

  class User extends CI_Controller {
    public function view($slug = FALSE){
      
    }

    public function register(){
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

      $this->load->view('templates/header');
      $this->load->view('templates/nav');
      $this->load->view('user/register');
      $this->load->view('templates/footer');
    }
  }

?>