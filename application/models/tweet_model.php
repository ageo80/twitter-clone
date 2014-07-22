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
      $tweets = FALSE;
      
      $query = $this->db->order_by('dateCreated', 'desc')->get_where('tweet', array('user_id' => $user_id));

      foreach ($query->result_array() as $tweet){
        $tweets[] = $tweet;
      }

      return $tweets;
    }

    public function get_tweets_by_follow_array($follow_array){
      $tweets = FALSE;

      $this->db->from('tweet');
      $i = 0;
      if($follow_array){
        foreach($follow_array as $follow){
          if($i === 0){
            $this->db->where('user_id', $follow['target_id']);
          } else {
            $this->db->or_where('user_id', $follow['target_id']); 
          }

          $i++;
        }
        $this->db->order_by("dateCreated", "desc"); 
        $query = $this->db->get();

        foreach ($query->result_array() as $tweet){
          $tweets[] = $tweet;
        }
      }

      return $tweets;
    }
  }

?>