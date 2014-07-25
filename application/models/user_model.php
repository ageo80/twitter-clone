<?php
  class User_model extends CI_Model {

    public function __construct(){
      parent::__construct();
      $this->load->database();
    }

    public function get_user_by_slug($slug = FALSE){
      if($slug === FALSE){
        //no user, return nothing
        return null;
      }

      $query = $this->db->get_where('user', array('slug' => $slug));
      return $query->row_array();
    }

    public function get_user($id = FALSE){
      if($id === FALSE){
        //no user, return nothing
        return null;
      }

      $query = $this->db->get_where('user', array('id' => $id));
      return $query->row_array();
    }

    public function set_user() {
      $this->load->helper('url');

      $slug = url_title($this->input->post('username'), 'dash', TRUE);
      $password = hash('sha256', $this->input->post('password') . '_' .  $this->input->post('username'));
      $passwordVersion = 1;

      $data = array(
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'slug' => $slug,
        'password' => $password,
        'password_version' => 1
      );

      return $this->db->insert('user', $data);
    }

    public function save_user() {
      $user = $this->get_user($this->session->userdata('id'));

      $password = hash('sha256', $this->input->post('old-password') . '_' .  $user['username']);

      if($user['password'] === $password) {
        if($this->input->post('password')){
          $password = hash('sha256', $this->input->post('password') . '_' .  $user['username']);
        }

        $data = array(
          'password' => $password,
          'email' => $this->input->post('email')
        );

        return $this->db->update('user', $data, array('id' => $user['id']));
        
      } else {
        return false;
      }
    }

    public function login_user() {
      $password = hash('sha256', $this->input->post('password') . '_' .  $this->input->post('username'));

      $query = $this->db->get_where('user', array('username' => $this->input->post('username'), 'password' => $password));
      
      return $query->row_array();
    }

    public function get_random($limit) {
      $this->db->from('user');
      $this->db->order_by('id', 'random'); 
      $this->db->limit($limit); 
      $query = $this->db->get();

      foreach ($query->result_array() as $user){
        $users[] = $user;
      }

      return $users;
    }
  }

?>
