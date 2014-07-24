<div class="pure-g">
  <div class="pure-u-1 pure-u-md-1-4">
    <div class = "padding-box">
      <h2><?php echo $profile_user['username']; ?>'s Profile</h2>
      <p><a href = "<?php echo $profile_user_meta['website']; ?>"><?php echo $profile_user_meta['website']; ?></a></p>
      <p><?php echo $profile_user_meta['about']; ?></p>
      <?php if($this->session->userdata('id') !== $profile_user['id'] && $this->session->userdata('id')) : ?>
        <?php if($follow) : ?>
          <?php echo validation_errors(); ?>
          <?php
            $attributes = array('class' => 'pure-form pure-form-aligned', 'id' => 'unfollow-form');
            $hidden = array('target-id' => $profile_user['id']);
            echo form_open('/unfollow', $attributes, $hidden); 
          ?>
            <div class="pure-controls">
              <input class="pure-button button-unfollow" type = "submit" value = "Unfollow">
            </div>
          </form>
        <?php else : ?>
          <?php echo validation_errors(); ?>
          <?php
            $attributes = array('class' => 'pure-form pure-form-aligned', 'id' => 'follow-form');
            $hidden = array('target-id' => $profile_user['id']);
            echo form_open('/follow', $attributes, $hidden); 
          ?>
            <div class="pure-controls">
              <input class="pure-button pure-button-primary" type = "submit" value = "Follow">
            </div>
          </form>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="pure-u-1 pure-u-md-1-2">
    <div class = "padding-box">
      <h2>User's Tweets</h2>
      <?php if($profile_tweets) : ?>
        <?php foreach($profile_tweets as $profile_tweet) : ?>
          <div class = "tweet">
            <div class = "tweet-user-info"><a href = "/<?php echo $profile_user['slug'];?>">@<?php echo $profile_user['username']; ?></a> - <span class = "time"><a href = "/tweet/<?php echo $profile_tweet['id']; ?>"><?php echo timespan(strtotime($profile_tweet['dateCreated']), time()); ?> Ago</a></span></div>
            <div class = "tweet-content"><b><?php echo $profile_tweet['tweet']; ?></b></div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <p>No tweets yet.</p>
      <?php endif; ?>
    </div>
  </div>
  <div class="pure-u-1 pure-u-md-1-4">
    <div class = "padding-box">
      <h2>Users to Follow</h2>
      <p>I guess I'll just list other users here.</p>
    </div>
  </div>
</div>