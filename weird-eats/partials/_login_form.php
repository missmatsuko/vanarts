<!--main content-->
<div class="content-wrapper">
    <div class='row align-center'>
        <div class='small-12 medium-10 large-6 column'>

            <?php
            if ($signUp) {
                echo "<h1>Sign Up</h1>";
            } else {
                echo "<h1>Log In</h1>";
            }
            
            if (!empty($loginFormMessage)) {
                echo "<p>" . $loginFormMessage . "</p>";
            };
            ?>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                <ul class="list-unstyle">
                    <?php if($signUp){?><li><input type="text" placeholder="Name" name="realName" required></li><?php }?>
                    <?php if($signUp){?><li><input type="text" placeholder="Display Name" name="displayName" title="This is the name that will display on your comments." required></li><?php }?>
                    <li><input type="email" placeholder="E-mail" name="email" required></li>
                    <li><input type="password" placeholder="Password" name="password" required></li>
                    <?php if($signUp){?><li><input type="password" placeholder="Retype Password" name="passwordConfirm" required></li><?php }?>
                    <?php
                    if (!($signUp)) {
                        echo"<li class='float-right'>First time here? <a href='?signup=true'>Sign up now!</a></li>";
                        echo "<li><input type='submit' class='button' value='log in' name='submit'></li>";
                    } else {
                        echo "<li><input type='submit' class='button' value='sign up' name='submit'></li>";
                    }
                    ?>
                </ul>

            </form><!--CMS log in form ends-->
        </div></div><!--row column ends-->
</div><!--content wrapper ends-->
