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
            <a href="../index.php"><img class="img-circle" id="img_logo" src="../img/aweera.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class= "collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav navbar-right my-primary-menu">
                <li class="link-1">
                    <a class='book-now-button' href="#">Book Now</a>
                </li>
                <li class="link-1">
                    <a href="../gallery.php">Gallery</a>
                </li>
                <li class="link-1">
                    <a href="../about.php">About</a>
                </li>
                <li class="link-1">
                    <a href="../index.php#contact">Contact</a>
                </li>
                <li class="link-1">
                    <a href="../aweera-mirror.php">AWEERA-Mirror</a>
                </li>

                <li class="menu link-1" id="logout">
                    <div class="logout-content">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-user"></span> 
                                    <strong>Welcome
                                        <?php echo $_SESSION['first_name'] ?>
                                    </strong>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="navbar-login">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p class="text-center">
                                                        <img src="../img/profiles/<?php echo $_SESSION['user_profile_pic'];?>" class="avatar img-circle profile-image"  alt="avatar">
                                                    </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <p class="text-left name-tag">
                                                        <?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?>
                                                    </p>
                                                    <p class="text-left small">
                                                        <?php echo $_SESSION['email'] ?>
                                                    </p>
                                                    <p class="text-left">
                                                    <form>
                                                        <input type="hidden" id="user_type" value="<?php echo $_SESSION['type'];?>">
                                                        <input id="<?php echo $_SESSION['user_reg_id'];?>" class="btn btn-primary btn-block btn-sm" type="button" value="Edit Profile" onclick="handleProfile(this.id)">
                                                    </form>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="navbar-login navbar-login-session">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p>
                                                    <form>
                                                        <input class="btn btn-danger btn-block" type="submit" value="Log Out" formaction="../controller/logout.php">
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
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>