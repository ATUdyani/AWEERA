<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/User.php') ?>

<script type="text/javascript" src="../js/check_form.js"></script>

<script type="text/javascript" src="../js/search_filter_change.js"></script>
<script type="text/javascript" src="../js/user_handler.js"></script>
<script type="text/javascript" src="../js/delete_handler.js"></script>


<h2>Manage Users</h2>

<div class="row ">
    <div class="col-md-12">
        <div class="input-group my-search-panel">
            <div class="input-group-btn search-panel">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span id="search_concept">Filter by</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" id="filter_select">
                    <li><a href="#first_name" value="first_name">First Name</a></li>
                    <li><a href="#last_name" value="last_name">Last Name</a></li>
                    <li><a href="#email" value="email">Email</a></li>
                    <li><a href="#last_login" value="last_login">Last Login</a></li>
                    <li><a href="#type" value="type">Type</a></li>
                    <li class="divider"></li>
                    <li><a href="#all" value="all">Anything</a></li>
                </ul>
            </div>
            <input type="hidden" name="search_param" value="all" id="search_param">
            <input type="text" class="form-control" name="x" placeholder="Search user here..." id="search_text">
        </div>

        <div class="row">
            <div class="col-md-12 result-table" id="result">
                <?php
                // create an object from user class
                $user= new User();
                $user_list = $user->searchUserDetails("*","");
                echo $user_list;
                ?>
            </div>
        </div>
    </div>
</div>


<?php include('modals/message-modal.php'); ?>
<?php include('modals/update-message-modal.php'); ?>
<?php include('modals/change-password-modal.php'); ?>
<?php include('modals/delete-modal.php'); ?>
