<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $header . '_header' . EXT ;?>
<div id="content" class="no-sidebar">
    <!-- start login block -->
    <div id="login">
        <div class="avatar">
            <img src="assets/img/login-avatar.png">
        </div>
        <div id="login-info">
            <form id="frm-login" action="login/submit" method="POST">
                <div id="username-block">
                    <input id="username" type="text" name="username" placeholder="Enter your username here..." required max="128">
                </div>
                <div id="password-block">
                    <input id="password" type="password" name="password" placeholder="Enter your password here..." required max="32">
                </div>
                <input type="submit" name="submit" value="Login" class="button">
            </form>
        </div>
    </div>
    <!--- end login block --->
</div>
<?php include ROOT . 'app' . DS . 'views' . DS . 'includes' . DS . $footer . '_footer' . EXT ;?>