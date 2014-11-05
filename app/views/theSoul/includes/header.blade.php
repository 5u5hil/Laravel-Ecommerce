<div class="navbar-header">
    <button type="button" class="navbar-toggle hr-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="fa fa-bars"></span>
    </button>

    <!--logo start-->
    <!--logo start-->
    <div class="brand ">
        <a href="index.html" class="logo">
            <h4>The Souled Store</h4>
        </a>


    </div>
    <!--logo end-->
    <!--logo end-->
    <div class="horizontal-menu navbar-collapse collapse ">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::route("dashboard")}}">Dashboard</a></li>
            <li class="dropdown">
                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">Catalog <b class=" fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ URL::route("category")}}">Manage Categories</a></li>
                    <li><a href="{{ URL::route("attrsets")}}">Manage Attribute Sets</a></li>
                    <li><a href="{{ URL::route("attrs")}}">Manage Attributes</a></li>
                    <li><a href="{{ URL::route("products")}}">Manage Products</a></li>
                </ul>
            </li>
            <li><a href="basic_table.html">Sample Menu</a></li>
            <li class="dropdown">
                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">Extra <b class=" fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="blank.html">Blank Page</a></li>
                    <li><a href="boxed_page.html">Boxed Page</a></li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="404.html">404 Error Page</a></li>
                    <li><a href="500.html">500 Error Page</a></li>
                </ul>
            </li>
        </ul>

    </div>
    <div class="top-nav hr-top-nav">
        <ul class="nav pull-right top-menu">
            <li>
                <input type="text" class="form-control search" placeholder=" Search">
            </li>
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    {{ HTML::image('public/theSoul/images/avatar1_small.jpg' ) }}
                    <span class="username">John Doe</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                    <li><a href="{{ URL::route('soul_logout'); }}"><i class="fa fa-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
    </div>

</div>