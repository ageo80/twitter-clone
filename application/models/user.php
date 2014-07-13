<?php
  class user extends CI_Model {

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
  }

?>
