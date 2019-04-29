<!DOCTYPE html>
<html>

<head>
    <title>Post Detail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/mmenu/mmenu/jquery.mmenu.all.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-mobie.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">

</head>

<body>
    <header class="hidden-sm  hidden-xs" id="header-desktop">
        <div class="header-desktop">
            <div class="container">
                <div class="row header-top">
                    <div class="col-lg-2 col-md-2 col-xs-12 section1">
                        <a href="index.html">
                            <img src="assets/images/Logo.png">
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
        <div>
            <nav class="navbar navbar-findcond navbar">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="dropdown">
                                <a href="/" role="button" aria-expanded="false"> Home</a>
                            </li>
                            <li class="dropdown">
                                <a href="lienhe.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> News - Event</a>
                            </li>
                            <li class="dropdown">
                                <a href="lienhe.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Contact</a>
                            </li>
                            <li class="dropdown">
                                <a href="gioithieu.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> About us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <header class="hidden-lg  hidden-md" id="header-mobie">
        <div id="header-top">
            <div class="col-xs-12 col-sm-12 header-top2 text-center">
                <a href="index.html">
                    <img src="assets/images/Logo.png">
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
                            <a href="/cms" class="dropdown-toggle" role="button" aria-expanded="false"> 
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
                                  <a href="/logout" class="dropdown-toggle" role="button" aria-expanded="false"> 
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
    <content>
        <div class="postdetail">
            <input type="hidden" id="userid" value="<?php echo $author['id']?>"/>
            <input type="hidden" id="mgz-id" value="<?php echo $_GET['mgzId']?>" />
            <div class="section-1">
                <div class="container">
                    <h2>Chi tiết bài viết</h2>
                </div>
            </div>
            <div class="section-2">
                <div class="linkPost">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul>
                                    <li>Home</li>
                                    <li>Post Detail</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contentPost">
                <div class="container">
                    <div class="row">
                    <?php
                        include_once './controllers/cmtController.php';
                        $cmtCtrl = new cmtCtrl();
                        $result = @$cmtCtrl->getListPublicCmt($_GET['mgzId']);
                        if ($result->title!= '') {
                            ?>
                       <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="timePost">
                                <p>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <time><?php echo $result->created_at?></time>
                                </p>
                            </div>
                            <div class="titlePost">
                                <h3><?php echo $result->title ?></h3>
                            </div>
                            <div class="mainContent">
                                <img src="<?php echo $result->img ?>">
                                <?php
                                                $ch = curl_init();                                    
                                                curl_setopt($ch, CURLOPT_URL, "https://api.docconversionapi.com/convert?outputFormat=html");
                                                curl_setopt($ch, CURLOPT_POST, 2);
                                                curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-ApplicationID:286f4243-5ed4-450d-bce9-435f568d450b', 'X-SecretKey:120748dd-ac15-44fd-88c8-ca46149b4b8d'));
                                    
                                                
                                                $post = array(
                                                  "optionsJson" => "{}",
                                                  "inputFile" => "https://yearlymgz.herokuapp.com/" . $result->doc
                                                );
                                    
                                                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                $server_output = curl_exec($ch); 	
                                                if ($server_output === false) {
                                                  echo 'Curl error occurred: ' . curl_error($ch);
                                                } else {
                                                  echo $server_output;
                                                }
                                ?>
                            </div>
                            <div class="title">
                                <h4>Đánh giá & Nhận xét</h4>
                            </div>                            
                            <div class="commentEveryone">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="cmtGroup">
                            <?php 
                                if(count($result->cmtList) > 0) {
                                    foreach($result->cmtList as $item) {
                                        ?>
                                    <div class="oneComment">
                                        <div class="img">
                                            <img src="<?php echo $item->avatar?>">
                                        </div>
                                        <div class="content">
                                            <p>
                                                <?php echo $item->content?>
                                            </p>
                                            <p class="text-right">
                                                <span><?php echo $item->username ?><time><?php echo $item->cmtDate ?></time>
                                                </span>
                                            </p>
                                        </div>
                                    </div>

                                        <?php
                                    }
                                }
                            ?>


                                </div>
                            </div>
                            <?php
                        }
                    ?>
 
                            <div class="title">
                                <h4>Your Comment</h4>
                            </div>
                            <div class="commentPost">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="inputComent col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <textarea placeholder="Add comment..." class="form-control" rows="5" id="Notes"></textarea>
                                            </div>
                                        </div>
                                        <div class="btnComent col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="button" name="" value="Add Comment" onclick="submitCmt()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 hidden-xs hidden-sm news-siderbar">
                            <div>
                                <div class="news-ti">
                                    <span>New Post</span>
                                </div>
                                <div class="new-news">
                                    <a href="#">
                                        <div style="padding: 0 5px">
                                            <div class="section-1">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9sJD2bGSi3fOgbB78tNsLTfSeabvMXwT4_02B3yRSCrP0hFt5">
                                            </div>
                                            <div class="section-2">
                                                <div class="child-1">
                                                    <a href="">
                                                       IT magazine 2
                                                    </a>
                                                </div>
                                                <div>
                                                    <time>
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        12/12/2018
                                                    </time>
                                                    <a href="">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                        VuvanTien
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="new-news">
                                    <a href="#">
                                        <div style="padding: 0 5px">
                                            <div class="section-1">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9sJD2bGSi3fOgbB78tNsLTfSeabvMXwT4_02B3yRSCrP0hFt5">
                                            </div>
                                            <div class="section-2">
                                                <div class="child-1">
                                                    <a href="">
                                                        IT magazine 2
                                                    </a>
                                                </div>
                                                <div>
                                                    <time>
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        12/12/2018
                                                    </time>
                                                    <a href="">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                        VuvanTien
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="new-news">
                                    <a href="#">
                                        <div style="padding: 0 5px">
                                            <div class="section-1">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9sJD2bGSi3fOgbB78tNsLTfSeabvMXwT4_02B3yRSCrP0hFt5">
                                            </div>
                                            <div class="section-2">
                                                <div class="child-1">
                                                    <a href="">
                                                        IT magazine 2
                                                    </a>
                                                </div>
                                                <div>
                                                    <time>
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        12/12/2018
                                                    </time>
                                                    <a href="">
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                        VuvanTien
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
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
                    
                </div>
            </div>
        </div>
        <div id="footer-2">
            <div class="container">
                <div class=" content-footer2">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p>
                            Ha Noi 
                            <br>
                            Detech, Ton That Thuyet, My Dinh, Ha Noi <br>
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                        <ul>
                            <li><a href=""><i id="icon-fb" class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i id="icon-tw" class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i id="icon-yt" class="fa fa-youtube"></i></a></li>
                            <li><a href=""><i id="icon-gg" class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i id="icon-ins" class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer-3">
            <h4>Design by: Team</h4>
        </div>
    </footer>
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/slick.js"></script>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script type="text/javascript" src="assets/js/index.js"></script>
    <script type="text/javascript" src="assets/mmenu/mmenu/jquery.mmenu.all.js"></script>
    <script type="text/javascript">
        function submitCmt() {
            var c = $.trim($("#Notes").val()).length;
            console.log(c);
            if (c<10) {
                alert("Your comment too short!!");
            }
            else if (c>200) {
                alert("Your comment too long!!");
            }
            else {
                var content = $.trim($("#Notes").val());
                var userId = $("#userid").val();
                var mgzId = $("#mgz-id").val();
                $.ajax({
                    url: `/postPublicCmt`,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        content:content,
                        userId:userId,
                        mgzId:mgzId
                    },
                    success: function(result) {
                        if(result.error) {
                            alert(result.error)
                        }
                        else {  
                            htmlCmt = `<div class="oneComment">
                                        <div class="img">
                                            <img src="<?php echo $author['ava']?>">
                                        </div>
                                        <div class="content">
                                            <p>
                                                ${content}
                                            </p>
                                            <p class="text-right">
                                                <span><?php echo $author['name'] ?><time> ${new Date().toLocaleString()}</time>
                                                </span>
                                            </p>
                                        </div>
                                    </div>`;
                            $("#cmtGroup").append(htmlCmt);
                            $("#cmtGroup").animate({ scrollTop: $('#cmtGroup').prop("scrollHeight")}, 1000);
                            $("#Notes").val("");                  
                        }
                    }
                })               
            }           
        }
    </script>  

</body>

</html> 
