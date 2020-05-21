<?php

session_start();

$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

require_once "config.php";

$sql = "SELECT * FROM lead WHERE status = 1 ORDER By id LIMIT 6";
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
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/price_rangs.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">

            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Pacifico">

            <style type="text/css">
                .slider-area .slick-list {
                    overflow: visible;
                }

                .slider-area .hero__caption h1 {
                    text-shadow: 3px 3px 0px rgba(0,0,0,0.1), 7px 7px 0px rgba(0,0,0,0.05);
                }
                .slider-area .hero__caption h1 span {
                    font: 700 100px/1.5 'Pacifico', Helvetica, sans-serif;
                    color: #fb246a;                    
                }

                .apply-process-area .single-process .process-cap h5 {
                    color: #fb246a;
                    font-size: 22px;
                }
                .apply-process-area .single-process {
                    background: none;
                }

                .apply-process-area .single-process .process-ion span {
                    color: #252b60;
                }

                .our-services .single-services .services-ion span {
                    color: #fff;
                }

                .our-services .single-services .services-cap h5 a {
                    color: #fff;
                }

                .border-btn2 {
                    border: 1px solid #ccc;
                    color: #ccc;
                }

                a.disabled {
                    pointer-events: none;
                    background: #999 !important;
                }

                #select-title {
                    margin-bottom: 25px;
                    font-weight: 700;
                    color: #fb246a;
                }

                /*form.search-box {
                    width: 80%;
                }*/

                form.search-box .select-form {
                    width: 79%;
                }

                /*form.search-box .search-form {
                    float: left;
                    width: 40%;
                }*/

                form.search-box .select-form .nice-select {
                    font-size: 20px;
                }

                form.search-box .search-form a {
                    font-size: 20px;
                }

                .apply-process-area {
                    padding-top: 75px;
                    padding-bottom: 10px;
                }

                .apply-process-area h2, .featured-job-area h2 {
                    margin-bottom: 30px;
                }

                .our-services {
                    padding-top: 100px;
                    padding-bottom: 100px; 
                }

                .featured-job-area {
                    padding-top: 100px;
                    padding-bottom: 60px; 
                }

                .testimonial-area {
                    padding-top: 100px;
                    padding-bottom: 150px;
                }

                .items-link a {
                    color: #fff;
                    background-color: #fb246a;
                    border: none;
                }

                .not-login {
                    background-color: #dee2e6 !important;
                }

                .all-leads {
                    width: 200px;
                    margin: auto;                    
                }

                .all-leads a {
                    color: #fb246a;
                    background-color: #fff;
                    border: 1px solid #fb246a;
                }

                @media (min-width: 1200px) {
                    .col-xl-6 {
                        -ms-flex: 0 0 60%;
                        flex: 0 0 60%;
                        max-width: 60%;
                    }


                }


                @media (max-width: 991px) {
                    form.search-box .search-form a {
                        font-size: 15px;
                    }
                }

                @media (min-width: 768px) {
                    .testimonial-area  {
                        background-image: url(assets/img/gallery/bg-winter-neva.png);
                    }
                }

                @media (max-width: 767px) {
                    .slider-area .hero__caption h1 {
                        margin-top: 20px;
                        margin-bottom: 40px;
                    }
                    .slider-area .hero__caption h1 span {
                        font-size: 40px;
                    }
                    .featured-job-area {
                        display: none;
                    }

                    .testimonial-area {
                        background-image: none;
                    }
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

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Find the right insurance cover for <span>YOU</span></h1>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        <div class="row">
                            <div class="col-xl-8">
                                <h3 id="select-title">&nbsp;I want to get FREE proposal for</h3> 
                                <form action="#" class="search-box">
                                    <!-- <div class="input-form">
                                        <input type="text" placeholder="Job Tittle or keyword">
                                    </div> -->
                                                                
                                    <div class="select-form">
                                        <div class="select-itms">
                                            <select name="select" id="select1" onchange="planType()">
                                                <option value="0">Select plan type</option>
                                                <option value="1">Protection Plan (term life / whole life / others)</option>
                                                <option value="2">Investments Plan (annuity / others)</option>
                                                <option value="3">Savings Plan (endowment plan / retirement plan / others)</option>
                                            </select>
                                        </div>
                                    </div>

                                    </script>


                                    <script type="text/javascript">
                                        function planType() { 
                                            var plan_type_id = document.getElementById('select1').value;
                                            $(".typeform-share").removeClass("disabled");
                                            if (plan_type_id == "1") {
                                                $(".typeform-share").attr("href", "https://lcluochao.typeform.com/to/kHOxEY");
                                            } else if (plan_type_id == "2") {
                                                $(".typeform-share").attr("href", "https://lcluochao.typeform.com/to/gVUoKr");
                                            } else if (plan_type_id == "3") {
                                                $(".typeform-share").attr("href", "https://lcluochao.typeform.com/to/rEYLpr");
                                            } else {
                                                $(".typeform-share").addClass("disabled");
                                            }
                                        }
                                    </script>

                                    <div class="search-form">
                                        <!-- <a href="#">Find job</a> -->
                                        <!-- typeform insert -->
                                        <a class="typeform-share button disabled" href="" data-mode="popup" target="_blank">Get started </a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script>

                                        

                                    </div>	
                                </form>	

                                
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->

        <!-- How  Apply Process Start-->
        <!-- <div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png"> -->

        <div class="apply-process-area apply-bg pt-150 pb-150">

            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <!-- <span>Apply process</span> -->
                            <h2>How it works</h2>
                        </div>
                    </div>
                </div>
                <!-- Apply Process Caption -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="process-cap">
                               <h5>1. Request</h5>
                               <p>Answer a few simple questions about yourself to request for proposals.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-search"></span>
                            </div>
                            <div class="process-cap">
                               <h5>2. Receive</h5>
                               <p>Receive personalised proposals based on your profile from insurance gurus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-curriculum-vitae"></span>
                            </div>
                            <div class="process-cap">
                               <h5>3. Choose</h5>
                               <p>Select the proposal that suits your best & connect with the guru for details.</p>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        <!-- How  Apply Process End-->

        <!-- Our Services Start -->
        <div class="our-services section-pad-t30" data-background="assets/img/gallery/bg-fly-high.png">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle white-text text-center">
                            <span>For Insurance Agents</span>
                            <h2>Leads by Plan Type</h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-contnet-center">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-content"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.php">All</a></h5>
                                <span>(653)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-helmet"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.php?plan_type=1">Protection</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-report"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.php?plan_type=2">Investments</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-real-estate"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.php?plan_type=3">Savings</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>

                    <!-- bottom 4 -->
                    <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.html">Construction</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-high-tech"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.html">Information Technology</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-app"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.html">Real Estate</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-cms"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="job_listing.html">Content Writer</a></h5>
                                <span>(658)</span>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- More Btn -->
                <!-- Section Button -->
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                            <a href="job_listing.html" class="border-btn2">Browse All Leads</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- Our Services End -->
        <!-- Online CV Area Start -->
        <!-- <div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="assets/img/gallery/cv_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="cv-caption text-center">
                            <p class="pera1">FEATURED TOURS Packages</p>
                            <p class="pera2"> Make a Difference with Your Online Resume!</p>
                            <a href="#" class="border-btn2 border-btn4">Upload your cv</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Online CV Area End-->
        <!-- Featured_job_start -->
        <section class="featured-job-area feature-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <!-- <span>Recent Leads</span> -->
                            <h2>Latest Leads</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <!-- single-job-content -->
                        <?php   
                            while($row = mysqli_fetch_array($rows)) {
                        ?>
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <img src="assets/img/icon/<?php echo $row['plan_type_id'];?>.png" alt="">
                                    <!-- <a href="job_details.html"><img src="assets/img/icon/job-list1.png" alt=""></a> -->
                                </div>
                                <div class="job-tittle">
                                    <h4><?php echo $row['name']; ?></h4>
                                    <p><?php echo $row['email']; ?></p>
                                    <ul>
                                        <li>Age: 
                                        <?php
                                            $age = (int)date("Y") - (int)substr($row['dob'], -4);                                      
                                            echo $age;
                                        ?>                                                
                                        </li>                                        
                                        <li>
                                        <?php
                                            $gender_sql = "SELECT gender FROM gender WHERE id = ".$row['gender_id'];
                                            $result_gender = mysqli_query($link, $gender_sql);
                                            $gender = mysqli_fetch_assoc($result_gender);
                                            echo $gender['gender'];
                                        ?>                                                
                                        </li>
                                        <li>
                                        <?php
                                            $smoker_sql = "SELECT type FROM smoker WHERE id = ".$row['smoker_id'];
                                            $result_smoker = mysqli_query($link, $smoker_sql);
                                            $smoker = mysqli_fetch_assoc($result_smoker);
                                            echo $smoker['type'];
                                        ?> 
                                        </li>
                                        <li>Monthly budget: $<?php echo $row['budget']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link f-right">
                                <?php                                 
                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                    $proposed_agent_sql = "SELECT COUNT(*) FROM proposal WHERE leads_id = " . $row['id'] . " AND agent_id = " . $_SESSION["id"];
                                    $proposed_agent = mysqli_query($link, $proposed_agent_sql);
                                    if (mysqli_fetch_array($proposed_agent)[0]!=0) {
                                    ?>
                                        <a href="#" class="disabled">Proposed</a>
                                    <?php } else {?>                                    
                                    <a href="job_details.php?id=<?php echo $row['id']; ?>">Propose Plan</a>            
                                    <?php } 
                                } else { ?> 
                                    <a href="login.php" class="not-login">Login to Propose</a>
                                <?php } ?> 
                                <!-- <a href="job_details.html">Full Time</a> -->
                                <span>Requested on: <?php echo date('d/m/Y', $row['request_time']); ?></span>
                            </div>
                        </div>  
                        <?php } ?>                      
                    </div>
                </div>
                <div class="all-leads">
                    <div class="items-link">
                        <a href="job_listing_old.php">View All Leads</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Featured_job_end -->
        
        <!-- Testimonial Start -->
        <div class="testimonial-area testimonial-padding">
            <div class="container">
                <!-- Testimonial contents -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-10">
                        <div class="h1-testimonial-active dot-style">
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption">
                                    <!-- founder -->
                                    <div class="testimonial-founder">
                                        <div class="founder-img mb-30">
                                            <img src="assets/img/testmonial/testimonial-founder.png" alt="">
                                            <span>Margaret Lawson</span>
                                            <p>Creative Director</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you. Eat clean it will care for you and workout hard.”</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img mb-30">
                                            <img src="assets/img/testmonial/testimonial-founder.png" alt="">
                                            <span>Margaret Lawson</span>
                                            <p>Creative Director</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you. Eat clean it will care for you and workout hard.”</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <!-- Testimonial Content -->
                                <div class="testimonial-caption ">
                                    <!-- founder -->
                                    <div class="testimonial-founder  ">
                                        <div class="founder-img mb-30">
                                            <img src="assets/img/testmonial/testimonial-founder.png" alt="">
                                            <span>Margaret Lawson</span>
                                            <p>Creative Director</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-top-cap">
                                        <p>“I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you. Eat clean it will care for you and workout hard.”</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        <!-- Support Company Start-->
        <!--<div class="support-company-area support-padding fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="right-caption">
                            <!~~ Section Tittle ~~>
                            <div class="section-tittle section-tittle2">
                                <span>What we are doing</span>
                                <h2>24k Talented people are getting Jobs</h2>
                            </div>
                            <div class="support-caption">
                                <p class="pera-top">Mollit anim laborum duis au dolor in voluptate velit ess cillum dolore eu lore dsu quality mollit anim laborumuis au dolor in voluptate velit cillum.</p>
                                <p>Mollit anim laborum.Duis aute irufg dhjkolohr in re voluptate velit esscillumlore eu quife nrulla parihatur. Excghcepteur signjnt occa cupidatat non inulpadeserunt mollit aboru. temnthp incididbnt ut labore mollit anim laborum suis aute.</p>
                                <a href="about.php" class="btn post-btn">Post a job</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="support-location-img">
                            <img src="assets/img/service/support-img.jpg" alt="">
                            <div class="support-img-cap text-center">
                                <p>Since</p>
                                <span>1994</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- Support Company End-->
        <!-- Blog Area Start -->
        <!-- <div class="home-blog-area blog-h-padding">
            <div class="container">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>Our latest blog</span>
                            <h2>Our recent news</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="home-blog-single mb-30">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src="assets/img/blog/home-blog1.jpg" alt="">
                                    
                                    <div class="blog-date text-center">
                                        <span>24</span>
                                        <p>Now</p>
                                    </div>
                                </div>
                                <div class="blog-cap">
                                    <p>|   Properties</p>
                                    <h3><a href="single-blog.html">Footprints in Time is perfect House in Kurashiki</a></h3>
                                    <a href="#" class="more-btn">Read more »</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="home-blog-single mb-30">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src="assets/img/blog/home-blog2.jpg" alt="">
                                    
                                    <div class="blog-date text-center">
                                        <span>24</span>
                                        <p>Now</p>
                                    </div>
                                </div>
                                <div class="blog-cap">
                                    <p>|   Properties</p>
                                    <h3><a href="single-blog.html">Footprints in Time is perfect House in Kurashiki</a></h3>
                                    <a href="#" class="more-btn">Read more »</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Blog Area End -->

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

		<!-- Jquery Slick , Owl-Carousel Plugins -->
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