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
    <?php
		session_start();
		?>
</head>

<body>
    <header class="hidden-xs hidden-sm">
        <div class="header-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-xs-12 chil1-header-two">
                        <a href="index.html">
                            <img src="assets/images/logo.png">
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-4  col-xs-12 chil2-header-two">
                        <p>
                            <span>Inspire Your Teaching and Learning</span>
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 chil3-header-two">
                        <span>
                            Hotline:
                            <a href="tel:0968 098 781">0968 098 781</a>
                        </span>
                        <a href="">
                            <img src="assets/images/educap1.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div>
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
                                <a href="lienhe.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Trang chủ</a>
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
                            <li class="dropdown">
                                <a onclick="document.getElementById('id01').style.display='block'" href="gioithieu.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div id="id01" class="modal">

            <form class="modal-content animate" action="/action_page.php">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="img_avatar2.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>
    </header>
    <header class="hidden-lg  hidden-md" id="header-mobie">
        <div id="header-top">
            <div class="col-xs-2 header-top1">
                <a href="#menu">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>
            </div>
            <div class="col-xs-8 header-top2">
                <img src="images/Logo.png">
            </div>
            <div class="col-xs-2 header-top3">
                <a href="">
                    <img src="images/sprite-icon_05.png"><br>
                    <span id="count-cart">1</span>
                </a>
            </div>
        </div>
        <div class="col-xs-12 chil2-header-two">
            <p>
                <span>Inspire Your Teaching and Learning</span>
            </p>
        </div>
        <div>
            <nav id="menu">
                <ul>
                    <li><a href="index.html">Trang chủ</a></li>
                    <li><a href="">Mỹ phẩm</a>
                        <ul>
                            <li><a href="">Mỹ phẩm nam</a></li>
                            <li><a href="">Mỹ phẩm nữ</a></li>
                            <li><a href="">Phụ kiện trang điểm</a></li>
                        </ul>
                    </li>
                    <li><a href="">Thời trang</a>
                        <ul>
                            <li><a href="">Thời trang nam</a>
                                <ul>
                                    <li><a href="">Mỹ phẩm nam</a></li>
                                    <li><a href="">Mỹ phẩm nữ</a></li>
                                    <li><a href="">Phụ kiện trang điểm</a></li>
                                </ul>
                            </li>
                            <li><a href="">Thời trang nữ</a></li>
                        </ul>
                    </li>
                    <li><a href="tintuc.html">Tin tức</a>
                    <li><a href="">Shop xinh</a>
                        <ul>
                            <li><a href="lienhe.html">Liên hệ</a></li>
                            <li><a href="gioithieu.html">Giới thiệu</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <content>
        <div class="container">

        </div>

    </content>
    <footer>

    </footer>
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/slick.js"></script>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script type="text/javascript" src="assets/js/index.js"></script>
    <script type="text/javascript" src="assets/mmenu/mmenu/jquery.mmenu.all.js"></script>
</body>

</html> 