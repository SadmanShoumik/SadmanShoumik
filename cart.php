<?php
    session_start();
    $user=$_SESSION['uname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My cart</title>
    <link rel="icon" type="image/x-icon" href="icons/icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/cart.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
</head>
<body style="background-color: gray;">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark mt-0">
  <div class="container-fluid">
    <ul class="navbar-nav">
    <a class="navbar-brand" href="home.php">
      <img src="icons/game.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
    </a>
    <li class="nav-item text-white ml-5">
        <h3 id="header">Gaming World</h3>
    </li>
</nav>
    
    <div>
        <a href="home.php" class="btn btn-secondary">Continue shopping <img src="icons/back.png" alt="" class="rounded pill" width="30px">  </a>
        <a href="payment.php" class="btn btn-secondary float-right">Proceed to pay <img src="icons/pay.png" alt="" class="rounded pill" width="30px">  </a>
    </div>


    <div class="sign" style="font-size: 50px; text-align: center;">
      <span class="fast-flicker">Wel</span><span class="flicker">co</span><span class="fast-flicker">me</span><span class="flicker">, </span><span class="fast-flicker"><?php echo $user?></span>
    </div>

<?php
    $q="select * from customer where name='$user'";
    $con=mysqli_connect("localhost","root","","grp-5");
    $res=mysqli_query($con,$q);
    $id=0;
    $item=array();
    $item_name=array();
    $item_price=array();
    $item_img=array();
    $item_brand=array();
    $total=0;
    $cnt=0;
    while($row=mysqli_fetch_row($res)){
        $addr=$row[4];
        $phn=$row[6];
        $email=$row[3];
        $P=$row[2];
        $id=$row[0];
    }
    $q="select * from cart where user=$id;";
    $res=mysqli_query($con,$q);
    while($row=mysqli_fetch_row($res)){
        array_push($item,$row[1]);
        $cnt=$cnt+1;
    }
    foreach($item as $i){
        $q="select * from product where p_id=$i;";
        $res=mysqli_query($con,$q);
        $k=0;
        while($row=mysqli_fetch_row($res)){
            array_push($item_name,$row[1]);
            array_push($item_price,$row[4]);
            array_push($item_brand,$row[2]);
            array_push($item_img,$row[5]);
            $total=$total+$item_price[$k];
            $k=$k+1;

        }

    }?>
    <table class="table table-dark m-0">
        <tr>
            <th class="border border-right">Item</th>
            <th class="border border-right">Image</th>
            <th class="border border-right">Brand</th>
            <th class="border border-right">Price</th>
            
        </tr>
        <?php
            for($i=0;$i<$cnt;$i++){
                ?>
                <tr>
                    <td class="border border-right"> <?php echo $item_name[$i];?>    </td>
                    <td class="border border-right"> <img src="img/<?php echo $item_img[$i];?>" width="300px" height="300px">    </td>
                    <td class="border border-right"><?php echo $item_brand[$i];?></td>
                    <td class="border border-right"><?php echo $item_price[$i];?></td>
                </tr>
                <?php
            }    ?>
        
       
    </table>
    <div class="m-3">
    <p style="font-weight: bolder;font-size: 40px; text-align: center;" class="text-white">TOTAL : <?php echo $total?> BDT  </p>
    </div>




<footer id="dk-footer" class="dk-footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="dk-footer-box-info">
                        <a href="index.html" class="footer-logo">
                            <img src="icons/pur.png" alt="footer_logo" class="img-fluid">
                        </a>
                        <p class="footer-info-text text-white">
                           Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.
                        </p>
                        <div class="footer-social-link">
                            <h3>Follow us</h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                       
                    </div>
                   
                    <div class="footer-awarad">
                        <img src="images/icon/best.png" alt="">
                        <p>Best Design Company 2019</p>
                    </div>
                </div>
                
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-us">
                                <div class="contact-icon">
                                    <i class="fa fa-map-o" aria-hidden="true"></i>
                                </div>
                                <!-- End contact Icon -->
                                <div class="contact-info">
                                    <h3>Gaming World</h3>
                                    <p>5353 Road Avenue</p>
                                </div>
                                <!-- End Contact Info -->
                            </div>
                            <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                        <div class="col-md-6">
                            <div class="contact-us contact-us-last">
                                <div class="contact-icon">
                                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                </div>
                                <!-- End contact Icon -->
                                <div class="contact-info">
                                    <h3>01636421651</h3>
                                    <p>Give us a call</p>
                                </div>
                                <!-- End Contact Info -->
                            </div>
                            <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Contact Row -->
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget footer-left-widget">
                                <div class="section-heading">
                                    <h3>Useful Links</h3>
                                    <span class="animate-border border-black"></span>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#">About us</a>
                                    </li>
                                    <li>
                                        <a href="#">Services</a>
                                    </li>
                                    <li>
                                        <a href="#">Projects</a>
                                    </li>
                                    <li>
                                        <a href="#">Our Team</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a href="#">Contact us</a>
                                    </li>
                                    <li>
                                        <a href="#">Blog</a>
                                    </li>
                                    <li>
                                        <a href="#">Testimonials</a>
                                    </li>
                                    <li>
                                        <a href="#">Faq</a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                       
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget">
                                <div class="section-heading">
                                    <h3> All Right Reserved by Al Hel Shoumik</h3>
                                    <span class="animate-border border-black"></span>
                                </div>
                                <p>
                                Reference site about Lorem Ipsum, giving information on its origins, as well.</p>
                               
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        


        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span>Copyright © 2022, All Right Reserved Al Hel Shoumik</span>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6">
                        <div class="copyright-menu">
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#">Terms</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Copyright Container -->
        </div>
        <!-- End Copyright -->
        <!-- Back to top -->
        <div id="back-to-top" class="back-to-top">
            <button class="btn btn-dark" title="Back to Top" style="display: block;">
                <i class="fa fa-angle-up"></i>
            </button>
        </div>
        <!-- End Back to top -->
</footer>  

    
</body>