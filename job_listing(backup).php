<?php
session_start();

if (isset($_SESSION['previous'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
        unset($_SESSION['filter']);
   }
}

$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

require_once "config.php";

if (isset($_SESSION['filter'])) {
    $filter = $_SESSION['filter'];
} else {
    $filter = "";
}
//filter plan type
if (isset($_GET['plan_type']) && $_GET['plan_type'] != 4) {
    $filter .= " AND plan_type_id = ". $_GET['plan_type'];
}
                                                 


$_SESSION['filter'] = $filter;

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page; 

$total_pages_sql = "SELECT COUNT(*) FROM lead WHERE status = 1" . $filter;
$result = mysqli_query($link, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);                              
$sql = "SELECT * FROM lead WHERE status = 1" . $filter . " LIMIT $offset, $no_of_records_per_page";

$rows = mysqli_query($link, $sql);
?>

<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Job board HTML-5 Template </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/price_rangs.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">

            <style type="text/css">

                .items-link a {
                    color: #fff;
                    background-color: #fb246a;
                    border: none;
                }

                a.disabled {
                    /*pointer-events: none;*/
                    background-color: #dee2e6 !important;
                }
            </style>


   </head>

   <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <?php include('header.php'); ?>
    <main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Leads</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <!-- <div class="row">
                            <div class="col-12">
                                    <div class="small-section-tittle2 mb-45">
                                    <div class="ion"> <svg 
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="20px" height="12px">
                                    <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                        d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                    </svg>
                                    </div>
                                    <h4>Filter:</h4>
                                </div>
                            </div>
                        </div> -->
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <!-- select-Categories start -->
                                <div class="select-Categories pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Plan Type</h4>
                                    </div>
                                    <label class="container">Protection Plan
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Investments Plan
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Savings Plan
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                </div>
                                <!-- select-Categories End -->
                                <div class="small-section-tittle2">
                                     <h4>Lead Status</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2 pb-50">
                                    <select name="select">
                                        <option value="">Active</option>
                                        <option value="">Completed</option>
                                        <option value="">Proposed</option>
                                    </select>
                                </div>
                                <!--  Select job items End-->

                            </div>
                            <!-- single two -->
                            <!--<div class="single-listing">
                               <div class="small-section-tittle2">
                                     <h4>Job Location</h4>
                               </div>
                                <!~~ Select job items start ~~>
                                <div class="select-job-items2">
                                    <select name="select">
                                        <option value="">Anywhere</option>
                                        <option value="">Category 1</option>
                                        <option value="">Category 2</option>
                                        <option value="">Category 3</option>
                                        <option value="">Category 4</option>
                                    </select>
                                </div>
                                <!~~  Select job items End~~>
                                <!~~ select-Categories start ~~>
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Experience</h4>
                                    </div>
                                    <label class="container">1-2 Years
                                        <input type="checkbox" >
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">2-3 Years
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">3-6 Years
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">6-more..
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!~~ select-Categories End ~~>
                            </div>
                            <!~~ single three ~~>
                            <div class="single-listing">
                                <!~~ select-Categories start ~~>
                                <div class="select-Categories pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Requested Between</h4>
                                    </div>
                                    <label class="container">Now to 3 days ago
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">3 - 7 days ago
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">7 - 14 days ago
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">14 - 30 days ago
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">30 days and earlier
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <!~~ select-Categories End ~~>
                            </div>
                            <div class="single-listing">
                                <!~~ Range Slider Start ~~>
                                <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                                    <div class="small-section-tittle2">
                                        <h4>Monthly Budget</h4>
                                    </div>
                                    <div class="widgets_inner">
                                        <div class="range_item">
                                            <!~~ <div id="slider-range"></div> ~~>
                                            <input type="text" class="js-range-slider" value="" />
                                            <div class="d-flex align-items-center">
                                                <!~~ <div class="price_text">
                                                    <p>Monthly Budget: </p>
                                                </div> ~~>
                                                <div class="price_value d-flex justify-content-center">
                                                    <input type="text" class="js-input-from" id="amount" readonly />
                                                    <span>to</span>
                                                    <input type="text" class="js-input-to" id="amount" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                              <!~~ Range Slider End ~~>
                            </div>-->
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                    <!-- <div class="col-xl-12"> -->
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <span><?php echo $total_rows; ?> Leads found</span>
                                            <!-- Select job items start -->
                                            <div class="select-job-items">
                                                <span>Sort by</span>
                                                <select name="select">
                                                    <option value="">None</option>
                                                    <option value="">job list</option>
                                                    <option value="">job list</option>
                                                    <option value="">job list</option>
                                                </select>
                                            </div>
                                            <!--  Select job items End-->
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->

                                <?php   
                                while($row = mysqli_fetch_array($rows)) {  
                                    $proposed = 0;            
                                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                        $proposed_agent_sql = "SELECT COUNT(*) FROM proposal WHERE leads_id = " . $row['id'] . " AND agent_id = " . $_SESSION["id"];
                                        $proposed_agent = mysqli_query($link, $proposed_agent_sql);
                                        if (mysqli_fetch_array($proposed_agent)[0]!=0) {
                                            $proposed = 1;
                                        }
                                    }
                                

                                    if ($proposed == 0) {
                                    ?>
                                        <div class="single-job-items mb-30">
                                            <div class="job-items">
                                                <!-- <div class="company-img">
                                                    <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                                </div> -->
                                                <div class="job-tittle job-tittle2">
                                                    <!-- <a href="#"> -->
                                                        <!-- <h4>FirstName, Surnames</h4> -->
                                                        <?php 
                                                            echo $row['name'];
                                                        ?>
                                                    <!-- </a> -->
                                                    <ul>
                                                        <li>Plan Type</li>
                                                        <!-- <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li> -->
                                                        <li>$3500 - $4000</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="items-link items-link2 f-right">
                                                <?php 
                                                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                                        ?>
                                                        <a href="job_details.php?id=<?php echo $row['id']; ?>">Propose Plan</a>            
                                                <?php } else { ?> 
                                                <a href="login.php" class="disabled">Login to Propose</a>
                                                <?php } ?> 
                                                <span>15 May 2020</span>
                                            </div>
                                        </div>

                                <?php }
                                } 
                                mysqli_close($link);                                
                                ?>
                                <!-- single-job-content -->                               

                                <!-- <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#"><img src="assets/img/icon/job-list2.png" alt=""></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="#">
                                                <h4>Digital Marketer</h4>
                                                
                                            </a>
                                            <ul>
                                                <li>Creative Agency</li>
                                                <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                <li>$3500 - $4000</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link items-link2 f-right">
                                        <a href="job_details.html">Full Time</a>
                                        <span>7 hours ago</span>
                                    </div>
                                </div> -->

                                
                                
                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
        <!--Pagination Start  -->
<!--         <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- pagination -->
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item"><a class="page-link <?php if($pageno <= 1){ echo 'disabled'; } ?>" href="?pageno=1">First</a></li>
                                    <li class="page-item"><a class="page-link <?php if($pageno <= 1){ echo 'disabled'; } ?>" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a></li>
                                    <li class="page-item"><a class="page-link disabled" ><?php echo $pageno; ?></a></li>
                                    <li class="page-item"><a class="page-link <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a></li>
                                <li class="page-item"><a class="page-link <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End  -->
        
    </main>
    <?php include('footer.php'); ?>

	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Range -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <script src="./assets/js/price_rangs.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
        
    </body>
</html>