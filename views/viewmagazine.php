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
                        <a data-toggle="pill" href="#viewallmagazines">
                            <i class="fa fa-bars" aria-hidden="true"></i> View All Magaiznes
                        </a>
                    </li>
                    <li>
                        <a data-toggle="pill" href="#yourmagazine">
                            <!-- <i class="fa fa-bars" aria-hidden="true"></i> Your File -->
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
                    <!-- <a href="" class="dropdown-toggle" data-toggle="dropdown">Admin</a> -->
                    <ul>
                        <li class="icon-nvar">
                            <a href="#menu">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="active">
                            <img src="<?php echo $author['ava'];?>">
                        </li>
                        <li>
                            <!-- <a href=""><?php echo $author['name'] ?> <i class="fa fa-caret-down" aria-hidden="true"></a></i> -->
                        </li>
                    </ul>
                </div>
                <div class="menubarRight text-right hidden-xs hidden-sm">
                    <!-- <a href="" class="dropdown-toggle" data-toggle="dropdown">Admin</a> -->

                    <ul class="menu-logout">
                        <a href="/hnz-enterprise-project/" class="text-left goto" title="Go to Home page">
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
                            <!-- <a href=""><?php echo $author['name'];?> <i class="fa fa-caret-down" aria-hidden="true"> </a></i> -->
                            <ul class="logout">
                                <li>
                                    <a href="/hnz-enterprise-project/logout">Log out<i class="fa fa-sign-out" aria-hidden="true"></i></a>
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
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </div>
                            <div class="linkText">
                                <h4>View Magaizne</h4>
                                <p>Views</p>
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
                                            View Magazine
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="registerContent tab-content">
                    <div id="upload" class="registerContentForm">
                        <form name="uploadForm" id="uploadForm" method="post" enctype="multipart/form-data">  
                            <form name="uploadForm" id="uploadForm" method="post" enctype="multipart/form-data">  
                <div class="uploadFormMagazine">  
                    <div class="">
                        <div class="">
                           <div class="col-lg-2 col-md-2 hidden-xs hidden-sm">
                                <h4>Magazine</h4>
                            </div>
                           <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 contentmaganizeCroll">
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                 <div class="contentmaganize">
                                    <h3>Test title</h3>
                                    <img  src="assets/images/1544430890_622660_1544430994_noticia_normal.jpg">
                                    
                                    <p>
                                        You can also use the following javascript to close the modal by clicking outside of the modal content (and not just by using the "x" or "cancel" button to close it):
                                        You can also use the following javascript to close the modal by clicking outside of the modal content (and not just by using the "x" or "cancel" button to close it):
                                        You can also use the following javascript to close the modal by clicking outside of the modal content (and not just by using the "x" or "cancel" button to close it):
                                        You can also use the following javascript to close the modal by clicking outside of the modal content (and not just by using the "x" or "cancel" button to close it):
                                        You can also use the following javascript to close the modal by clicking outside of the modal content (and not just by using the "x" or "cancel" button to close it):
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row session3">
                <div class="col-lg-2 col-md-2 hidden-xs hidden-sm">
                    
                </div>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <h4>Comment</h4>
                    <div class="formCmt col-lg-12 col-md-12 col-sm-12 col-xs-12" id="formCmt">
                       <div class="comment">
                           <div class="imgCmt">
                               <img src="assets/images/user.png">
                           </div>
                           <div class="nameCmt">
                               <h4>Vu Van Tien <span>IT</span></h4>
                           </div>
                           <div class="contentCmt">
                               You can also use the following javascript to 
                           </div>
                       </div>
                       <div class="comment">
                           <div class="imgCmt">
                               <img src="assets/images/user.png">
                           </div>
                           <div class="nameCmt">
                               <h4>Vu Van Tien <span>IT</span></h4>
                           </div>
                           <div class="contentCmt">
                               You can also use the following javascript to 
                           </div>
                       </div>
                       <div class="comment">
                           <div class="imgCmt">
                               <img src="assets/images/user.png">
                           </div>
                           <div class="nameCmt">
                               <h4>Vu Van Tien <span>IT</span></h4>
                           </div>
                           <div class="contentCmt">
                               You can also use the following javascript to close 
                           </div>
                       </div>
                   </div>
                   <div class="YourFormcmt">
                    <div class="imgCmt">
                        <img src="<?php echo $author['ava'];?>">
                    </div>
                    <div class="contentCmt">
                        <textarea placeholder="Write your comment..." class="form-control" rows="5" required id="comment"></textarea>
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
    function validateMgz(form, event) {
        $("#ErrorMsg").html("");
        event.preventDefault();
        formData = new FormData($("#uploadForm")[0]);
        $.ajax({
            url: `/hnz-enterprise-project/postMgz`,
            type: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            success: function(result){
                if (result == '"success"') {
                    alert("Magazine successfully uploaded!");
                    location.reload();
                }
                else {
                    $("#ErrorMsg").html(result);
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
            url: `/hnz-enterprise-project/loadComments?mgzId=${mgzId}`,
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
                    url: `/hnz-enterprise-project/postModifyCmt`,
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
</script>

<script type="text/javascript" src="assets/js/slick.js"></script>
<script type="text/javascript" src="assets/js/slick.min.js"></script>
<script type="text/javascript" src="assets/js/index.js"></script>
<script type="text/javascript" src="assets/mmenu/mmenu/jquery.mmenu.all.js"></script>
</body>

</html> 