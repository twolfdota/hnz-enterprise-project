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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>

    <?php
        include_once './controllers/yearController.php';
        date_default_timezone_set("Asia/Bangkok");
        $thisYear = date("Y");
        $yearCtrl = new yearCtrl();
        $yearRes = $yearCtrl->loadThisYear();

        if (count($yearRes) > 0 && $yearRes[0]->year == $thisYear ) {
            echo "<input type='hidden' id='deadline' value='". $yearRes[0]->dl1."'/>";
        }

    ?>
    <!-- Modal để hiển thị thông tin user sau khi add-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">  
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">User information</h4>
                </div>
                <div class="modal-body" id="mymodal-body">
                    <center><img  src="assets/images/anonymous.png" width="50%" height="50%" /></center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload()">OK</button>
                </div>
            </div>

        </div>
    </div>
    <!-- nội dung chính của page -->
    <div class="registerForm container-full" id="myvideo">
        <div class="hidden-lg hidden-md">
            <nav id="menu">
                <ul>
                    <li>
                        <a data-toggle="pill" href="#home">
                            Reports
                        </a>
                    </li>
                    <li>
                        <a data-toggle="pill" href="#register">
                            Registration
                        </a>
                    </li>
                    <li>
                        <a data-toggle="pill" href="#academic">
                            </i> Academic Year's Event Information
                        </a>
                    </li>
                    <li>
                        <a data-toggle="pill" href="#downloadFile">
                            </i> Download File
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="mainMenu hidden-xs hidden-sm">
            <div class="logoTeam">
                <a data-toggle="pill" href="#home">
                    <img  src="assets/images/Logo.png">
                </a>
                <a href="#">Heroes & Zeroes</a>
            </div>
            <div class="Navigation">
                <h4>Navigation</h4>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a data-toggle="pill" href="#home">
                            <i class="fa fa-bars" aria-hidden="true"></i> Reports
                        </a>
                    </li>
                    <li>
                        <a data-toggle="pill" href="#register">
                            <i class="fa fa-bars" aria-hidden="true"></i> Registration
                        </a>
                    </li>
                    <li>
                        <a data-toggle="pill" href="#academic">
                            <i class="fa fa-bars" aria-hidden="true"></i> Academic Year's Event Information
                        </a>
                    </li>
                    <li>
                        <a data-toggle="pill" href="#downloadFile">
                            <i class="fa fa-bars" aria-hidden="true"></i> Download File
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mainForm">
            <div class="menubar">
                <div class="menubarRight text-right hidden-md hidden-lg">
                    <ul>
                        <li class="icon-nvar">
                            <a href="#menu">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="bellMobile">
                            <a href="#" id="btnBellMobile">
                                <div class="">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                </div>
                                <span>1</span>
                            </a>
                        </li>
                        <div id="ShowBell" class="dropdown-contentMobile">
                            <div class="session1Notification text-left">
                                <span>Thông báo</span>
                            </div>
                            <div class="today">
                                <span>TODAY</span>
                            </div>
                            <div class="allNotification">
                                <div class="contentNotification">
                                    <div class="img">
                                        <img src="assets/images/images.jpg">
                                    </div>
                                    <div class="textContent">
                                        <p>VuvanTien <span>đã bình luận về bài viết của bạn</span>
                                        </p> 
                                        <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> 11:20 23/9/2019</span>
                                    </div>
                                    <div class="icon text-right">
                                        <i class="signalCMT fa fa-commenting-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="contentNotification">
                                    <div class="img">
                                        <img src="assets/images/images.jpg">
                                    </div>
                                    <div class="textContent">
                                        <p>Admin <span>đã phê duyệt bài viết của bạn</span>
                                        </p> 
                                        <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> 11:20 23/9/2019</span>
                                    </div>
                                    <div class="icon text-right">
                                        <i class="signalDone fa fa-check-square-o" aria-hidden="true"></i>
                                    </div>
                                    
                                </div>
                                <div class="contentNotification">
                                    <div class="img">
                                        <img src="assets/images/images.jpg">
                                    </div>
                                    <div class="textContent">
                                        <p>VuvanTien <span>đã bình luận về bài viết của bạn</span>
                                        </p> 
                                        <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> 11:20 23/9/2019</span>
                                    </div>
                                    <div class="icon text-right">
                                        <i class=" signalCMT fa fa-commenting-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="contentNotification">
                                    <div class="img">
                                        <img src="assets/images/images.jpg">
                                    </div>
                                    <div class="textContent">
                                        <p>Admin <span>đã không phê duyệt bài viết của bạn</span>
                                        </p> 
                                        <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> 11:20 23/9/2019</span>
                                    </div>
                                    <div class="icon text-right">
                                        <i class="signalCancel fa fa-ban" aria-hidden="true"></i>
                                    </div>
                                </div>

                            </div>
                      </div>
                        <li class="active">
                            <img src="<?php echo $author['ava'];?>">
                        </li>
                        <li>
                            <div class="dropdown">
                                <a id="menu1" data-toggle="dropdown" class=" dropdown-toggle"  href=""><?php echo $author['name'] ?> <i class="fa fa-caret-down" aria-hidden="true"></a></i>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/" class=" goto" title="Go to Home page">
                                                <i class="fa fa-gg" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                          <a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                                        </li>
                                  </ul>
                              </div>
                        </li>
                    </ul>
                </div>
                <div class="menubarRight hidden-xs hidden-sm">
                    <!-- <a href="" class="dropdown-toggle" data-toggle="dropdown">Admin</a> -->
                    <ul class="menu-bell text-left col-lg-6 col-md-6">
                        <li class="full hidden-xs hidden-sm">
                            <a href="#" id="btnBell">
                                <div class="bell">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                </div>
                                <span>1</span>
                            </a>
                        </li>
                        <div id="myDropdown" class="dropdown-content">
                            <div class="session1Notification">
                                <span>Thông báo</span>
                            </div>
                            <div class="today">
                                <span>TODAY</span>
                            </div>
                            <div class="allNotification">
                                <div class="contentNotification">
                                    <div class="img">
                                        <img src="assets/images/images.jpg">
                                    </div>
                                    <div class="textContent">
                                        <p>VuvanTien <span>đã bình luận về bài viết của bạn</span>
                                        </p> 
                                        <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> 11:20 23/9/2019</span>
                                    </div>
                                    <div class="icon text-right">
                                        <i class="signalCMT fa fa-commenting-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="contentNotification">
                                    <div class="img">
                                        <img src="assets/images/images.jpg">
                                    </div>
                                    <div class="textContent">
                                        <p>Admin <span>đã phê duyệt bài viết của bạn</span>
                                        </p> 
                                        <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> 11:20 23/9/2019</span>
                                    </div>
                                    <div class="icon text-right">
                                        <i class="signalDone fa fa-check-square-o" aria-hidden="true"></i>
                                    </div>
                                    
                                </div>
                                <div class="contentNotification">
                                    <div class="img">
                                        <img src="assets/images/images.jpg">
                                    </div>
                                    <div class="textContent">
                                        <p>VuvanTien <span>đã bình luận về bài viết của bạn</span>
                                        </p> 
                                        <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> 11:20 23/9/2019</span>
                                    </div>
                                    <div class="icon text-right">
                                        <i class=" signalCMT fa fa-commenting-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="contentNotification">
                                    <div class="img">
                                        <img src="assets/images/images.jpg">
                                    </div>
                                    <div class="textContent">
                                        <p>Admin <span>đã không phê duyệt bài viết của bạn</span>
                                        </p> 
                                        <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> 11:20 23/9/2019</span>
                                    </div>
                                    <div class="icon text-right">
                                        <i class="signalCancel fa fa-ban" aria-hidden="true"></i>
                                    </div>
                                </div>

                            </div>
                      </div>
                    </ul>

                    <ul class="menu-logout text-right col-lg-6 col-md-6">
                        <a href="/" class="text-left goto" title="Go to Home page">
                            <i class="fa fa-gg" aria-hidden="true"></i>
                        </a>
                        <li class="full hidden-xs hidden-sm">
                            <a href="#">
                                <i onclick="openFullscreen();" class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="active">
                            <img src="<?php echo $author['ava'];?>">
                        </li>
                        <li>
                            <a href=""><?php echo $author['name'];?> <i class="fa fa-caret-down" aria-hidden="true"> </a></i>
                            <ul class="logout">
                                <li>
                                    <a href="/logout">Log out<i class="fa fa-sign-out" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                            
                        </li>
                    </ul>
                </div>
            </div>
            <div class="registerContentBG">
                <div class="linkPage">
                    <div class="nameLink">
                        <div class="linkLeft hidden-xs hidden-sm">
                            <div class="icon">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </div>
                            <div class="linkText">
                                <h4>Time remaining</h4>
                                <span>
                                    <label id="days"></label> <span>Days</span>
                                    <label id="hours"></label> <span>:</span>
                                    <label id="minutes"></label> <span>:</span>
                                    <label id="seconds"></label>
                                </span>
                            </div>
                        </div>
                        <div class="linkRight text-right">
                            <div class="link">
                                <ul>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li> / </li>
                                    <li>
                                        <a href="">
                                            Admin
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="registerContent tab-content">
                    <div id="home" class="registerContentForm tab-pane fade in active listMagazine">
                        <form name="reportForm" id="reportForm">
                            <div class="text-center row">
                                
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="alert alert-warning">
                                        <h3>Choose Year:</h3>
                                    </div>
                                    <div class="reportYearSelect col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <select id="reportYearSelect">

                                        </select>
                                    </div>
                                    <div class="rptButton col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <button type="button" id="rptButton" onclick="generateRpt()">Submit</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="mgzPie">

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="authorPie">

                                </div>
                                <h3>Exception reports:</h3>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="nocmtPie">

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="no14daysPie">

                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="register" class="registerContentForm tab-pane fade">
                        <form name="formRes" id="createForm">
                            <div class="alert alert-warning">
                                <h3>Personal information</h3>
                            </div>
                            <div class="main-input">
                                <div class="text">
                                    <p><span>* </span>Full name</p>
                                </div>
                                <div class="input">
                                    <input type="text" name="name" required>
                                </div>
                            </div>
                            <div class="main-input">
                                <div class="text">
                                    <p><span>* </span>Phone (10 digits)</p>
                                </div>
                                <div class="input">
                                    <input type="text" name="phone" required>
                                </div>
                            </div>
                            <div class="main-input">
                                <div class="text">
                                    <p><span>* </span>DOB (D/M/Y)</p>
                                </div>
                                <div class="input">
                                    <input type="date" name="dob">
                                </div>
                            </div>
                            <div class="main-input">
                                <div class="text">
                                    <p><span>* </span>Role</p>
                                </div>
                                <div class="input">
                                    <select name="role" id="user-role">
                                        <option value="1">Student</option>
                                        <option value="2">Marketing Coordinator</option>
                                        <option value="3">Guest</option>
                                    </select>
                                </div>
                            </div>
                            <div class="main-input">
                                <div class="text">
                                    <p><span>* </span>Faculty</p>
                                </div>
                                <div class="input">
                                    <select name="faculty" id="fc-list">
                                        <option value="">Faculty</option>
                                    </select>
                                </div>
                            </div>

                           <!--  <div class="title">
                                <h3>Account information</h3>
                            </div> -->
                            <div class="main-input">
                                <div class="text">
                                    <p><span>* </span>Email</p>
                                </div>
                                <div class="input">
                                    <input type="text" name="email" required>
                                </div>
                            </div>
                            <div class="main-input">
                                <div class="text">
                                    <p><span>* </span>Pass</p>
                                </div>
                                <div class="input">
                                    <input type="Password" name="password" required>
                                </div>
                            </div>
                            <div class="main-input">
                                <div class="button-res">
                                    <input type="submit" name="create" value="Sign Up" onclick="Validate(document.formRes, event)">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="academic" class="registerContentForm tab-pane fade">
                        <form name="yearForm" id="yearForm">
                            <div class="alert alert-warning">
                                <h3>Academic year information</h3>
                            </div>
                            <div class="main-input">
                                <div class="text">
                                    <p><span>* </span>Year name</p>
                                </div>
                                <div class="input">
                                    <input type="text" name="yearName" required>
                                </div>
                            </div>
                            <div class="main-input">
                                <div class="text">
                                    <p><span>* </span>Start Time</p>
                                </div>
                                <div class="input">
                                    <input type="datetime-local" name="startDate" required>
                                </div>
                            </div>
                            <div class="main-input">
                                <div class="text">
                                    <p><span>* </span>Posting deadline</p>
                                </div>
                                <div class="input">
                                    <input type="datetime-local" name="deadline" required>
                                </div>
                            </div>
                            <div class="main-input">
                                <div class="text">
                                    <p><span>* </span>updating deadline</p>
                                </div>
                                <div class="input">
                                    <input type="datetime-local" name="finalDeadline" required>
                                </div>
                            </div>
                            <div class="main-input">
                                <div class="button-res">
                                    <input type="submit" name="" value="Edit" onclick="validateYear(document.yearForm, event)">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="downloadFile" class="registerContentForm tab-pane fade">
                        <form name="downloadForm" id="downloadForm">
                            <div class="alert alert-warning">
                                <h3>Download File</h3>
                            </div>
                            <div class="btnDownload row" id="downloadList">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function Validate(formRes, event) {
            //không cho form post theo cách thông thường để post bằng ajax
            event.preventDefault();
            //validate thông tin user
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var numbers = /^[0-9]{10}$/;
            if (!formRes.phone.value || !formRes.email.value || !formRes.name.value || !formRes.password.value || !formRes.dob.value) {
                alert('Please fill in all of the forms!');
                return false;
            }
            if (!formRes.phone.value.match(numbers)) {
                alert('Please input correct phone format(10 digits)');

                return false;
            } else if (!formRes.email.value.match(mailformat)) {
                alert("You have entered an invalid email address");
                return false;
            } else {
                //kiểm tra email có bị lặp không bằng ajax
                $.ajax({
                    url: `/vldEmail`,
                    type: 'GET',
                    dataType: 'json',
                    async: false
                }).done(function(result) {
                    if (result.indexOf(formRes.email.value) > -1) {
                        alert("Email already used!");
                        return false;
                    }
                }).then(function() {
                    //post bằng ajax
                    $.ajax({
                        url: `/createUser`,
                        type: 'POST',
                        dataType: 'json',
                        data: $("#createForm").serialize(),
                        async: false
                    }).done(function(result) {
                        var fcText = $(`#list option[value='${result.faculty}']`).text();
                        $("#mymodal-body").html(`<center><img src="assets/images/anonymous.png" width="50px" height="50px"/></center>
					<p><b>Role: </b>${result.role}</p>
					<p><b>Name: </b>${result.name}</p>
					<p><b>Date of birth: </b>${result.dob}</p>
					<p><b>Phone: </b>${result.phone}</p>
					<p><b>Email: </b>${result.email}</p>
					<p><b>Faculty: </b>${fcText}</p>`);
                        if (result.role == "Student") {
                            $("#mymodal-body").append(`<p><b>Student ID: </b>${result.stdID}</p>`);
                        }
                        $("#myModal").modal("show");
                    })
                })



            }
        }

        function validateYear(yearForm, event) {
            //không cho form post theo cách thông thường để post bằng ajax
            event.preventDefault();
            //validate thông tin của academic year
			var currentYear = new Date().getFullYear();
            var startDt = yearForm.startDate.value;
            var dl1 = yearForm.deadline.value;
            var dl2 = yearForm.finalDeadline.value;
            if (!startDt || !dl1 || !dl2 || !yearForm.yearName.value) {
                alert("Please input all information!");
                return false;
            } else if (new Date(startDt).getFullYear()!= currentYear || new Date(dl1).getFullYear()!= currentYear || new Date(dl2).getFullYear()!= currentYear ){
				alert("Invalid time range!");
				return false;
            } else if ((new Date(dl1).getTime() <= new Date(startDt).getTime()) || (new Date(dl2).getTime() <= new Date(dl1).getTime())) {
                alert("Invalid time range!");
                return false;
            //post bằng ajax
            } else {
                $.ajax({
                    url: `/editDeadlines`,
                    type: 'POST',
                    dataType: 'json',
                    data: $("#yearForm").serialize(),
                    async: false
                }).done(function(result) {
                    if (result.status == "success") {
                        alert("Deadlines successfully updated!");
                        location.reload();
                    }
                })
            }
        }

    function getZip(yearNum) {
        console.log(yearNum);
        $.ajax({
            url: `/downloadZip?year=${yearNum}`,
            type: 'GET',
            success: function(result) {
                window.open(`https://yearlymgz.herokuapp.com/${yearNum}.zip`, '_blank');
            }
        })    
           
    }

    function generateRpt() {
        if ($("#reportYearSelect").val()) {
            $.ajax({
            url: `/getStatData?year=${$("#reportYearSelect").val()}`,
            type: 'GET',
            success: function(rawResult) {
                var result = JSON.parse(rawResult);
                var myFac = [];
                var myMgz = [];
                var myAuthor = [];
                var myNocmt = [];
                var myNo14days = [];
                    for (var i = 0; i < result.length; i++) {
                        myFac.push(result[i].faculty);
                        myMgz.push(result[i].mgzCount);
                        myAuthor.push(result[i].authorCount);
                        myNocmt.push(result[i].nocmtCount);
                        myNo14days.push(result[i].nocmtCount14days);
                    }
                    google.charts.load('current', {'packages': ['corechart']});
                    google.charts.setOnLoadCallback(drawVisualization);
                    function drawVisualization() {
// Create and populate the data table.
                        var mgzdata = new google.visualization.DataTable();
                        var authordata = new google.visualization.DataTable();
                        var nocmtdata = new google.visualization.DataTable();
                        var no14daysdata = new google.visualization.DataTable();

                        mgzdata.addColumn('string', 'faculty');
                        mgzdata.addColumn('number', 'contributions');
                        mgzdata.addRows(myFac.length);
                        for (var i = 0; i < myFac.length; i++) {
                            mgzdata.setCell(i, 0, myFac[i]);
                            mgzdata.setCell(i, 1, myMgz[i]);
                        }
                        new google.visualization.PieChart(document.getElementById('mgzPie')).
                                draw(mgzdata, {title: "Contributions", is3D: true, width: '100%', height: '400'});

                        authordata.addColumn('string', 'faculty');
                        authordata.addColumn('number', 'contributors');
                        authordata.addRows(myFac.length);
                        for (var i = 0; i < myFac.length; i++) {
                            authordata.setCell(i, 0, myFac[i]);
                            authordata.setCell(i, 1, myAuthor[i]);
                        }
                        new google.visualization.PieChart(document.getElementById('authorPie')).
                                draw(authordata, {title: "Contributors", is3D: true, width: '100%', height: '400'}); 

                        nocmtdata.addColumn('string', 'faculty');
                        nocmtdata.addColumn('number', 'posts');
                        nocmtdata.addRows(myFac.length);
                        for (var i = 0; i < myFac.length; i++) {
                            nocmtdata.setCell(i, 0, myFac[i]);
                            nocmtdata.setCell(i, 1, myNocmt[i]);
                        }
                        new google.visualization.PieChart(document.getElementById('nocmtPie')).
                                draw(nocmtdata, {title: "Abadoned posts", is3D: true, width: '100%', height: '400'});
                                
                        no14daysdata.addColumn('string', 'faculty');
                        no14daysdata.addColumn('number', 'posts');
                        no14daysdata.addRows(myFac.length);
                        for (var i = 0; i < myFac.length; i++) {
                            no14daysdata.setCell(i, 0, myFac[i]);
                            no14daysdata.setCell(i, 1, myNo14days[i]);
                        }
                        new google.visualization.PieChart(document.getElementById('no14daysPie')).
                                draw(no14daysdata, {title: "Abadoned posts after 14 days", is3D: true, width: '100%', height: '400'});
            }
            }
        })    
        }
    }

    </script>
    <!--
    <script>
        function validateForm() {
            var x = document.forms["myForm"]["fname"].value;
            if (x == "") {
                alert("Name must be filled out");
                return false;
            }

        }
	</script>
	-->
    <script>
        var elem = document.getElementById("myvideo");

        function openFullscreen() {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.mozRequestFullScreen) {
                /* Firefox */
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) {
                /* Chrome, Safari & Opera */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                /* IE/Edge */
                elem.msRequestFullscreen();
            }
        }
    </script>
    <script>
        jQuery(document).ready(function($) {
            //tạo 1 hàm format date để load vào html
            Date.prototype.formatted = function() {
                var mm = this.getMonth() + 1; // getMonth() bắt đầu từ 0 - 11
                var dd = this.getDate();
                var HH = this.getHours();
                var MM = this.getMinutes();
                var ss = this.getSeconds();
                return this.getFullYear() + "-" +
                    (mm > 9 ? '' : '0') + mm + "-" +
                    (dd > 9 ? '' : '0') + dd + "T" +
                    (HH > 9 ? '' : '0') + HH + ":" +
                    (MM > 9 ? '' : '0') + MM + ":" +
                    (ss > 9 ? '' : '0') + ss;
            };
            $('#myModal').on('hidden', function() {
                location.reload();
            })
            //load thông tin năm hiện tại vào trang
            $.ajax({
                url: `/loadYear`,
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    console.log(new Date(result[0].dl1).formatted());
                    if (result.length) {

                        var thisYear = new Date().getFullYear();
                        if(result[0].year == thisYear) {
                            document.yearForm.yearName.value = result[0].yearName;
                            document.yearForm.startDate.defaultValue = new Date(result[0].std).formatted();
                            document.yearForm.deadline.defaultValue = new Date(result[0].dl1).formatted();
                            document.yearForm.finalDeadline.defaultValue = new Date(result[0].dl2).formatted();
                        }
                        result.forEach(function(item){
                            $("#downloadList").append(`<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <button type="button" value=${item.year} onclick="getZip(this.getAttribute('value'))">${item.year} - ${item.yearName}</button>
                                </div>`);
                            $("#reportYearSelect").append(`<option value=${item.year}>${item.year} - ${item.yearName}</option>`)
                        })
                    }
                }
            })
            //load danh sách khoa, lọc ra số khoa đã có coordinator
            $.ajax({
                url: `/loadFaculty`,
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    if (result.leftFC.length <= 0) {
                        $("#user-role").html(`<option value="1">Student</option>
										<option value="3">Guest</option>`)
                    }
                    var htmlList = "";
                    var tempList = result.allFC;
                    tempList.forEach(function(item) {
                        htmlList += `<option value="${item.code}">${item.name}</option>`;
                    })
                    $("#fc-list").html(htmlList);
                    $("#user-role").on('change', function() {
                        htmlList = "";
                        if ($(this).val() == 2) {
                            tempList = result.leftFC;
                        } else {
                            tempList = result.allFC;
                        }
                        tempList.forEach(function(item) {
                            htmlList += `<option value="${item.code}">${item.name}</option>`;
                        })
                        $("#fc-list").html(htmlList);
                    })


                }
            })
        });
    </script>
    <script type="text/javascript">
                // Get the button, and when the user clicks on it, execute myFunction
        document.getElementById("btnBell").onclick = function() {myFunction()};

        /* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>

    <script type="text/javascript">
                // Get the button, and when the user clicks on it, execute myFunction
        document.getElementById("btnBellMobile").onclick = function() {myFunctionBell()};

        /* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
        function myFunctionBell() {
          document.getElementById("ShowBell").classList.toggle("show");
        }
    </script>
    <script type="text/javascript" src="assets/js/slick.js"></script>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script type="text/javascript" src="assets/js/index.js"></script>
    <script type="text/javascript" src="assets/mmenu/mmenu/jquery.mmenu.all.js"></script>
</body>

</html> 