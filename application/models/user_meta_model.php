<?php
  class User_meta_model extends CI_Model {

    public function __construct(){
      parent::__construct();
      $this->load->database();
    }

    public function get_user_meta_by_user_id($user_id){
      $query = $this->db->get_where('user_meta', array('user_id' => $user_id));

      return $query->row_array();
    }

    public function save_user_meta() {
      $data = array(
        'user_id' => $this->session->userdata('id'),
        'website' => $this->input->post('website'),
        'about' => $this->input->post('about')
      );

      if($user_meta_array = $this->get_user_meta_by_user_id($this->session->userdata('id'))){
        return $this->db->update('user_meta', $data, array('id' => $user_meta_array['id']));
      } else {
        return $this->db->insert('user_meta', $data);
      }
    }
  }

?>
