<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 22/07/2014
 * Time: 10:10
 */
?>

<div class="navbar navbar-fixed-top" data-activeslide="1">
    <div class="container">

        <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>


        <div class="nav-collapse collapse navbar-responsive-collapse">
            <ul class="nav row">
                <li data-slide="1" class="col-12 col-sm-2"><a id="menu-link-1" href="#slide-1" title="Next Section"><span class="icon icon-home"></span> <span class="text">HOME</span></a></li>
                <li data-slide="2" class="col-12 col-sm-2"><a id="menu-link-2" href="#slide-2" title="Next Section"><span class="icon icon-user"></span> <span class="text">ABOUT US</span></a></li>
                <li data-slide="6" class="col-12 col-sm-2"><a id="menu-link-3" href="#slide-6" title="Next Section"><span class="icon icon-envelope"></span> <span class="text">CONTACT</span></a></li>
                <li class="col-12 col-sm-2">
                    <a href="{{ URL::action('UserController@login') }}"><span class="icon icon-user"></span> <span class="text">LOGIN</span></a>
                </li>
            </ul>
            <div class="row">
                <div class="col-sm-2 active-menu"></div>
            </div>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</div><!-- /.navbar -->