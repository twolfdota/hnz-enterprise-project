<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/mmenu/mmenu/jquery.mmenu.all.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-mobie.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <header class="hidden-sm  hidden-xs" id="header-desktop">
        <div class="header-desktop">
            <div class="container">
                <div class="row header-top">
                    <div class="col-lg-2 col-md-2 col-xs-12 section1">
                        <a href="index.html">
                            <img src="assets/images/logo.png">
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-5 col-xs-12 section2">
                        <p>
                            <span>Inspire Your Teaching and Learning</span>
                        </p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 section3 text-right">
                        <span>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            Hotline:
                            <a href="tel:0968 098 781">0968 098 781</a>
                        </span>
                        <a href="">
                            <img  src="assets/images/educap1.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
            <nav class="navbar navbar-findcond navbar">
                <div class="container">
                    <!-- <div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Trang chủ</a>
					</div> -->
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="dropdown">
                                <a href="student.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Trang chủ</a>
                            </li>
                            <li class="dropdown">
                                <a href="lienhe.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Tin tức - Sự kiện</a>
                            </li>
                            <li class="dropdown">
                                <a href="lienhe.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Liên hệ</a>
                            </li>
                            <li class="dropdown">
                                <a href="gioithieu.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Giới thiệu</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <img class="avatar" src="<?php echo $author['ava']?>">
                            </li>
                            <li>
                                <p> <?php echo $author['name']?><i> _ </i><span> <?php echo $author['faculty']?> Department</span></p>
                            </li>
                            <li class="logoutHome">
                                <a href="/hnz-enterprise-project/logout" class="dropdown-toggle text-right" role="button" aria-expanded="false"> 
                                    <i class="fa fa-sign-out" aria-hidden="true" title="logout"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="/hnz-enterprise-project/cms" class="dropdown-toggle text-right" role="button" aria-expanded="false"> 
                                    <i class="fa fa-gg" aria-hidden="true" title="Go to Manazine page"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    </header>
    <header class="hidden-lg  hidden-md" id="header-mobie">
        <div id="header-top">
            <div class="col-xs-12 col-sm-12 header-top2 text-center">
                <a href="index.html">
                    <img src="assets/images/logo.png">
                </a>
            </div>

            <div>
                <div class="col-xs-2 background-mobie col-sm-6 header-top1">
                    <a href="#menu">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="hidden-lg hidden-md">
                    <nav id="menu">
                     <ul>
                        <li><a href="/">Home</a></li>
                        <li>
                            <a href="/hnz-enterprise-project/cms" class="dropdown-toggle" role="button" aria-expanded="false"> 
                                Go To Manager Page
                            </a>
                        </li>
                        <li>
                            <ul>
                                <li>
                                     <p> <?php echo $author['name']?><i> _ </i><span> <?php echo $author['faculty']?> Department</span></p>
                                </li>
                            </ul>
                        </li>
                        <li><a href="/Acount">User</a>
                           <ul>
                              <li>
                                <a href="/Acount/name">
                                  <p> <?php echo $author['name']?><i> _ </i><span> <?php echo $author['faculty']?> Department</span></p>
                                </a>
                              </li>
                              <li>
                                  <a href="/hnz-enterprise-project/logout" class="dropdown-toggle" role="button" aria-expanded="false"> 
                                    Log Out
                                </a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </nav>
                </div>
                <div class="col-xs-10 col-sm-6 background-mobie header-top3">
                   <div class="phone">
                       <span>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        Hotline:
                        <a href="tel:0968 098 781">0968 098 781</a>
                    </span>
                   </div>
                    <a href="">
                        <img  src="assets/images/educap1.png">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 chil2-header-two text-center">
            <p class="text-center">
                <span>Inspire Your Teaching and Learning</span>
            </p>
        </div>
    </header>

    <div class="slider">
        <div class="slider-header">
            <a href=""><img src="assets/images/student-education_1526999740.jpg"></a>
            <a href=""><img src="assets/images/student-education_1526999740.jpg"></a>
            <a href=""><img src="assets/images/student-education_1526999740.jpg"></a>
        </div>
    </div>
    <div class="img-bottom hidden-sm hidden-xs">
        <img src="assets/images/scale-top.png">
    </div>
    <content>
        <div class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="Timeremaining">
                            <h2>Time Remaining</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="timeHome">
            <div class="container">
                <div class="margin-top">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <div class="Timeremaining">
                                <label id="days"></label><br>
                                <span>Days</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <div class="Timeremaining">
                                <label id="hours"></label><br>
                                <span>Hours</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <div class="Timeremaining">
                                <label id="minutes"></label><br>
                                <span>Minutes</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <div class="Timeremaining">
                                <label id="seconds"></label><br>
                                <span>Seconds</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="down">
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title-news text-center">
                    <h2>TIN NỔI BẬT</h2>
                    <h4>Ant Ngoại Ngữ - Tin tức về các chủ đề học tiếng Anh, sự nghiệp, lối sống, truyền cảm hứng,...</h4>
                </div>
            </div>
        </div>
        <div class="content-news">
            <div class="container">
                <div class="row" id="content-background">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 news">
                        <a href="/hnz-enterprise-project/postdetail">
                            <div class="section-1">
                                <figure>
                                    <img src="assets/images/posts.jpg">
                                </figure>
                            </div>
                            <div class="section-2">
                                <a href="">
                                    Bí quyết phối đồ với màu đỏ rượu hot nhất mùa xuân 2015
                                </a>
                            </div>
                            <div class="section-3">
                                <time>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    12/12/2018
                                </time>
                                <a href="">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    VuvanTien
                                </a>
                            </div>
                            <div class="section-4">
                                <a href="">
                                    Đọc thêm
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div> 
                        </a>   
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 news">
                        <a href="#">
                            <div class="section-1">
                                <figure>
                                    <img src="assets/images/posts.jpg">
                                </figure>
                            </div>
                            <div class="section-2">
                                <a href="">
                                    Bí quyết phối đồ với màu đỏ rượu hot nhất mùa xuân 2015
                                </a>
                            </div>
                            <div class="section-3">
                                <time>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    12/12/2018
                                </time>
                                <a href="">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    VuvanTien
                                </a>
                            </div>
                            <div class="section-4">
                                <a href="">
                                    Đọc thêm
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div> 
                        </a>   
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 news">
                        <a href="#">
                            <div class="section-1">
                                <figure>
                                    <img src="assets/images/posts.jpg">
                                </figure>
                            </div>
                            <div class="section-2">
                                <a href="">
                                    Bí quyết phối đồ với màu đỏ rượu hot nhất mùa xuân 2015
                                </a>
                            </div>
                            <div class="section-3">
                                <time>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    12/12/2018
                                </time>
                                <a href="">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    VuvanTien
                                </a>
                            </div>
                            <div class="section-4">
                                <a href="">
                                    Đọc thêm
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div> 
                        </a>   
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 news">
                        <a href="#">
                            <div class="section-1">
                                <figure>
                                    <img src="assets/images/posts.jpg">
                                </figure>
                            </div>
                            <div class="section-2">
                                <a href="">
                                    Bí quyết phối đồ với màu đỏ rượu hot nhất mùa xuân 2015
                                </a>
                            </div>
                            <div class="section-3">
                                <time>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    12/12/2018
                                </time>
                                <a href="">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    VuvanTien
                                </a>
                            </div>
                            <div class="section-4">
                                <a href="">
                                    Đọc thêm
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div> 
                        </a>   
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 news">
                        <a href="#">
                            <div class="section-1">
                                <figure>
                                    <img src="assets/images/posts.jpg">
                                </figure>
                            </div>
                            <div class="section-2">
                                <a href="">
                                    Bí quyết phối đồ với màu đỏ rượu hot nhất mùa xuân 2015
                                </a>
                            </div>
                            <div class="section-3">
                                <time>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    12/12/2018
                                </time>
                                <a href="">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    VuvanTien
                                </a>
                            </div>
                            <div class="section-4">
                                <a href="">
                                    Đọc thêm
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div> 
                        </a>   
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 news">
                        <a href="#">
                            <div class="section-1">
                                <figure>
                                    <img src="assets/images/posts.jpg">
                                </figure>
                            </div>
                            <div class="section-2">
                                <a href="">
                                    Bí quyết phối đồ với màu đỏ rượu hot nhất mùa xuân 2015
                                </a>
                            </div>
                            <div class="section-3">
                                <time>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    12/12/2018
                                </time>
                                <a href="">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    VuvanTien
                                </a>
                            </div>
                            <div class="section-4">
                                <a href="">
                                    Đọc thêm
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>
                            </div> 
                        </a>   
                    </div>
                </div>
            </div>
        </div>
        <div class="members">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title-news text-center">
                        <h2>Thành viên Team</h2>
                        <h4>Ant Ngoại Ngữ - Tin tức về các chủ đề học tiếng Anh, sự nghiệp, lối sống, truyền cảm hứng,...</h4>
                    </div>
                </div>
            </div>
        </div>

    </content>
    <footer>
        <div class="top-footer">
            
        </div>
        <div class="myfooter">
            <div class="container">
                <div class="text-center">
                    <h4>Team</h4>
                </div>
            </div>
        </div>
    </footer>
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>


    <script type="text/javascript" src="assets/js/slick.js"></script>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script type="text/javascript" src="assets/js/index.js"></script>
    <script type="text/javascript" src="assets/mmenu/mmenu/jquery.mmenu.all.js"></script>
    


</body>

</html> 


