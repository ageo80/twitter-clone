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

			$tweets = $this->tweet_model->get_tweets_by_follow_array($this->follow_model->get_follows_by_source_id($this->session->userdata('id')));

			if($tweets){
				foreach ($tweets as $tweet) {
					$tweet['user'] = $this->user_model->get_user($tweet['user_id']);
					$stream_tweets[] = $tweet;
				}
				$data['stream_tweets'] = $stream_tweets;
			} else {
				$data['stream_tweets'] = FALSE;
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