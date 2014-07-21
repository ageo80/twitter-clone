<div class="pure-g">
  <div class="pure-u-1 pure-u-md-1-2">
    <div class = "padding-box">
      <h2>Account</h2>
      <?php echo validation_errors(); ?>
      <?php
        $attributes = array('class' => 'pure-form pure-form-aligned', 'id' => 'account-form');
        echo form_open('/account', $attributes); 
      ?>
        <div class="pure-control-group">
          <label for = "username">Username</label> <input id = "username" name = "username" type = "text" placeholder = "Username" value="<?php echo set_value('username'); ?>">
        </div>
        <div class="pure-control-group">
          <label for = "email">Email</label> <input id = "email" name = "email" type = "text"  placeholder = "Email" value="<?php echo set_value('email'); ?>">
        </div>
        <div class="pure-control-group">
          <label for = "password">Password</label> <input id = "password" name = "password" type = "password" placeholder = "Password" value="<?php echo set_value('password'); ?>">
        </div>
        <div class="pure-control-group">
          <label for = "old-password">Old Password</label> <input id = "old-password" name = "old-password" type = "old-password" placeholder = "Password" value="<?php echo set_value('old-password'); ?>">
        </div>
        <div class="pure-controls">
          <input class="pure-button pure-button-primary" type = "submit" value = "Save">
        </div>
      </form>
    </div>
  </div>
  <div class="pure-u-1 pure-u-md-1-2">
    <div class = "padding-box">
      <h2>Profile</h2>
      <?php echo validation_errors(); ?>
      <?php
        $attributes = array('class' => 'pure-form pure-form-stacked', 'id' => 'profile-form');
        echo form_open('/account', $attributes); 
      ?>
        <label for = "website">Website</label>
        <input id = "website" name = "website" type = "text" placeholder = "Website" value="<?php echo set_value('website'); ?>">
        <label for = "about">About You</label>
        <textarea id = "about" name = "about" placeholder = "About you..."><?php echo set_value('about'); ?></textarea>
        <input class="pure-button pure-button-primary" type = "submit" value = "Save">
      </form>
    </div>
  </div>
</div>