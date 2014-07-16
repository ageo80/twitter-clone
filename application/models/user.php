<?php
  class User extends CI_Model {

    public function __construct(){
      $this->load->database();
    }

    public function get_user(){
      if($slug === FALSE){
        //no user, return nothing
        return null;
      }

      $query = $this->db->get_where('user', array('slug' => $slug));
      return $query->row_array();
    }

    public function set_user() {
      $this->load->helper('url');
      $this->load->helper('security');

      $slug = url_title($this->input->post('username'), 'dash', TRUE);
      $password = $this->input->post('password');
      $passwordVersion = 1;

      $data = array(
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'slug' => $slug,
        'text' => $this->input->post('text')
      );

      return $this->db->insert('news', $data);
    }
  }

?>
