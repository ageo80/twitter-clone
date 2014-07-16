<div class="pure-menu pure-menu-open pure-menu-horizontal">
    <?php if($this->session->userdata('logged_in')) : ?>
        <!-- Might add something here -->
    <?php else : ?>
        <?php
            $attributes = array('class' => 'pure-form top-login', 'id' => 'login-form');
            echo form_open('/login', $attributes); 
          ?>
          <fieldset>
            <input id = "username" name = "username" type = "text" placeholder = "Username" value="<?php echo set_value('username'); ?>">
            <input id = "password" name = "password" type = "password" placeholder = "Password" value="<?php echo set_value('password'); ?>">
            <label for="remember">
                <input id="remember" type="checkbox"> Remember me
            </label>
            <button type="submit" class="pure-button pure-button-primary">Sign in</button>
          </fieldset>
        </form>
    <?php ENDIF; ?>
    <a href="/" class="pure-menu-heading">Zipper - A Twitter Clone</a>
    <ul class = "navigation">
        <li class="pure-menu-selected"><a href="/">Home</a></li>
        <?php if($this->session->userdata('logged_in')) : ?>
            <li><a href="/account">Account</a></li>
            <li class = "welcome">Welcome <?php echo $this->session->userdata('username'); ?>.</li>
        <?php else : ?>
            <li><a href="/register">Sign Up</a></li>
        <?php ENDIF; ?>
    </ul>
    
</div>