<?php

  class User_meta extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('user_meta_model');
    }

    public function save(){
      $this->load->helper('url');
      $this->load->library('form_validation');
      $user_meta = $this->user_meta_model->get_user_meta_by_user_id($this->session->userdata('id'));

      $config['upload_path'] = './assets/img/avatars';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';

      $this->load->library('upload', $config);

      $this->form_validation->set_rules('website', 'Website', 'trim|xss_clean|prep_url');
      $this->form_validation->set_rules('about', 'About', 'trim|xss_clean|required');

      if ($this->form_validation->run() == FALSE) {
        $data['user_meta_array'] = $user_meta;

        if(!$data['user_meta_array']){
          $data['user_meta_array']['website'] = '';
          $data['user_meta_array']['about'] = '';
          $data['user_meta_array']['avatar'] = FALSE;
        }

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('user/account');
        $this->load->view('templates/footer');
      } else {
        if($this->upload->do_upload('avatar')){
          if($user_meta['avatar']){
            if(file_exists('./assets/img/avatars/' . $user_meta['avatar'])){
              unlink('./assets/img/avatars/' . $user_meta['avatar']);
            }

          }
          $avatar_info = $this->upload->data();
          $_POST['avatar_filename'] = $avatar_info['file_name'];
        }
        
        $this->user_meta_model->save_user_meta();
        redirect('/account', 'location');
      }
    }
  }

?>