<div class="pure-g">
  <div class="pure-u-1 pure-u-md-1-4">
    <div class = "padding-box">
      <h2><?php echo $profile_user['username']; ?>'s Profile</h2>
      <?php echo validation_errors(); ?>
      <?php
        $attributes = array('class' => 'pure-form pure-form-aligned', 'id' => 'follow-form');
        echo form_open('/follow', $attributes); 
      ?>
        <div class="pure-controls">
          <input class="pure-button pure-button-primary" type = "submit" value = "Follow">
        </div>
      </form>
    </div>
  </div>
  <div class="pure-u-1 pure-u-md-1-2">
    <div class = "padding-box">
      <h2>User's Tweets</h2>
      <?php if($profile_tweets) : ?>
        <?php foreach($profile_tweets as $profile_tweets) : ?>
          <div class = "tweet">
            <div class = "tweet-user-info"><a href = "/<?php echo $profile_user['slug'];?>">@<?php echo $profile_user['username']; ?></a> - <span class = "time">6m ago</span></div>
            <div class = "tweet-content"><?php echo $profile_tweets['tweet']; ?></div>
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