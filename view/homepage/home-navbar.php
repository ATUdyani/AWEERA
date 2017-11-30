<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top my-navbar" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile dis`play -->
        <div class="navbar-header link-1">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php"><img class="img-circle" id="img_logo" src="img/aweera.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class= "collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav navbar-right my-primary-menu">
                <li class="link-1">
                    <a href="controller/direct-user-handler.php">Appointments</a>
                </li>
                <li id="gallery_menu" class="link-1">
                    <a href="#">Gallery</a>
                </li>
                <li class="link-1">
                    <a href="about.php">About</a>
                </li>
                <li id="contact_menu" class="link-1">
                    <a href="#contact">Contact</a>
                </li>
                <!--<li class="dropdown link-1">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="portfolio-1-col.html">1 Column Portfolio</a>
                        </li>
                        <li>
                            <a href="portfolio-2-col.html">2 Column Portfolio</a>
                        </li>
                        <li>
                            <a href="portfolio-3-col.html">3 Column Portfolio</a>
                        </li>
                        <li>
                            <a href="portfolio-4-col.html">4 Column Portfolio</a>
                        </li>
                        <li>
                            <a href="portfolio-item.html">Single Portfolio Item</a>
                        </li>
                    </ul>
                </li>-->

                <?php

                // checking if an user is logged in
                if(!isset($_SESSION['user_id'])){
                    echo "<li class=\"menu link-1\" id=\"login\"><a href=\"#\" data-toggle=\"modal\" data-target=\"#login-modal\" ><i class=\"fa fa-unlock-alt\"></i>Log In</a></li>";
                }
                // if the user is a registered customer, set the logout panel
               /* elseif ($_SESSION['type']=="Customer"){
                    echo "<li class=\"menu link-1\" id=\"logout\">
                        <div class=\"logout-content\">
                            <ul class=\"nav navbar-nav navbar-right\">
                                <li class=\"dropdown\">
                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                        <span class=\"glyphicon glyphicon-user\"></span> 
                                        <strong>Welcome
                                            {$_SESSION['first_name']}
                                        </strong>
                                        <i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i>
                                    </a>

                                    <ul class=\"dropdown-menu\">
                                        <li>
                                            <div class=\"navbar-login\">
                                                <div class=\"row\">
                                                    <div class=\"col-lg-4\">
                                                        <p class=\"text-center\">
                                                            <span class=\"glyphicon glyphicon-user icon-size\"></span>
                                                        </p>
                                                    </div>
                                                    <div class=\"col-lg-8\">
                                                        <p class=\"text-left name-tag\">"
                        .$_SESSION['first_name']." ".$_SESSION['last_name'].
                        "</p>
                                                        <p class=\"text-left small\">
                                                            {$_SESSION['email']}
                                                        </p>
                                                        <p class=\"text-left\">
                                                        <form>
                                                            <input class=\"btn btn-primary btn-block btn-sm\" type=\"submit\" value=\"Edit Profile\" formaction=\"model/users.php\">
                                                        </form>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class=\"divider\"></li>
                                        <li>
                                            <div class=\"navbar-login navbar-login-session\">
                                                <div class=\"row\">
                                                    <div class=\"col-lg-12\">
                                                        <p>
                                                        <form>
                                                            <input class=\"btn btn-danger btn-block\" type=\"submit\" value=\"Log Out\" formaction=\"controller/logout.php\">
                                                        </form>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>";
                }*/
                else{
                    echo "<li class=\"menu link-1\" id=\"welcome-msg\">
                        <a href=\"controller/direct-user-handler.php\" class=\"loggedin\" ><span class=\"glyphicon glyphicon-user\"></span> <strong>Welcome ";
                    echo $_SESSION['first_name'];
                    echo "</strong></a></li>";
                }
                ?>

            </ul>

            <!--            <div class="arrow-up"></div>
                        <div class="login-form">
                            <form method="post">
                                <h4>Log In</h4>

                                <div>
                                    <p id="errorMsg"></p>
                                </div>

                                <div>
                                    <input id="email" class="my-login-text" type="text" placeholder="Email" required="" name="email">
                                </div>

                                <div>
                                    <input id="password" class="my-login-text" type="password" placeholder="Password" required=""  name="password">
                                </div>
                                <div class="clearfix" >
                                    <a href="#">Forgot Password?</a>
                                </div>
                                <div>
                                    <input class="my-login-button" type="submit" formaction="controller/login.php" value="Log In" name="submit">
                                </div>
                                <div>
                                    <text>Don't have an account?</text>
                                    <input class="my-login-button" type="button" value="Register">
                                </div>
                            </form>
                        </div>-->


        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>