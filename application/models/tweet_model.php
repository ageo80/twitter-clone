<?php
  class Tweet_model extends CI_Model {

    public function __construct(){
      parent::__construct();
      $this->load->database();
    }

    public function get_tweet($id){
      $query = $this->db->get_where('tweet', array('id' => $id));
      return $query->row_array();
    }

    public function set_tweet() {
      $data = array(
        'user_id' => $this->session->userdata('id'),
        'tweet' => $this->input->post('tweet'),
      );

      return $this->db->insert('tweet', $data);
    }

    public function get_tweets_by_user_id($user_id){
      $query = $this->db->get_where('tweet', array('user_id' => $user_id));

      foreach ($query->result_array() as $tweet){
        $arr[] = $tweet;
      }

      return $arr;
    }
  }

?>