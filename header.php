<style type="text/css">
    

    @media (min-width: 992px) {
        .mobile-menu-only {
            display: none !important;
        }
    }
</style>

<header>
    <!-- Header Start -->
   <div class="header-area header-transparrent">
       <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>  
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="job_listing.php">Leads</a></li>
                                        <li><a href="about.php">About</a></li>
                                        <li><a href="#">Page</a>
                                            <ul class="submenu">
                                                <li><a href="blog.php">Blog</a></li>
                                                <li><a href="single-blog.php">Blog Details</a></li>
                                                <li><a href="elements.php">Elements</a></li>
                                                <!-- <li><a href="job_details.php">job Details</a></li> -->
                                            </ul>
                                        </li>
                                        <li><a href="contact.php">Contact</a></li>
                                        <?php
                                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {                                  

                                        ?>
                                            <!-- <img src="" alt="user"> -->
                                            <li class="mobile-menu-only"><a href="logout.php">Log Out</a></li>
                                        <?php }
                                        else {                                    

                                        ?>                      
                                            <li class="mobile-menu-only"><a href="register.php">Register as Agent</a></li>
                                            <li class="mobile-menu-only"><a href="login.php">Login</a></li>
                                        <?php } ?>

                                    </ul>
                                </nav>
                            </div>          
                            <!-- Header-btn -->
                            <div class="header-btn d-none f-right d-lg-block">
                                <?php
                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {                                  

                                ?>
                                    <!-- <img src="" alt="user"> -->
                                    <a href="logout.php" class="btn head-btn2">Log Out</a>
                                <?php }
                                else {                                    

                                ?>                      
                                    <a href="register.php" class="btn head-btn1">Register as Agent</a>
                                    <!-- typeform registration as agent -->
                                    <!-- <a class="btn head-btn1" href="https://lcluochao.typeform.com/to/G3GVBT" data-mode="popup" data-submit-close-delay="0" target="_blank">Register as Agent </a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script> -->

                                    <a href="login.php" class="btn head-btn2">Login</a>
                                <?php } ?> 

                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
       </div>
   </div>
    <!-- Header End -->
</header>