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


    <?php
        include_once './controllers/magazineController.php';
        include_once './controllers/notiController.php';
        include_once './controllers/yearController.php';
        date_default_timezone_set("Asia/Bangkok");
        $thisYear = date("Y");
        $yearCtrl = new yearCtrl();
        $yearRes = $yearCtrl->loadThisYear();

        if (count($yearRes) > 0 && $yearRes[0]->year == $thisYear ) {
            echo "<input type='hidden' id='deadline' value='". $yearRes[0]->dl1."'/>";
        }
        $magazineCtrl = new magazineCtrl();
        $notiCtrl = new notiCtrl();
        $result = $magazineCtrl->getListMagazineForFaculty($author['id']);
        $notiCtrl -> removeNoti("receiverId = ".$author['id']." and notiType='cmtTime'");
        date_default_timezone_set("Asia/Bangkok");
        foreach($result as $item) {
            $date1 = new DateTime();
            $date2 = new DateTime($item->created_at);
            if ($date1->getTimestamp() - $date2->getTimestamp() > 1209600 && $item->cmtCount == 0) {
                $notiCtrl->createNoti($item->id, 'cmtTime', $item->creatorId, $author['id']);
            }
        }
        $notiRes = $notiCtrl->getNoti($author['id']);

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
                    <center><img src="assets/images/anonymous.png" width="50%" height="50%" /></center>
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
                        <a data-toggle="pill" href="#viewallmagazines">
                            View All Magaiznes
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="mainMenu hidden-xs hidden-sm">
            <div class="logoTeam">
                <a href="index.html">
                    <img src="assets/images/Logo.png">
                </a>
                <a href="">Heroes & Zeroes</a>
            </div>
            <div class="Navigation">
                <!-- <h4>Faculty: <span><?php echo $author['faculty'];?></span></h4> -->
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a data-toggle="pill" href="#viewallmagazines">
                            <i class="fa fa-bars" aria-hidden="true"></i>View All Magaiznes
                        </a>
                    </li>
                    <li>
                        <a data-toggle="pill" href="#yourmagazine">
                            <!-- <i class="fa fa-bars" aria-hidden="true"></i> Your File -->
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
                                <span><?php echo count($notiRes)?></span>
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
                            <?php 
                                    
                                    foreach($notiRes as $item) {
                                        ?>
                                        <div value="<?php echo $item->mgzId ?>" class="contentNotification" onclick="notiNavigate(this.getAttribute('value'))">
                                            <input type="hidden" class="notiId" value="<?php echo $item->id ?>"/>
                                            <div class="img">
                                                <img src="<?php echo $item->avatar?>">
                                            </div>
                                        <?php    
                                        switch($item->type) {                                            
                                            case "create":
                                                ?>
                                                <div class="textContent">
                                                    <p><?php echo $item->name?> <span>created post <i><?php echo $item->title?></i></span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-upload signalUpload" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                                <?php
                                                break;
                                            case "update":
                                                ?>
                                                <div class="textContent">
                                                    <p><?php echo $item->name?> <span>updated the post <i><?php echo $item->title?></i></span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-refresh signalUpdate" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                                <?php
                                                break;

                                            case "comment":
                                                ?>
                                                <div class="textContent">
                                                    <p><?php echo $item->name?> <span>commented on the post <i><?php echo $item->title?></i></span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-commenting-o signalCMT" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                                <?php
                                                break;

                                            case "cmtTime":
                                                ?>
                                                <div class="textContent">
                                                    <p><span>You have to comment on the post <i><?php echo $item->title?></i> now!</span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-exclamation-triangle signalcmtLate" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                                <?php
                                                break;
                                        }
                                    }
                                ?>
 

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
                                <span><?php echo count($notiRes)?></span>
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
                                <?php 
                                    
                                    foreach($notiRes as $item) {
                                        ?>
                                        <div value="<?php echo $item->mgzId ?>" class="contentNotification" onclick="notiNavigate(this.getAttribute('value'))">
                                            <input type="hidden" class="notiId" value="<?php echo $item->id ?>"/>
                                            <div class="img">
                                                <img src="<?php echo $item->avatar?>">
                                            </div>
                                        <?php    
                                        switch($item->type) {                                            
                                            case "create":
                                                ?>
                                                <div class="textContent">
                                                    <p><?php echo $item->name?> <span>created post <i><?php echo $item->title?></i></span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-upload signalUpload" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                                <?php
                                                break;
                                            case "update":
                                                ?>
                                                <div class="textContent">
                                                    <p><?php echo $item->name?> <span>updated the post <i><?php echo $item->title?></i></span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-refresh signalUpdate" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                                <?php
                                                break;

                                            case "comment":
                                                ?>
                                                <div class="textContent">
                                                    <p><?php echo $item->name?> <span>commented on the post <i><?php echo $item->title?></i></span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-commenting-o signalCMT" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                                <?php
                                                break;

                                            case "cmtTime":
                                                ?>
                                                <div class="textContent">
                                                    <p><span>You have to comment on the post <i><?php echo $item->title?></i> now!</span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-exclamation-triangle signalcmtLate" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                                <?php
                                                break;
                                        }
                                    }
                                ?>
 

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
                                           View All Magaiznes
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="registerContent tab-content">
                    <div id="upload" class="registerContentForm tab-pane fade">
                        <form name="uploadForm" id="uploadForm" method="post" enctype="multipart/form-data">  
                            <div class="uploadForm">  
                                <input type="hidden" value="<?php echo $author['id']?>" name="userid" id="userid"/>
                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                <div class="image-preview">
                                    <div class="row session1">
                                     <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                                         <h4><span>*</span>Title</h4>
                                     </div>
                                     <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9 ">
                                         <input type="text" name="title" required>
                                     </div>
                                 </div>
                                 <div class="row session2">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 ">
                                        <h4><span>*</span>File Manazine</h4>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                                     <div class="file">
                                        <input accept=".doc, .docx" type="file" name="doc" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row session4">
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                                    <h4><span>*</span>Logo </h4>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9 fileImg">
                                 <div class="row">
                                     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <div class="btn btn-default image-preview-input">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i>
                                            <span class="image-preview-input-title">Browse</span>
                                            <input type="file" accept="image/png, image/jpeg, image/gif" name="imageUpload"/> <!-- rename it -->
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            <span class="glyphicon glyphicon-remove"></span> Clear
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row session3">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">

                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                             <div class=" check">
                                 <input type="checkbox" autocomplete="off" checked name="agree">
                                 <p>Chấp nhận điều khoản</p>
                             </div>
                         </div>
                     </div>
                     <div class="row session3">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">

                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                         <div class="rules">
                             <p>
                                 Trải nghiệm của bạn trên Facebook không giống với của bất kỳ ai khác: từ các bài viết, tin, sự kiện, quảng cáo và nội dung khác mà bạn nhìn thấy trong Bảng tin hoặc nền tảng video của chúng tôi tới các Trang bạn theo dõi và các tính năng khác mà bạn có thể sử dụng, chẳng hạn như Thịnh hành, Marketplace và tìm kiếm. Chúng tôi sử dụng dữ liệu mà mình có - ví dụ: về các kết nối bạn tạo, các lựa chọn và cài đặt bạn chọn và những gì bạn chia sẻ cũng như thực hiện trên và ngoài Sản phẩm của chúng tôi - để cá nhân hóa trải nghiệm của bạn.
                             </p>
                         </div>
                     </div>
                 </div>
                 <div class="row session3">
                    <h4 id="ErrorMsg" style="color:red; font-weight:bold"></h4>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                     <input " class="btnSubmit" type="submit" name="form-upload" value="Upload" onclick="validateMgz(document.uploadForm, event)">
                 </div>
             </div>

         </div>
     </div>
 </form>
</div>
<div id="viewallmagazines" class="registerContentForm tab-pane fade in active">
    <div>
        <div class="titleList">
            <div class="well well-sm text-center">

                <h3>List of Magazines</h3>

<!--                     <div class="btn-group" data-toggle="buttons">
                        
                        <label class="btn btn-success active">
                            <input type="radio" name="options" id="option2" autocomplete="off" >
                            Approved
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>

                        <label class="btn btn-warning">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            Sending
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>

                        <label class="btn btn-danger">
                            <input type="radio" name="options" id="option2" autocomplete="off">
                            Cannel
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                    
                    </div> -->
                </div>
            </div>
            <div class="row col-md-12 col-lg-12 col-xs-12 col-sm-12 listMagazine">
                <table class="table table-striped custab">
                <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Create at</th>
                            <th>Update at</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <?php
                    foreach($result as $item) {
                        ?>
                        <tr>
                            <td><?php echo $item->id?></td>
                            <td><?php echo $item->title?></td>
                            <td class="imgPost">
                                <img src="<?php echo $item->img?>">
                            </td>
                            <td><?php echo $item->name?></td>
                            <td><?php echo $item->created_at?></td>
                            <td><?php echo $item->update_at?></td>
                            <td><?php echo $item->status?></td>
                            <td class="text-center">
                                <a class='btn btn-info btn-xs' href="/viewmagazine?mgzId=<?php echo $item->id?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                </a>
                                <?php if ($item->status != "approved") {?>
                                <a value="<?php echo $item->id?>" class='btn btn-success btn-xs' href="#" onclick="approveMgz(this.getAttribute('value'))">
                                    <i class="fa fa-check-square" aria-hidden="true"></i> Approved
                                </a>
                                <?php } ?>
                                <a value="<?php echo $item->id?>"  class='btn btn-danger btn-xs' href="#" onclick="deleteMgz(this.getAttribute('value'))">
                                    <i class="fa fa-times" aria-hidden="true"></i> Delete
                                </a>

                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>

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
    

    function approveMgz(id) {
        var approveCfm = confirm("Are you sure you want to approve this?");
        if (approveCfm === true) {
        $.ajax({
            url: `/approveMgz?mgzId=${id}&publisher=${$("#userid").val()}`,
            type: 'GET',
            success: function(result) {
                console.log(result);
                if (result) {
                    alert(result);
                }
                else {
                    alert("magazine successfully published!");
                    location.reload();
                }
            }
        })    
        }   
    }


    function deleteMgz(id) {
        var deleteCfm = confirm("Are you sure you want to delete this?");
        if (deleteCfm === true) {
        $.ajax({
            url: `/deleteMgz?mgzId=${id}&deletor=${$("#userid").val()}`,
            type: 'GET',
            success: function(result) {
                console.log(result);
                if (result) {
                    alert(result);
                }
                else {
                    alert("magazine successfully deleted!");
                    location.reload();
                }
            }
        })    
        }   
    }

    function notiNavigate(id) {
        var userId = $("#userid").val();
        $.ajax({
            url: `/deleteNoti`,
            type: 'POST',
            data: {
                mgzId:id,
                userId: userId
            },
            success: function(result) {
                window.location.href=`/viewmagazine?mgzId=${id}`;
            }
        })           
    }

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

    $(".edit-btn").click(function() {
        var mgzId = $(this).data("value");
        $("#mgz-id").val(mgzId);
        $("#formCmt").html("");
        var htmlList="";
        $.ajax({
            url: `/loadComments?mgzId=${mgzId}`,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                console.log(result);
                if (result.length) {

                    result.forEach(function(item) {
                        htmlList += `<div class="comment">
                        <div class="imgCmt">
                        <img src="${item.avatar}">
                        </div>
                        <div class="nameCmt">
                        <h4>${item.username} <span>${item.fName}</span></h4>
                        </div>
                        <div class="contentCmt">
                        ${item.content}
                        </div>
                        </div>`;
                    })

                }
                $("#formCmt").html(htmlList);
            }
        })

        document.getElementById('update').style.display='block';
    })

    $('#comment').keypress(function (e) {

        var key = e.which;
        if(key == 13)  // the enter key code
        {
            e.preventDefault();
            var c = $.trim($(this).val()).length;
            console.log(c);
            if (c<10) {
                alert("Your comment too short!!");
            }
            else if (c>200) {
                alert("Your comment too long!!");
            }
            else {
                var content = $.trim($(this).val());
                var userId = $("#userid").val();
                var mgzId = $("#mgz-id").val();
                $.ajax({
                    url: `/postModifyCmt`,
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
                            htmlCmt = `<div class="comment">
                            <div class="imgCmt">
                            <img src="<?php echo $author['ava'];?>">
                            </div>
                            <div class="nameCmt">
                            <h4><?php echo $author['name'];?> <span><?php echo $author['faculty'];?></span></h4>
                            </div>
                            <div class="contentCmt">
                            ${content}
                            </div>
                            </div>`;    
                            $("#formCmt").append(htmlCmt);
                            $("#formCmt").animate({ scrollTop: $('#formCmt').prop("scrollHeight")}, 1000);
                            $("#comment").val("");                  
                        }
                    }
                })               
            }
        }
    });   
</script>

<script type="text/javascript">
    $(document).on('click', '#close-preview', function(){ 
        $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
         $('.image-preview').popover('show');
     }, 
     function () {
         $('.image-preview').popover('hide');
     }
     );    
});

    $(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
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