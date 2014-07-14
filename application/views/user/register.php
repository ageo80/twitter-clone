<div class="pure-g">
  <div class="pure-u-1 pure-u-md-12-24">
    <div class = "padding-box">
      <h2>Register an Account</h2>
      <?php echo validation_errors(); ?>
      <?php
        $attributes = array('class' => 'pure-form pure-form-aligned', 'id' => 'registration-form');
        echo form_open('/register', $attributes); 
      ?>
        <div class="pure-control-group">
          <label for = "username">Username</label> <input id = "username" name = "username" type = "text" placeholder = "Username">
        </div>
        <div class="pure-control-group">
          <label for = "email">Email</label> <input id = "email" name = "email" type = "text"  placeholder = "Email">
        </div>
        <div class="pure-control-group">
          <label for = "password">Password</label> <input id = "password" name = "password" type = "password" placeholder = "Password">
        </div>
        <div class="pure-controls">
          <input class="pure-button pure-button-primary" type = "submit" value = "Submit">
        </div>
      </form>
    </div>
  </div>
  <div class="pure-u-1 pure-u-md-12-24">
    <div class = "padding-box">
      <h2>Step 2: Follow Users</h2>
      <p>Follow users, and their zippers will appear in your stream!</p>
    </div>
  </div>
</div>