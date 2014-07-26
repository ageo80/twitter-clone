<div class="pure-g">
  <div class="pure-u-1 pure-u-md-1-4">
    <div class = "padding-box">
      <h2>Tweet as <?php echo $this->session->userdata('username'); ?></h2>
      <?php echo validation_errors(); ?>
      <?php
        $attributes = array('class' => 'pure-form pure-form-aligned', 'id' => 'tweet-form');
        echo form_open('/tweet', $attributes); 
      ?>
        <div class="pure-control-group">
          <textarea id = "tweet" name = "tweet" placeholder = "Write your tweet here..." maxlength="140"><?php echo set_value('tweet'); ?></textarea>
        </div>
        <div class="pure-controls">
          <input class="pure-button pure-button-primary" type = "submit" value = "Tweet">
        </div>
      </form>
    </div>
  </div>
  <div class="pure-u-1 pure-u-md-1-2">
    <div class = "padding-box">
      <h2>Tweets</h2>
      <?php if($stream_tweets) : ?>
        <?php foreach($stream_tweets as $stream_tweet) : ?>
          <div class="pure-g">
            <div class="pure-u-1-4">
              <?php if($stream_tweet['user_meta']['avatar']) : ?>
                <img src = "/assets/img/avatars/<?php echo $stream_tweet['user_meta']['avatar']; ?>" class = "pure-img tweet-avatar">
              <?php else : ?>
                <img src = "/assets/img/avatars/default.jpg" class = "pure-img tweet-avatar">
              <?php endif; ?>
            </div>
            <div class = "pure-u-3-4">
              <div class = "tweet-user-info"><a href = "/<?php echo $stream_tweet['user']['slug'];?>">@<?php echo $stream_tweet['user']['username']; ?></a> - <span class = "time"><a href = "/tweet/<?php echo $stream_tweet['id']; ?>"><?php echo timespan(strtotime($stream_tweet['dateCreated']), time()); ?> Ago</a></span></div>
              <div class = "tweet-content"><b><?php echo htmlentities($stream_tweet['tweet'], FALSE, 'UTF-8'); ?></b></div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <p>No tweets yet. Follow some users!</p>
      <?php endif; ?>
    </div>
  </div>
  <div class="pure-u-1 pure-u-md-1-4">
    <?php include_once dirname(__FILE__) .  '/templates/sidebar.php'; ?>
  </div>
</div>