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

                    <?php
                    if(!isset($_SESSION['user_id'])){
                        echo "<a href=\"#\" data-toggle=\"modal\" data-target=\"#login-modal\" >Make Appointment</a>";}
                    else {
                        echo "<a href=\"controller/direct-user-handler.php\">Make Appointment</a>";
                    }
                    ?>

                </li>
                <li id="gallery_menu" class="link-1">
                    <a href="gallery.php">Gallery</a>
                </li>
                <li class="link-1">
                    <a href="about.php">About</a>
                </li>
                <li id="contact_menu" class="link-1">
                    <a href="#contact">Contact</a>
                </li>
                <li class="link-1">
                    <a href="aweera-mirror.php">AWEERA-Mirror</a>
                </li>

                <?php

                // checking if an user is logged in
                if(!isset($_SESSION['user_id'])){
                    echo "<li class=\"menu link-1\" id=\"login\"><a href=\"#\" data-toggle=\"modal\" data-target=\"#login-modal\" >
                            <span class='glyphicon glyphicon-log-in'></span> Log In</a></li>";
                }
                else{
                    echo "<li class=\"menu link-1\" id=\"welcome-msg\">
                        <a href=\"controller/direct-user-handler.php\" class=\"loggedin\" ><span class=\"glyphicon glyphicon-user\"></span> <strong>Welcome ";
                    echo $_SESSION['first_name'];
                    echo "</strong></a></li>";
                }
                ?>

            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>