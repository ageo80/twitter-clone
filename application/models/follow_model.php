<?php
  class Follow_model extends CI_Model {

    public function __construct(){
      parent::__construct();
      $this->load->database();
    }

    public function get_follow($id){
      $query = $this->db->get_where('follow', array('id' => $id));
      return $query->row_array();
    }

    public function set_follow() {
      $data = array(
        'source_id' => $this->session->userdata('id'),
        'target_id' => $this->input->post('target_id'),
      );

      return $this->db->insert('follow', $data);
    }

    public function set_first_follow() {
      $data = array(
        'source_id' => $this->session->userdata('id'),
        'target_id' => $this->session->userdata('id'),
      );

      return $this->db->insert('follow', $data);
    }

    public function get_follow_by_source_id_and_target_id($source_id, $target_id){
      $query = $this->db->get_where('follow', array('source_id' => $source_id, 'target_id' => $target_id));
      return $query->row_array();
    }

    public function get_follows_by_source_id($source_id){
      $follows = FALSE;
      $query = $this->db->get_where('follow', array('source_id' => $source_id));

      foreach ($query->result_array() as $follow){
        $follows[] = $follow;
      }

      return $follows;
    }

    public function get_follows_by_target_id($target_id){
      $follows = FALSE;
      $query = $this->db->get_where('follow', array('target_id' => $target_id));

      foreach ($query->result_array() as $follow){
        $follows[] = $follow;
      }

      return $follows;
    }
  }

?>