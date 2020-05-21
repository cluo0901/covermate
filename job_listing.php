<?php
session_start();

if (isset($_SESSION['previous'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
        unset($_SESSION['filter']);
        $_SESSION['status'] = 1;
   } else {
        $status_filter = $_SESSION['status'];
   }
}

$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

require_once "config.php";

if (isset($_SESSION['filter'])) {
    $filter = $_SESSION['filter'];
} else {
    $filter = "";
}

if (isset($_SESSION['status'])) {
    $status_filter = $_SESSION['status'];
} else {
    $status_fitler = 1;
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

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

    if ($status_filter != 2) {
        $total_pages_sql = "
        SELECT COUNT(*) FROM lead
        WHERE status = " . $status_filter. $filter . " AND id NOT IN
        (SELECT leads_id FROM proposal 
        LEFT JOIN lead ON proposal.leads_id = lead.id 
        WHERE proposal.agent_id = ". $_SESSION['id'] . ")";
        $sql = "
        SELECT * FROM lead
        WHERE status = " . $status_filter . $filter . " AND id NOT IN
        (SELECT leads_id FROM proposal 
        LEFT JOIN lead ON proposal.leads_id = lead.id
        WHERE proposal.agent_id = ". $_SESSION['id'] . ") LIMIT $offset, $no_of_records_per_page";
    } else {
        $total_pages_sql = "SELECT COUNT(*) FROM lead
        RIGHT JOIN proposal ON proposal.leads_id = lead.id 
        WHERE proposal.agent_id = ". $_SESSION['id'] . $filter;


        $sql = "SELECT * FROM lead 
        RIGHT JOIN proposal ON proposal.leads_id = lead.id 
        WHERE proposal.agent_id = " . $_SESSION['id'] . $filter . " LIMIT $offset, $no_of_records_per_page";        
    }        

} else {
    $total_pages_sql = "SELECT COUNT(*) FROM lead WHERE status = " . $status_filter . $filter;
    $sql = "SELECT * FROM lead WHERE status = " . $status_filter . $filter . " LIMIT $offset, $no_of_records_per_page";
}


$result = mysqli_query($link, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$rows = mysqli_query($link, $sql);

$_SESSION['rows'] = $total_rows;
$_SESSION['pages'] = $total_pages;

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
                    background-color: #dee2e6 !important;
                }

                .pagination .page-item{
                    cursor: pointer;
                    margin-left: 0;
                    border-top-left-radius: .25rem;
                    border-bottom-left-radius: .25rem;
                    font-size: 15px;
                    text-align: center;
                    box-shadow: none;
                    outline: 0;
                    color: #777777;
                    padding: 11px 12px;
                    background: #fff;
                    margin: 0 3px;
                    border-radius: 5px;
                    border: 1px solid #f0f0f0;
                    position: relative;
                    display: block;
                    line-height: 1.25;
                }

                .pagination .disabled {
                    pointer-events: none;
                    background-color: #dee2e6;
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
                        <div class="row">
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
                        </div>
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
                                        <input type="checkbox" id="checkbox-1" checked = "checked">
                                        <span class="checkmark" onclick = "filter_plan_type(1)"></span>
                                    </label>
                                    <label class="container">Investments Plan
                                        <input type="checkbox" id="checkbox-2" checked = "checked">
                                        <span class="checkmark" onclick = "filter_plan_type(2)"></span>
                                    </label>
                                    <label class="container">Savings Plan
                                        <input type="checkbox" id="checkbox-3" checked = "checked">
                                        <span class="checkmark" onclick = "filter_plan_type(3)"></span>
                                    </label>
                                    
                                </div>

                                <script type="text/javascript">
                                    function filter_plan_type(plan_type_id) {
                                        // $("#checkbox-"+plan_type_id).prop("checked", false);
                                        // alert($("#checkbox-1").is(':checked'));
                                        // alert($("#checkbox-2").is(':checked'));
                                        // alert($("#checkbox-3").is(':checked'));
                                        // $checkbox_1 = $("#checkbox-1").is(':checked');
                                        // $checkbox_2 = $("#checkbox-2").is(':checked');
                                        // $checkbox_3 = $("#checkbox-3").is(':checked');
                                        var checkbox_1 = -1;                            
                                        if ($("#checkbox-1").is(':checked')) {
                                            checkbox_1 = 1;
                                        }
                                        var checkbox_2 = -1;                            
                                        if ($("#checkbox-2").is(':checked')) {
                                            checkbox_2 = 1;
                                        }
                                        var checkbox_3 = -1;                            
                                        if ($("#checkbox-3").is(':checked')) {
                                            checkbox_3 = 1;
                                        }

                                        if (plan_type_id == 1) {
                                            checkbox_1 = checkbox_1 * (-1);
                                        } else if (plan_type_id == 2) {
                                            checkbox_2 = checkbox_2 * (-1);
                                        } else if (plan_type_id == 3) {
                                            checkbox_3 = checkbox_3 * (-1);
                                        }

                                        // alert(checkbox_1);
                                        // alert(checkbox_2);
                                        // alert(checkbox_3);
                                        $.ajax(
                                        {
                                            url: 'filter.php',
                                            type: 'POST',
                                            data: {
                                                checkbox_1 : checkbox_1,
                                                checkbox_2 : checkbox_2,
                                                checkbox_3 : checkbox_3,
                                            },
                                            success:function(data) {
                                                $(".featured-job-area").html(data);
                                            },
                                        });
                                        $("#page-current").html(1);
                                        $("#page-prev").addClass("disabled");
                                        $("#page-first").addClass("disabled");
                                        $("#page-next").removeClass("disabled");
                                        $("#page-last").removeClass("disabled");
                                    }
                                </script>

                                <!-- select-Categories End -->
                                <div class="small-section-tittle2">
                                     <h4>Lead Status</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2 pb-50">
                                    <select name="select" id = "status-filter" onchange = "filter_status()">
                                        <option value="1">Active</option>
                                        <?php 
                                        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                            ?>
                                            <option value="2">Proposed</option>
                                        <?php } ?>
                                        <option value="-1">Completed</option>                           
                                    </select>
                                </div>
                                <script type="text/javascript">
                                    function filter_status() {
                                        var status_filter = $("#status-filter").val();
                                        // alert(status_filter);
                                        $.ajax(
                                        {
                                            url: 'filter.php',
                                            type: 'POST',
                                            data: 'status_filter='+status_filter,
                                            success:function(data) {
                                                $(".featured-job-area").html(data);
                                            },
                                        });
                                        $("#page-current").html(1);
                                        $("#page-prev").addClass("disabled");
                                        $("#page-first").addClass("disabled");
                                        $("#page-next").removeClass("disabled");
                                        $("#page-last").removeClass("disabled");
                                        // var total_rows = parseInt($(".featured-job-area span").text());
                                        // var no_of_records_per_page = parseInt("<?php echo $no_of_records_per_page ?>");
                                        // var total_pages = Math.ceil(total_rows / no_of_records_per_page);
                                        // alert(total_rows);
                                        // alert(no_of_records_per_page);
                                        // alert(total_pages);
                                        // $("#page-next").removeClass("disabled");
                                        // $("#page-last").removeClass("disabled");
                                        // $("#page-prev").addClass("disabled");
                                        // $("#page-first").addClass("disabled");
                                        // if (total_pages == 1) {
                                        //     $("#page-next").addClass("disabled");
                                        //     $("#page-last").addClass("disabled");
                                        // }
                                                                                
                                    }
                                </script>
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
                            <span><?php echo $total_rows; ?> Leads found</span>
                            <div class="container">                                                              
                                <?php   
                                while($row = mysqli_fetch_array($rows)) {
                                    echo "<div class='single-job-items mb-30'>";
                                    echo "<div class='job-items'>";
                                    echo "<div class='job-tittle job-tittle2'>";
                                    echo $row['name'];
                                    echo "<ul>";
                                    echo "<li>Plan Type</li>";
                                    echo "<li>$3500 - $4000</li>";
                                    echo "</ul>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<div class='items-link items-link2 f-right'>";
                                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                        echo "<a href='job_details.phpid=".$row['id']."'>Propose Plan</a>";
                                    } else {
                                        echo "<a href='login.php' class='disabled'>Login to Propose</a>";
                                    }
                                    echo "<span>15 May 2020</span>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                mysqli_close($link);                                
                                ?>                               
                                
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
                                    <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>" id="page-first" onclick = "change_page(-2)">First</a></li>
                                    <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>" id="page-prev" onclick = "change_page(-1)">Prev</a></li>
                                    <li class="page-item disabled" id="page-current"><?php echo $pageno; ?></li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>" id="page-next" onclick = "change_page(1)">Next</li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>" id="page-last" onclick = "change_page(2)">Last</a></li>                                    
                                </ul>
                                <script type="text/javascript">
                                    function change_page(change) {
                                        var current_page = parseInt($("#page-current").text());
                                        var total_rows = parseInt($(".featured-job-area span").text());
                                        var no_of_records_per_page = parseInt("<?php echo $no_of_records_per_page ?>");
                                        var total_pages = Math.ceil(total_rows / no_of_records_per_page);
                                        var new_page;                                                                              
                                        if (change == -1 || change == 1) {
                                            new_page = current_page + change;        
                                        } else if (change == -2) {
                                            new_page = 1;
                                        } else if (change == 2) {
                                            new_page = total_pages;
                                        }
                                        if (new_page > total_pages) {
                                            alert("Last Page Already!");
                                            $("#page-next").addClass("disabled");
                                            $("#page-last").addClass("disabled");
                                            return;
                                        } 
                                        $.ajax(
                                        {
                                            url: 'filter.php',
                                            type: 'POST',
                                            data: {
                                                new_page : new_page,
                                            },
                                            success:function(data) {
                                                $(".featured-job-area").html(data);                                      
                                            },
                                        });
                                        $("#page-current").html(new_page);
                                        $("#page-prev").removeClass("disabled");
                                        $("#page-first").removeClass("disabled");
                                        $("#page-next").removeClass("disabled");
                                        $("#page-last").removeClass("disabled");
                                        if (new_page == 1) {
                                            $("#page-prev").addClass("disabled");
                                            $("#page-first").addClass("disabled");
                                        }
                                        if (new_page >= total_pages) {
                                            $("#page-next").addClass("disabled");
                                            $("#page-last").addClass("disabled");
                                        }
                                    }
                                </script>
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