<?php
    session_start();
    $signin_button = '
    <div class="navbar-item">
        <div class="field is-grouped">
            <p class="control">
                <a class="button" href="login.php">
                    <span class="icon">
                        <i class="fa fa-sign-in"></i>
                    </span>
                    <span>Log in</span>
                </a>
            </p>
        </div>
    </div>';
    $controlpanel_link = '
    <a class="navbar-item" href="/user/index.php">
        Control Panel
    </a>
    <a class="navbar-item" href="/user/logout.php">
        Log Out
    </a>';
    if(isset($_SESSION['login_user'])) {
        echo $controlpanel_link;
    } else {
        echo $signin_button;
    }
?>
