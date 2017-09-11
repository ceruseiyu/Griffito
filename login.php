<!DOCTYPE html>
<html>
    <head>
        <title>Log in - Griffito</title>
        <?php include('resource/csslink.php'); ?>
    </head>
    <body>
        <header>
            <?php include('resource/navbar.php'); ?>
        </header>
        <section class="section">
            <div class="columns">
                <div class="column is-narrow-mobile"></div>
                <div class="column">
                    <div class="notification">
                        <div class="field">
                            <label class="label">Username</label>
                            <div class="control has-icons-left">
                                <input class="input" type="username" placeholder="">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control has-icons-left">
                                <input class="input" type="password" placeholder="">
                                <span class="icon is-small is-left">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                        </div>
                        <div class="has-text-centered">
                            <input class="button" type="submit" value="Submit">
                        </div>
                    </div>
                </div>
                <div class="column is-narrow-mobile"></div>
            </div>
      </section>
    </body>
</html>