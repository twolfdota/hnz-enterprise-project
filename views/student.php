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
        include_once './controllers/notiController.php';
        include_once './controllers/yearController.php';
        $notiCtrl = new notiCtrl();
        $notiRes = $notiCtrl->getNoti($author['id']);
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
                        <a data-toggle="pill" href="#upload">
                            Upload File
                        </a>
                    </li>
                    <li>
                        <a data-toggle="pill" href="#yourmagazine">
                            Your File
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
                <h4>Faculty: <span><?php echo $author['faculty'];?> Department</span></h4>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a data-toggle="pill" href="#upload">
                            <i class="fa fa-bars" aria-hidden="true"></i> Upload File
                        </a>
                    </li>
                    <li>
                        <a data-toggle="pill" href="#yourmagazine" id="mgzListToggle">
                            <i class="fa fa-bars" aria-hidden="true"></i> Your File
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
                                <span class="notiCount"><?php echo count($notiRes)?></span>
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
                                            case "delete":
                                                ?>
                                                <div class="textContent">
                                                    <p><?php echo $item->name?> <span>deleted one of your posts </span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-close signalCancel" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                                <?php
                                                break;
                                            case "approve":
                                                ?>
                                                <div class="textContent">
                                                    <p><?php echo $item->name?> <span>published your post <i><?php echo $item->title?></i></span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-check signalDone" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                                <?php
                                                break;

                                            case "comment":
                                                ?>
                                                <div class="textContent">
                                                    <p><?php echo $item->name?> <span>commented on your post <i><?php echo $item->title?></i></span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-commenting-o signalCMT" aria-hidden="true"></i>
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
                                <span class="notiCount"><?php echo count($notiRes)?></span>
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
                                            case "delete":
                                                ?>
                                                <div class="textContent">
                                                    <p><?php echo $item->name?> <span>deleted one of your posts </span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-close signalCancel" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                                <?php
                                                break;
                                            case "approve":
                                                ?>
                                                <div class="textContent">
                                                    <p><?php echo $item->name?> <span>published your post <i><?php echo $item->title?></i></span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-check signalDone" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                                <?php
                                                break;

                                            case "comment":
                                                ?>
                                                <div class="textContent">
                                                    <p><?php echo $item->name?> <span>commented on your post <i><?php echo $item->title?></i></span>
                                                    </p> 
                                                    <span class="time"> <i class="fa fa-comments" aria-hidden="true"></i> <?php echo $item->date?></span>
                                                </div>
                                                <div class="icon text-right">
                                                    <i class="fa fa-commenting-o signalCMT" aria-hidden="true"></i>
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
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
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
                                            Student
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="registerContent tab-content">
                    <div id="upload" class="registerContentForm tab-pane fade in active">
                        <form name="uploadForm" id="uploadForm" method="post" enctype="multipart/form-data">  
                            <div class="uploadForm">  
                                <input type="hidden" value="<?php echo $author['id']?>" name="userid" id="userid"/>
                                <input type="hidden" value="<?php echo $author['role']?>" id="userRole"/>
                                <input type="hidden" value="<?php echo $author['corId']?>" name="corId" id="corId"/>
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

         </div><!-- /input-group image-preview [TO HERE]--> 
     </div>
 </form>
</div>
<div id="yourmagazine" class="registerContentForm tab-pane fade">
    <div>
        <div class="titleList">
            <div class="alert alert-warning">

                <h3>List Your File</h3>

                <!-- <div class="btn-group" data-toggle="buttons">

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
                        Cancel
                        <span class="glyphicon glyphicon-ok"></span>
                    </label>
                    
                </div> -->
            </div>
        </div>
        <div class="row col-md-12 col-lg-12 col-xs-12 col-sm-12 crollStudent">
            <table class="table table-striped custab" id="mgzTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                include_once './controllers/magazineController.php';
                $magazineCtrl = new magazineCtrl();
                $result = $magazineCtrl->getListMagazine($author['id']);
                foreach($result as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item->id?></td>
                        <td><?php echo $item->title?></td>
                        <td class="imgPost">
                            <img src="<?php echo $item->img?>">
                        </td>
                        <td><?php echo $item->status?></td>
                        <td class="">
                            <a class="edit-btn" data-value="<?php echo $item->id?>" class='btn btn-info btn-xs' href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <div id="update" class="modal">

      <div class="modal-content animate">
        <span onclick="document.getElementById('update').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form name="editForm" id="editForm" method="post" enctype="multipart/form-data">  
            <div class="uploadForm UpdateForm">  
                <input id="mgz-id" name="mgzId" type="hidden" value=""/>
                <input type="hidden" value="<?php echo $author['id']?>" name="userid"/>
                <input type="hidden" value="<?php echo $author['corId']?>" name="corId"/>
                <input id="old-title" name="oldTitle" type="hidden" value=""/>
                <input id="oldDocType" name="oldDocType" type="hidden" value=""/>
                <input id="oldImgType" name="oldImgType" type="hidden" value=""/>
                <!-- image-preview-filename input [CUT FROM HERE]-->
                <div class="image-preview">
                    <div class="row session1">
                     <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                         <h4><span>*</span>Title</h4>
                     </div>
                     <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9 ">
                         <input type="text" name="title" required id="editTitle">
                     </div>
                 </div>
                 <div class="row session2">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 ">
                        <h4><span>*</span>File Magazine</h4>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                     <div class="file">
                        <a href="#" id="editDocLink"></a>
                        <input accept=".doc, .docx" type="file" name="doc" required>
                    </div>
                </div>
            </div>

            <div class="row session4">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                    <h4><span>*</span>Background: </h4>
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
            <div class="row imgEdit">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                    
                </div>
                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                    <img src="" id="editImg" alt="" width="50%" height="auto"/>
                </div>
            </div>
            <div class="row">
                <p id="updateErrorMsg" style="color:red"></p>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                </div>
                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                 <input class="btnSubmit" type="submit" name="form-upload" onclick="updateMgz(document.editForm, event)" value="Update">
             </div>
         </div>

     </div><!-- /input-group image-preview [TO HERE]--> 
</div>
</form>
<form name="editForm" id="editForm" method="post" enctype="multipart/form-data">  
    <div class="uploadForm UpdateForm">  
        <div class="row session3">
    <div class="commentStudent">
        <h4>Comment</h4>
    </div>
    <div class="commentStudent2 CommentOver">
        <div class="formCmt" id="formCmt">
           <div class="comment">
               <div class="imgCmt">
                   <img src="assets/images/user.png">
               </div>
               <div class="nameCmt">
                   <h4>Vu Van Tien <span>IT</span></h4>
               </div>
               <div class="contentCmt">
                   You can also use the following javascript to close the modal by clicking outside of the modal content (and not just by using the "x" or "cancel" button to close it):
               </div>
           </div>
       </div>
       <h4>Your Comment</h4>
       <div class="YourFormcmtSTudent">
        <div class="imgCmt">
            <img src="<?php echo $author['ava'];?>">
        </div>
        <div class="contentCmt">
            <textarea placeholder="Write your comment..." class="form-control" rows="5" required id="comment"></textarea>
        </div>
    </div>
</div>
</div>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>

<script>
    var elem = document.getElementById("myvideo");
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
                var deleteNum = $(".allNotification").find(`.contentNotification[value=${id}]`).length/2;
                var deleted = $(".allNotification").find(`.contentNotification[value=${id}]`).remove();
                var currNoti = parseInt($(".notiCount").html());
                $(".notiCount").html(currNoti - deleteNum);
                $("#mgzListToggle").click();
                $(`#mgzTable .edit-btn[data-value="${id}"]`).click();
            }
        })           
    }

    function validateMgz(form, event) {
        $("#ErrorMsg").html("");
        event.preventDefault();
        formData = new FormData($("#uploadForm")[0]);
        $.ajax({
            url: `/postMgz`,
            type: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            success: function(result){
                if (result.length < 12) {
                    alert("Magazine successfully uploaded!");
                    location.reload();
                }
                else {
                    $("#ErrorMsg").html(result);
                }
            }
        })
    }

    function updateMgz(form, event) {
        $("#UpdateErrorMsg").html("");
        event.preventDefault();
        formData = new FormData($("#editForm")[0]);
        $.ajax({
            url: `/updateMgz`,
            type: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            success: function(result){
                if (result.length <= 18) {
                    alert("Magazine successfully updated!");
                    location.reload();
                }
                else {
                    $("#updateErrorMsg").html(result);
                }
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
            cache:false,
            success: function(result) {
                $("#old-title").val(result.title);
                $("#editTitle").val(result.title);
                $("#oldDocType").val(result.doc.replace(`uploads/${result.year}/doc/${result.title}.`,""));
                $("#oldImgType").val(result.img.replace(`uploads/${result.year}/mgzImg/${result.title}.`,""));
                $("#editDocLink").text(result.doc.replace(`uploads/${result.year}/doc/`,""));
                $("#editDocLink").attr("href", `/downloadDocs?docLink=${result.doc}&year=${result.year}`);
                $("#editImg").attr("src", result.img)
                if (result.cmtList.length) {

                    result.cmtList.forEach(function(item) {

                        let textRole = "";
                        switch(item.roles) {
                            case "1":
                            textRole = `<span style="color:red !important">Student</span>
                            <span> - </span>
                            <span>${item.fName} Department</span>`;
                            break;  
                            case "2":
                            textRole = `<span>Coordinator <i class="fa fa-wrench"></i></span>
                            <span> - </span>
                            <span class="role blue-role">${item.fName} Department</span>`;
                            break;  
                        }
                        console.log(textRole);
                        htmlList += `<div class="comment">
                        <div class="imgCmt">
                        <img src="${item.avatar}">
                        </div>
                        <div class="nameCmt">
                        <h4>${item.username} <br>`
                        + textRole + 
                        `<span class="time text-right"> ${new Date(item.cmtDate).toLocaleString()} </span>
                        </h4>
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
                var userRole = $("#userRole").val();
                var corId = $("#corId").val();
                $.ajax({
                    url: `/postModifyCmt`,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        content:content,
                        userId:userId,
                        mgzId:mgzId,
                        authorId:userId,
                        corId: corId
                    },
                    success: function(result) {
                        if(result.error) {
                            alert(result.error)
                        }
                        else {
                            let textRole = "";
                            switch(userRole) {
                                case "1":
                                textRole = `<span style="color:red !important">Student</span>
                                <span> - </span>
                                <span><?php echo $author['faculty'];?> Department</span>`;
                                break;  
                                case "2":
                                textRole = `<span>Coordinator <i class="fa fa-wrench"></i></span>
                                <span> - </span>
                                <span><?php echo $author['faculty'];?> Department</span>`;
                                break;  
                            }
                            htmlCmt = `<div class="comment">
                            <div class="imgCmt">
                            <img src="<?php echo $author['ava'];?>">
                            </div>
                            <div class="nameCmt">
                            <h4><?php echo $author['name'];?> <br>`
                            + textRole + 
                            `<span class="time text-right"> ${new Date().toLocaleString()} </span>                                              
                            </h4>
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