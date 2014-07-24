<?php

  class User_meta extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('user_meta_model');
    }

    public function save(){
      $this->load->helper('url');
      $this->load->library('form_validation');

      $config['upload_path'] = './assets/img/avatars';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';

      $this->load->library('upload', $config);

      $this->form_validation->set_rules('website', 'Website', 'trim|xss_clean|prep_url');
      $this->form_validation->set_rules('about', 'About', 'trim|xss_clean|required');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('user/account');
        $this->load->view('templates/footer');
      } else {
        if($this->upload->do_upload('avatar')){
          $avatar_info = $this->upload->data();
          $_POST['avatar_filename'] = $avatar_info['file_name'];
        }
        
        $this->user_meta_model->save_user_meta();
        redirect('/account', 'location');
      }
    }
  }

?>