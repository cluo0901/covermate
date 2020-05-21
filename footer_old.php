<?php

require_once "config.php";

if(isset($_POST['submit']) && isset($_POST['email'])) {

    if ($_POST['email'] != "") {  
       $email = filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL); 
            
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
            $msg = "The mail you entered is not a valid email address.";

        } 
        else {               
            $sql1 = "SELECT * FROM newsletter WHERE email = '". $email."'";
            $result_sql1 = mysqli_query($link, $sql1);
            $sql = "INSERT INTO newsletter (email) VALUES ('" . $email . "')";
            if (mysqli_num_rows($result_sql1) > 0) {
                $msg = "Your email is alredy registered.";
            } else {  
                if (mysqli_query($link, $sql)) {
                    $msg = "Your email has been successfully registered!";
                }else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($link);
                }
            }
        } 
    } else {  
        $msg = 'Please enter your email address.'; 
    }
    echo '<script language="javascript">';
    echo 'alert("'.$msg.'")';
    echo '</script>';
    mysqli_close($link);
    // header("location: index.php");
}

?>

<style type="text/css">
    .footer-area {
        padding-top: 100px;
        padding-bottom: 0;
    }

    .footer-wejed {
        padding-top: 20px;
    }

    .footer-area .footer-tittle-bottom span {
        font-size: 40px;
    }

    .footer-area .footer-tittle-bottom p {
        font-size: 20px;
    }

    .footer-area .footer-pera p {
        margin-bottom: 0;
    }

    .footer-request a {
        display: block;
        width: 80%;    
        height: 40px;
        /*background: #fb246a;*/
        text-align: center;
        color: #ffffff !important;
        padding: 5px 15px;
        border: 2px solid #fb246a;
        border-radius: 4px;
    }
    
</style>

<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-bg footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                   <div class="single-footer-caption mb-50">
                    <div class="single-footer-caption mb-30">
                        <div class="footer-tittle">
                            <h4>Request Proposal</h4>
                            <ul class="footer-request">
                                <li>
                                    <a class="typeform-share button" href="https://lcluochao.typeform.com/to/kHOxEY" data-mode="popup" target="_blank">Protection Plan </a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script>
                                </li>
                                <li>
                                    <a class="typeform-share button" href="https://lcluochao.typeform.com/to/gVUoKr" data-mode="popup" target="_blank">Investments Plan </a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script>
                                </li>
                                <li>
                                    <a class="typeform-share button" href="https://lcluochao.typeform.com/to/rEYLpr" data-mode="popup" target="_blank">Savings Plan </a> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm_share", b="https://embed.typeform.com/"; if(!gi.call(d,id)){ js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script>
                                </li>
                            </ul>
                         </div>
                    </div>

                   </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Important Link</h4>
                            <ul>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="job_listing.php">View Leads</a></li>
                                <li><a href="privacy_policy.php">Privacy Policy</a></li>
                                <li><a href="contact.php">Contact Us</a></li>                 
                                
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Contact Info</h4>
                            <h3 style="color: #999; font-size: 20px;">Email Us</h3>
                            <p style="color: #868c98; font-weight: 300;">hello@covermate.com</p>
                            <!-- <ul>
                                <li>
                                <p>Address :Your address goes
                                    here, your demo address.</p>
                                </li>
                                <li><a href="#">Phone : +8880 44338899</a></li>
                                <li><a href="#">Email : hello@Covermate.com</a></li>
                            </ul> -->
                        </div>

                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Newsletter For Agents</h4>
                            <div class="footer-pera footer-pera2">
                             <p>Subscribe to be the 1st to get notified on new leads.</p>
                            </div>
                            <!-- Form -->
                            <!-- <form action='newsletter.php' method='post'>
                                <div class="stuff">Email <input type="text" name='email'> 
                                <button type="submit" name='submit' >Submit</button> <br></div>
                                
                            </form> -->

                            <div class="footer-form" >
                                 <!-- <div id="mc_embed_signup"> -->
                                     <form action="<?php print $_SERVER['PHP_SELF']?>" method="post" class="subscribe_form relative mail_part">
                                         <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address" class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '" />
                                         <div class="form-icon">
                                             <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm"><img src="assets/img/icon/form.png" alt=""></button>
                                         </div>
                                         <!-- <div class="mt-10 info"></div> -->
                                     </form>
                                 <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!--  -->
           <div class="row footer-wejed justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <!-- logo -->
                    <div class="footer-logo mb-20">
                    <a href="index.php"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                <div class="footer-tittle-bottom">
                    <span>5000+</span>
                    <p>Proposals</p>
                </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <div class="footer-tittle-bottom">
                        <span>1000+</span>
                        <p>Requests</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                    <!-- Footer Bottom Tittle -->
                    <div class="footer-tittle-bottom">
                        <span>100+</span>
                        <p>Insurance Gurus</p>
                    </div>
                </div>
           </div>
        </div>
    </div>
    <!-- footer-bottom area -->
    <div class="footer-bottom-area footer-bg">
        <div class="container">
            <div class="footer-border">
                 <div class="row d-flex justify-content-between align-items-center">
                     <div class="col-xl-10 col-lg-10 ">
                         <div class="footer-copy-right">
                             <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
                         </div>
                     </div>
                     <div class="col-xl-2 col-lg-2">
                         <div class="footer-social f-right">
                             <a href="#"><i class="fab fa-facebook-f"></i></a>
                             <a href="#"><i class="fab fa-twitter"></i></a>
                             <a href="#"><i class="fas fa-globe"></i></a>
                             <a href="#"><i class="fab fa-behance"></i></a>
                         </div>
                     </div>
                 </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>