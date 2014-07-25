<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		if($this->session->userdata('logged_in')){
			$this->load->model('follow_model');
			$this->load->model('tweet_model');
			$this->load->model('user_model');
			$this->load->model('user_meta_model');

			$tweets = $this->tweet_model->get_tweets_by_follow_array($this->follow_model->get_follows_by_source_id($this->session->userdata('id')));

			if($tweets){
				foreach ($tweets as $tweet) {
					$tweet['user'] = $this->user_model->get_user($tweet['user_id']);
					$tweet['user_meta'] = $this->user_meta_model->get_user_meta_by_user_id($tweet['user_id']);
					if(!$tweet['user_meta']){
	          $tweet['user_meta']['website'] = '';
	          $tweet['user_meta']['about'] = '';
	          $tweet['user_meta']['avatar'] = false;
	        }
					$stream_tweets[] = $tweet;
				}
				$data['stream_tweets'] = $stream_tweets;
			} else {
				$data['stream_tweets'] = FALSE;
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

			$this->load->view('stream', $data);
		} else {
			$this->load->view('home');
		}
		$this->load->view('templates/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */