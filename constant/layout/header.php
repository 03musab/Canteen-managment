<?php 
//session_start();
//include('../constant/check.php');?>
<?php 
//session_start();
include('./constant/check.php');
 include('./constant/connect.php');
?>
    
    <div id="main-wrapper">
        
        <div class="header">
            <marquee class="d-lg-none d-block">
                <div class="ml-lg-5 pl-lg-5 ">
                  
                     <b id="ti" class="ml-lg-5 pl-lg-5"></b>
                   
                   
                    </div>
            </marquee>
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        
                         
                        <b><img src="./assets/uploadImage/Logo/logo.jpg"  alt="homepage" class="dark-logo" style="width:50%;height:auto;"/></b>
                       
                    </a>
                </div>
                
                <div class="navbar-collapse">
                    
                    <ul class="navbar-nav mr-auto mt-md-0">
                        
                        
                      
                        
                    </ul>
                <marquee behavior="alternate" direction="left" scrollamount="4"><p style="color: red;">
                College Canteen Management System</p>
            </marquee>
                    <ul class="navbar-nav my-lg-0 ml-auto">

                        <div id="google_translate_element"></div>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                                <img src="./assets/uploadImage/Profile/young-woman-avatar-facial-features-stylish-userpic-flat-cartoon-design-elegant-lady-blue-jacket-close-up-portrait-80474088.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                   <?php if(isset($_SESSION['userId'])) { ?>
                                     <li><a href="setting.php"><i class="fa fa-key"></i> Changed Password</a></li>
                                      <li><a href="users.php"><i class="fa fa-user"></i> Add user</a></li>
                                     <?php }?>
                               
                                    <li><a href="./constant/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
