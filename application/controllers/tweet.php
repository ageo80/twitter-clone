<?php

  class Tweet extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('tweet_model');
    }

    public function view($tweet_id = FALSE){
      $this->load->model('user_meta_model');
      $this->load->model('follow_model');
      $this->load->model('user_model');

      if($tweet_id){
        $data['tweet'] = $this->tweet_model->get_tweet($tweet_id);
        if($data['tweet']){
          $data['profile_user'] = $this->user_model->get_user($data['tweet']['user_id']);
          $data['profile_user_meta'] = $this->user_meta_model->get_user_meta_by_user_id($data['profile_user']['id']);
          if(!$data['profile_user_meta']){
            $data['profile_user_meta']['website'] = '';
            $data['profile_user_meta']['about'] = '';
            $data['profile_user_meta']['avatar'] = '';
          }
          $data['follow'] = $this->follow_model->get_follow_by_source_id_and_target_id($this->session->userdata('id'), $data['profile_user']['id']);
        }
      }

      //get random user info for sidebar
      $sidebar_users = $this->user_model->get_random(10);
      foreach($sidebar_users as $sidebar_user){
        $sidebar_user['user_meta'] = $this->user_meta_model->get_user_meta_by_user_id($sidebar_user['id']);
        if(!$sidebar_user['user_meta']){
          $sidebar_user['user_meta']['website'] = '';
          $sidebar_user['user_meta']['about'] = '';
          $sidebar_user['user_meta']['avatar'] = false;
        }
        $sidebar_user['follow'] = $this->follow_model->get_follow_by_source_id_and_target_id($this->session->userdata('id'), $sidebar_user['id']);
        $data['sidebar_users'][] = $sidebar_user;
      }
      
      $this->load->view('templates/header');
      $this->load->view('templates/nav');
      $this->load->view('tweet/view', $data);
      $this->load->view('templates/footer');
    }

    public function create_tweet(){
      $this->load->helper('url');
      $this->load->library('form_validation');

      if($this->session->userdata('logged_in')){
        $this->form_validation->set_rules('tweet', 'Tweet', 'trim|xss_clean|required|max_length[140]');
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
      } else {
        //login error
      }
    }    
  }

?>