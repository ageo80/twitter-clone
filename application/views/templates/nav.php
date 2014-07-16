<div class="pure-menu pure-menu-open pure-menu-horizontal">
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
    <a href="/" class="pure-menu-heading">Zipper - A Twitter Clone</a>
    <ul class = "navigation">
        <li class="pure-menu-selected"><a href="/">Home</a></li>
        <li><a href="/register">Sign Up</a></li>
    </ul>
    
</div>