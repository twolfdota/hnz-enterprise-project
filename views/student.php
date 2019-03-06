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
                        <a data-toggle="pill" href="#register">
                            <i class="fa fa-bars" aria-hidden="true"></i> Registration
                        </a>
                    </li>
                    <li>
                        <a data-toggle="pill" href="#academic">
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
                        <a data-toggle="pill" href="#academic">
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
                        <div class="uploadFrame">
                            <a href="#"  onclick="document.getElementById('id01').style.display='block'">
                                <img  src="assets/images/upload_file-512.png">
                            </a>
                            <p>You can drag and drop files here to add them.</p>
                        </div>
                    </div>
                    <div id="id01" class="modal">

                      <form class="modal-content animate" action="/action_page.php">
                        <div class="imgcontainer">
                          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                      </div>

                      <div class="" style="width: 700px;margin:auto;">
                          <div class="row">    
                            <div class="">  
                                <!-- image-preview-filename input [CUT FROM HERE]-->
                                <div class="image-preview">
                                    <div class="row">
                                        <div>
                                            <input type="file" name="">
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                                             <input type="checkbox" autocomplete="off" checked>
                                         </div>
                                         <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                                             <p>Chấp nhận điều khoản</p>
                                         </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-4 col-xs-6">
                                            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                            <div class="btn btn-default image-preview-input">
                                                <i class="fa fa-folder-open" aria-hidden="true"></i>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /input-group image-preview [TO HERE]--> 
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="academic" class="registerContentForm tab-pane fade">
                        <!-- <form name="yearForm" id="yearForm">
                            <div class="title">
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
                        </form> -->
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
                    url: `/hnz-enterprise-project/vldEmail`,
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
                        url: `/hnz-enterprise-project/createUser`,
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
                url: `/hnz-enterprise-project/editDeadlines`,
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
                url: `/hnz-enterprise-project/loadYear`,
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    console.log(new Date(result[0].dl1).formatted());
                    if (result[0]) {
                        document.yearForm.yearName.value = result[0].yearName;
                        document.yearForm.startDate.defaultValue = new Date(result[0].std).formatted();
                        document.yearForm.deadline.defaultValue = new Date(result[0].dl1).formatted();
                        document.yearForm.finalDeadline.defaultValue = new Date(result[0].dl2).formatted();
                    }
                }
            })
            //load danh sách khoa, lọc ra số khoa đã có coordinator
            $.ajax({
                url: `/hnz-enterprise-project/loadFaculty`,
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
    var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
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