<div class="row page-login">
    <div class="small-12 medium-6 small-centered columns">
        <h3>Log In</h3>
        <p>Log in is required to access our resources.</p>
        <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <ul class="unstyled-list">
                    <li class="sign-up-fields <?php
                if (!isset($_GET['email'])) {
                    echo "hide";
                }
                ?>">
                        <ul class="unstyled-list">
                            <li>Name:</li>
                            <li><input type="text" name="name" pattern="^[a-zA-Z'\s]+$" title='Name can only contain letters, spaces, and apostrophes.'></li>
                        </ul>
                    </li>
                    <li class="sign-up-fields <?php
                if (!isset($_GET['email'])) {
                    echo "hide";
                }
                ?>">
                        <ul class="unstyled-list">
                            <li>Email:</li>
                            <li><input type="text" name="email" value="<?php
                                if (isset($_GET['email'])) {
                                    echo $_GET['email'];
                                }
                                ?>"></li>
                        </ul>
                    </li>
                    <li class="sign-up-fields <?php
                if (!isset($_GET['email'])) {
                    echo "hide";
                }
                ?>">
                        <ul class="unstyled-list">
                            <li>Country:</li>
                            <li><input type="text" name="country" pattern="^[a-zA-Z'\s]+$" title='Country can only contain letters, spaces, and apostrophes.'></li>
                        </ul>
                    </li>
                    <li class="sign-up-fields <?php
                if (!isset($_GET['email'])) {
                    echo "hide";
                }
                ?>">
                        <ul class="unstyled-list">
                            <li>Age:</li>
                            <li><input type="number" name="age" min='0' max='122' title="Age must be a number between 0 and 122."></li>
                        </ul>
                    </li>

                <li>
                    <ul class="unstyled-list">
                        <li>Username:</li>
                        <li><input type="text" name="username" required></li>
                    </ul>
                </li>
                <li>
                    <ul class="unstyled-list">
                        <li>Password:</li>
                        <li><input type="password" name="password" required></li>
                    </ul>
                </li>
                <li>
                    <input type="submit" name="submit" class="button">
                </li>
            </ul>
        </form><!--form ends-->
        <a href="#" id="sign-up-link">First time here? Click here to sign up.</a>
    </div><!--column ends-->
</div><!--row ends-->