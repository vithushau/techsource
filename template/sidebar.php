<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-normal">
         TechSource
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  ">
             <a class="nav-link" href="<?php echo BASE_URL; ?>home">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item  ">
             <a class="nav-link" href="<?php echo BASE_URL; ?>add_record">
              <i class="material-icons">person</i>
              <p>Add a Record</p>
            </a>
          </li>
          <li class="nav-item ">
             <a class="nav-link" href="<?php echo BASE_URL; ?>tables">
              <i class="material-icons">content_paste</i>
              <p>Records</p>
            </a>
          </li>
          <!-- <li class="nav-item ">
             <a class="nav-link" href="#">
              <i class="material-icons">library_books</i>
              <p>Search </p>
            </a>
          </li> -->
          <li class="nav-item ">
             <!-- <a class="nav-link" href="<?php echo BASE_URL; ?>user"> -->
             <a class="nav-link" href="<?php echo BASE_URL; ?>#">
              <i class="material-icons">bubble_chart</i>
              <p>Customers</p>
            </a>
          </li>
          
          <li class="nav-item ">
            <!-- <a class="nav-link" href="<?php echo BASE_URL; ?>add_record"> -->
            <a class="nav-link" href="<?php echo BASE_URL; ?>#">
              <i class="material-icons">notifications</i>
              <p>Work Status</p>
            </a>
          </li>
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Sample Data Management UI for TechSource </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <!-- <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <!-- <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li> -->
              <!-- <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="javascript:void(0)">Mike John responded to your email</a>
                  <a class="dropdown-item" href="javascript:void(0)">You have 5 new tasks</a>
                  <a class="dropdown-item" href="javascript:void(0)">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another Notification</a>
                  <a class="dropdown-item" href="javascript:void(0)">Another One</a>
                </div>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
              <li>
                            <a class="profile-pic" href="<?php echo BASE_URL; ?>logout" >
                                <i class="icon-key"></i> 
                                    <span class="text-white font-medium">Logout</span>
                            </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
		