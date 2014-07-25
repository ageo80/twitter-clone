<div class = "padding-box">
  <h2>Users to Follow</h2>
  <?php foreach ($sidebar_users as $sidebar_user) : ?>
    <div class="pure-g follow-box">
      <div class="pure-u-1-4">
        <div class = "avatar-padding-small">
          <?php if($sidebar_user['user_meta']['avatar']) : ?>
            <img src = "/assets/img/avatars/<?php echo $sidebar_user['user_meta']['avatar']; ?>" class = "pure-img">
          <?php else : ?>
            <img src = "/assets/img/avatars/default.jpg" class = "pure-img">
          <?php endif; ?>
        </div>
      </div>
      <div class = "pure-u-3-4">
        <p class = "no-top-margin-half-bottom"><a href = "/<?php echo $sidebar_user['slug'];?>">@<?php echo $sidebar_user['username']; ?></a></p>
        <?php if($this->session->userdata('id') !== $sidebar_user['id'] && $this->session->userdata('id')) : ?>
          <?php if($sidebar_user['follow']) : ?>
            <?php echo validation_errors(); ?>
            <?php
              $attributes = array('class' => 'pure-form pure-form-aligned', 'id' => 'unfollow-form');
              $hidden = array('target-id' => $sidebar_user['id']);
              echo form_open('/unfollow', $attributes, $hidden); 
            ?>
              <input class="pure-button button-unfollow" type = "submit" value = "Unfollow">
            </form>
          <?php else : ?>
            <?php echo validation_errors(); ?>
            <?php
              $attributes = array('class' => 'pure-form pure-form-aligned', 'id' => 'follow-form');
              $hidden = array('target-id' => $sidebar_user['id']);
              echo form_open('/follow', $attributes, $hidden); 
            ?>
              <input class="pure-button pure-button-primary" type = "submit" value = "Follow">
            </form>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>