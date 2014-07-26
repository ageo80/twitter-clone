<div class="pure-g">
  <div class="pure-u-1 pure-u-md-3-8">
    <div class = "padding-box">
      <h2><?php echo $profile_user['username']; ?>'s Profile</h2>
      <div class="pure-g">
        <div class="pure-u-1-2">
          <div class = "avatar-padding">
            <?php if($profile_user_meta['avatar']) : ?>
              <img src = "/assets/img/avatars/<?php echo $profile_user_meta['avatar']; ?>" class = "pure-img">
            <?php else : ?>
              <img src = "/assets/img/avatars/default.jpg" class = "pure-img">
            <?php endif; ?>
          </div>
        </div>
        <div class="pure-u-1-2">
          <p><a href = "<?php echo htmlentities($profile_user_meta['website'], FALSE, 'UTF-8'); ?>"><?php echo htmlentities($profile_user_meta['website'], FALSE, 'UTF-8'); ?></a></p>
          <p><?php echo htmlentities($profile_user_meta['about'], FALSE, 'UTF-8'); ?></p>
          <?php if($this->session->userdata('id') !== $profile_user['id'] && $this->session->userdata('id')) : ?>
            <?php if($follow) : ?>
              <?php echo validation_errors(); ?>
              <?php
                $attributes = array('class' => 'pure-form pure-form-aligned', 'id' => 'unfollow-form');
                $hidden = array('target-id' => $profile_user['id']);
                echo form_open('/unfollow', $attributes, $hidden); 
              ?>
                <input class="pure-button button-unfollow" type = "submit" value = "Unfollow">
              </form>
            <?php else : ?>
              <?php echo validation_errors(); ?>
              <?php
                $attributes = array('class' => 'pure-form pure-form-aligned', 'id' => 'follow-form');
                $hidden = array('target-id' => $profile_user['id']);
                echo form_open('/follow', $attributes, $hidden); 
              ?>
                <input class="pure-button pure-button-primary" type = "submit" value = "Follow">
              </form>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="pure-u-1 pure-u-md-3-8">
    <div class = "padding-box">
      <h2>Individual Tweet View</h2>
      <?php if($tweet) : ?>
        <div class="pure-g">
          <div class="pure-u-1-4">
            <?php if($profile_user_meta['avatar']) : ?>
              <img src = "/assets/img/avatars/<?php echo $profile_user_meta['avatar']; ?>" class = "pure-img tweet-avatar">
            <?php else : ?>
              <img src = "/assets/img/avatars/default.jpg" class = "pure-img tweet-avatar">
            <?php endif; ?>
          </div>
          <div class = "pure-u-3-4">
            <div class = "tweet-user-info"><a href = "/<?php echo $profile_user['slug'];?>">@<?php echo $profile_user['username']; ?></a> - <span class = "time">Tweeted on <?php echo $tweet['dateCreated']; ?></a></span></div>
            <div class = "tweet-content"><b><?php echo htmlentities($tweet['tweet'], FALSE, 'UTF-8'); ?></b></div>
          </div>
        </div>
      <?php else : ?>
        <p>Tweet not found.</p>
      <?php endif; ?>
    </div>
  </div>
  <div class="pure-u-1 pure-u-md-1-4">
    <?php include_once dirname(__FILE__) .  '/../templates/sidebar.php'; ?>
  </div>
</div>