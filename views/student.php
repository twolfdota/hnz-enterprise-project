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
                        <a data-toggle="pill" href="#">
                            <i class="fa fa-bars" aria-hidden="true"></i> Registration
                        </a>
                    </li>
                    <li>
                        <a data-toggle="pill" href="#">
                            <i class="fa fa-bars" aria-hidden="true"></i> Academic Year's Event Information
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="mainMenu hidden-xs hidden-sm">
            <div class="logoTeam">
                <a href="index.html">
                    <img src="assets/images/logo.png">
                </a>
                <a href="">Vu Van Tien</a>
            </div>
            <div class="Navigation">
                <h4>Navigation</h4>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a data-toggle="pill" href="#upload">
                            <i class="fa fa-bars" aria-hidden="true"></i> Upload File
                        </a>
                    </li>
                    <li>
                        <a data-toggle="pill" href="#yourmagazine">
                            <i class="fa fa-bars" aria-hidden="true"></i> Your File
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mainForm">
            <div class="menubar">
                <div class="menubarRight text-right hidden-md hidden-lg">
                    <!-- <a href="" class="dropdown-toggle" data-toggle="dropdown">Admin</a> -->
                    <ul>
                        <li class="icon-nvar">
                            <a href="#menu">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="active">
                            <img src="assets/images/avatar-4.jpg">
                        </li>
                        <li>
                            <a href="">Admin <i class="fa fa-caret-down" aria-hidden="true"></a></i>
                        </li>
                    </ul>
                </div>
                <div class="menubarRight text-right hidden-xs hidden-sm">
                    <!-- <a href="" class="dropdown-toggle" data-toggle="dropdown">Admin</a> -->
                    <ul>
                        <li class="full hidden-xs hidden-sm">
                            <a href="#">
                                <i onclick="openFullscreen();" class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="active">
                            <img src="assets/images/avatar-4.jpg">
                        </li>
                        <li>
                            <a href="">Admin <i class="fa fa-caret-down" aria-hidden="true"></a></i>
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
                                <h4>Registration</h4>
                                <p>Hello</p>
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
                                            Registration
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
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
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
                                       <input type="checkbox" autocomplete="off" checked>
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
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                           <input " class="btnSubmit" type="submit" name="form-upload" value="Upload">
                       </div>
                   </div>

                   </div><!-- /input-group image-preview [TO HERE]--> 
               </div>
           </form>
       </div>
       <div id="yourmagazine" class="registerContentForm tab-pane fade">
        <div>
            <div class="row col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <div class="well well-sm text-center">

                    <h3>View by Status</h3>
                    
                    <div class="btn-group" data-toggle="buttons">
                        
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
                    
                    </div>
                </div>
            </div>
            <div class="row col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Name Magazine</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                        <tr>
                            <td>1</td>
                            <td>News</td>
                            <td class="imgPost">
                                <img src="assets/images/1544430890_622660_1544430994_noticia_normal.jpg">
                            </td>
                            <td>News Cate</td>
                            <td>Approved</td>
                            <td class="">
                                <a onclick="document.getElementById('update').style.display='block'" class='btn btn-info btn-xs' href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> 
                                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i> Delete</a>
                                <a href="#" class="btn btn-warning btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                            </td>
                         </tr>
                         <tr>
                            <td>1</td>
                            <td>News</td>
                            <td class="imgPost">
                                <img src="assets/images/1544430890_622660_1544430994_noticia_normal.jpg">
                            </td>
                            <td>News Cate</td>
                            <td>Sending</td>
                            <td class="">
                                <a onclick="document.getElementById('update').style.display='block'" class='btn btn-info btn-xs' href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> 
                                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i> Delete</a>
                                <a href="#" class="btn btn-warning btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                            </td>
                         </tr>
                         <tr>
                            <td>1</td>
                            <td>News</td>
                            <td class="imgPost">
                                <img src="assets/images/1544430890_622660_1544430994_noticia_normal.jpg">
                            </td>
                            <td>News Cate</td>
                            <td>Cannel</td>
                            <td class="">
                                <a onclick="document.getElementById('update').style.display='block'" class='btn btn-info btn-xs' href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> 
                                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i> Delete</a>
                                <a href="#" class="btn btn-warning btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                            </td>
                         </tr>
                </table>
                </div>
        </div>
        <div id="update" class="modal">
  
          <div class="modal-content animate" action="/action_page.php">
            <span onclick="document.getElementById('update').style.display='none'" class="close" title="Close Modal">&times;</span>
            <form name="uploadForm" id="uploadForm" method="post" enctype="multipart/form-data">  
                            <div class="uploadForm">  
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
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
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
                                    <h4>Comment</h4>
                                   <div class="formCmt">
                                       <div class="comment">
                                           <div class="imgCmt">
                                               <img src="assets/images/user.png">
                                           </div>
                                           <div class="nameCmt">
                                               <h4>Vu Van Tien</h4>
                                           </div>
                                           <div class="contentCmt">
                                               You can also use the following javascript to close the modal by clicking outside of the modal content (and not just by using the "x" or "cancel" button to close it):
                                           </div>
                                       </div>
                                       <div class="comment">
                                           <div class="imgCmt">
                                               <img src="assets/images/user.png">
                                           </div>
                                           <div class="nameCmt">
                                               <h4>Vu Van Tien</h4>
                                           </div>
                                           <div class="contentCmt">
                                               You can also use the following javascript to close the modal by clicking outside of the modal content (and not just by using the "x" or "cancel" button to close it):
                                           </div>
                                       </div>
                                       <div class="comment">
                                           <div class="imgCmt">
                                               <img src="assets/images/user.png">
                                           </div>
                                           <div class="nameCmt">
                                               <h4>Vu Van Tien</h4>
                                           </div>
                                           <div class="contentCmt">
                                               You can also use the following javascript to close the modal by clicking outside of the modal content (and not just by using the "x" or "cancel" button to close it):
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                           <input " class="btnSubmit" type="submit" name="form-upload" value="Update">
                       </div>
                   </div>

                   </div><!-- /input-group image-preview [TO HERE]--> 
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
</script>

<script type="text/javascript" src="assets/js/slick.js"></script>
<script type="text/javascript" src="assets/js/slick.min.js"></script>
<script type="text/javascript" src="assets/js/index.js"></script>
<script type="text/javascript" src="assets/mmenu/mmenu/jquery.mmenu.all.js"></script>
</body>

</html> 