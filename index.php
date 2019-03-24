<?php

include 'route.php';

$route = new Route();
//Thêm các đường dẫn load trang tĩnh vào đây
$route->add('/', function () {
    session_start();
    if (isset($_SESSION['login'])) {
        include './controllers/userController.php';
        $userCtrl = new userCtrl();
        $author = $userCtrl->authorize();
        include_once './views/home.php';

    }
    else {
        header("Location:login");
        exit();
    }
});
$route->add('/coordinator', function () {
    include_once './views/coordinator.php';
});
$route->add('/cms', function () {
    session_start();
    if (isset($_SESSION['login'])) {
        include './controllers/userController.php';
        $userCtrl = new userCtrl();
        $author = $userCtrl->authorize();
        switch($author['role']){
            case 1:
                include_once './views/student.php';
                break;
            case 2:
                include_once './views/coordinator.php';
                break;
            case 3:
                header("/");
                exit();
            default:
                include_once './views/admin.php';
        }
    }
    else {
        header("Location:login");
        exit();
    }

});



//Thêm các đường dẫn load dữ liệu đầu trang vào đây (thường dùng GET)
$route->add('/loadFaculty', function () {

    include './controllers/facultyController.php';
    $facultyCtrl = new facultyCtrl();
    $facultyCtrl->loadFalcuty();
});


$route->add('/loadYear', function () {

    include './controllers/yearController.php';
    $yearCtrl = new yearCtrl();
    $yearCtrl->loadYear();
});

$route->add('/loadComments', function(){
    include './controllers/cmtController.php';
    $cmtCtrl = new cmtCtrl();
    $cmtCtrl->getListModifyCmt($_GET['mgzId']);
});

$route->add('/downloadDocs', function(){
    $file_url = './' . $_GET['docLink'];
    header("Cache-Control: no-cache, must-revalidate"); 
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
    header('Content-Type: application/msword');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
    readfile($file_url);
});


//Thêm các đường dẫn validate hoặc add, update dữ liệu vào đây (thường dùng POST)
$route->add('/editDeadlines', function () {
    include './controllers/yearController.php';
    $yearCtrl = new yearCtrl();
    $yearCtrl->editYear();
});

$route->add('/vldEmail', function () {

    include './controllers/userController.php';
    $userCtrl = new userCtrl();
    $userCtrl->validateEmail();
});

$route->add('/createUser', function () {

    include './controllers/userController.php';
    $userCtrl = new userCtrl();
    $userCtrl->create();
});

$route->add('/login', function () {
        session_start();
    if(isset($_SESSION['login'])) {
        header("Location:index.php");
        exit();
    }
    include_once './views/login.php';
    include './controllers/userController.php';

    $userCtrl = new userCtrl();

    if (isset($_POST['login-form'])) {
        $email = $_POST["email"];
        $pass = $_POST["password"];
        if ($email != null && $pass != null) {
            $res = $userCtrl->check($email, $pass);
            if (count($res) > 0) {
                $_SESSION['login'] = $email;

                header("Location: index.php");
                exit;
            } else {
                echo '<script>alert("invalid username or password")</script>';
            }
        } else {
            echo '<script>alert("please fill in the forms!")</script>';
        }
    }
});

$route->add('/postMgz', function () {
    include './controllers/magazineController.php';
    include './controllers/imgController.php';
    $imgCtrl = new imgCtrl();
    $magazineCtrl = new magazineCtrl();

    if (isset($_POST["title"])) {
        $title = $_POST["title"];
        $vldAgree = isset($_POST["agree"]) ? $_POST["agree"] : false;
        if (!$vldAgree) {
            echo json_encode('You must agree with the terms!');
        } else if ($title == "") {
            echo json_encode('Please input the title!!');
        } else if ($_FILES['doc']['name'] == "") {
            echo json_encode('Please upload your document!!');
        } else if ($_FILES['imageUpload']['name'] == "") {
                echo json_encode('Please upload your image!!');
        }
        else {
            $img_dir = 'uploads/'.date("Y").'/mgzImg/';
            $doc_dir = 'uploads/'.date("Y").'/doc/';
            $avaDir = 'assets/images/no-cover.png';

                $img_target_file = $img_dir . basename($_FILES["imageUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($img_target_file, PATHINFO_EXTENSION));
                $avaDir = $img_dir . $title . '.' . $imageFileType;

            $doc_target_file = $doc_dir . basename($_FILES["doc"]["name"]);
            $docFileType = strtolower(pathinfo($doc_target_file, PATHINFO_EXTENSION));
            $docDir = $doc_dir . $title . '.' . $docFileType;
            $validated = $magazineCtrl->add($title, $docDir, $avaDir, $_POST['userid']);
            if ($validated) {
                $uploadOk = 1;
                $target_img = $img_dir . basename($_FILES["imageUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_img, PATHINFO_EXTENSION));
                $target_doc = $doc_dir . basename($_FILES["doc"]["name"]);
                $docFileType = strtolower(pathinfo($target_doc, PATHINFO_EXTENSION));
        
        // Check if file already exists
        
        // Check file size
                if ($_FILES["imageUpload"]["size"] > 1000000 && $_FILES["doc"]["size"] > 1000000) {
                    echo json_encode('Your file is too large!!');
                    $uploadOk = 0;
                }
        // Allow certain file formats
                if ($docFileType != "doc" && $docFileType != "docx") {
                    echo json_encode("Wrong file format.");
                    $uploadOk = 0;
                }
        // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $magazineCtrl->delete($title);
                    echo json_encode('Your file is not uploaded!!');
        // if everything is ok, try to upload file
                } else {
                    
                    if (move_uploaded_file($_FILES["doc"]["tmp_name"], $doc_dir . $title. '.' . $docFileType)&& move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $img_dir . $title. '.' . $imageFileType)) {
                        $info = $magazineCtrl->getMailInfo($_POST['userid']);
                        $to      = $info->email;
                        $subject = 'New magazine "'.$title.'" submitted to ' .$info->faculty. ' Department';
                        $message = 'A student uploaded a new magazine just now. This is automatic message, please dont reply.';
                        $headers = 'From: webmaster@example.com' . "\r\n" .
                        'Reply-To: webmaster@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                        mail($to, $subject, $message);
                        echo json_encode('upload successfully!');
                    } else {
                        $magazineCtrl->delete($title);
                        echo json_encode('Error uploading file!!!');
                    }
                }
            } else {
                echo 'Cannot upload magazine!';
            }
        }
    } else {
        echo json_encode("please input title!!!");
    }
});

$route->add('/updateMgz', function () {
    include './controllers/magazineController.php';
    include './controllers/imgController.php';
    $imgCtrl = new imgCtrl();
    $magazineCtrl = new magazineCtrl();

    if (isset($_POST["title"])) {
        $title = $_POST["title"];
        if ($title == "") {
            echo json_encode('Please input the title!!');
        }
        $img_dir = 'uploads/'.date("Y").'/mgzImg/';
        $doc_dir = 'uploads/'.date("Y").'/doc/';
        $docDir = $doc_dir . $title.'.' . $_POST['oldDocType'];
        $imgDir = $img_dir. $title.'.' . $_POST['oldImgType'];
        $magazineCtrl->update($title, $imgDir, $docDir, $_POST['mgzId']);
        if ($title != $_POST['oldTitle']) {
            rename('./'. $img_dir . $_POST['oldTitle'].'.' . $_POST['oldImgType'], './'. $img_dir . $title.'.' . $_POST['oldImgType']);
            rename('./' .$doc_dir. $_POST['oldTitle'].'.' . $_POST['oldDocType'], './'.$doc_dir. $title.'.' . $_POST['oldDocType']);
        } 
        if ($_FILES['doc']['name']) {
            $doc_target_file = $doc_dir . basename($_FILES["doc"]["name"]);
            $docFileType = strtolower(pathinfo($doc_target_file, PATHINFO_EXTENSION));
            $docDir = $doc_dir . $title . '.' . $docFileType;
            $docUploadOk = 1;
            if ($_FILES["doc"]["size"] > 1000000) {
                echo json_encode('Your file is too large!!');
                $docUploadOk = 0;
            }
    // Allow certain file formats
            if ($docFileType != "doc" && $docFileType != "docx") {
                echo json_encode("Wrong file format.");
                $docUploadOk = 0;
            }
    // Check if $uploadOk is set to 0 by an error
            if ($docUploadOk == 0) {
                echo json_encode('Your doc is not updated!!');
    // if everything is ok, try to upload file
            } else {
                unlink($doc_dir . $_POST['oldTitle'] .'.'.$_POST['oldDocType']); 
                if (move_uploaded_file($_FILES["doc"]["tmp_name"], $doc_dir . $title. '.' . $docFileType)) {
                    
                    $magazineCtrl->update($title, $imgDir, $docDir, $_POST['mgzId']);
                    echo json_encode('doc file updated successfully!');
                } else {
                    echo json_encode('Error uploading doc file!!!');
                }
            }
        } 
        if ($_FILES['imageUpload']['name']) {
            $img_target_file = $img_dir . basename($_FILES["imageUpload"]["name"]);
            $imgFileType = strtolower(pathinfo($img_target_file, PATHINFO_EXTENSION));
            $imgDir = $img_dir . $title . '.' . $imgFileType;
            $imgUploadOk = 1;
            if ($_FILES["imageUpload"]["size"] > 1000000) {
                echo json_encode('Your file is too large!!');
                $imgUploadOk = 0;
            }
    // Allow certain file formats
            if ($imgFileType != "png" && $imgFileType != "jpg" && $imgFileType != "jpeg" && $imgFileType != "svg") {
                echo json_encode("Wrong file format.");
                $imgUploadOk = 0;
            }
    // Check if $uploadOk is set to 0 by an error
            if ($imgUploadOk == 0) {
                echo json_encode('Your image is not updated!!');
    // if everything is ok, try to upload file
            } else {
                unlink($img_dir . $_POST['oldTitle'].'.'. $_POST['oldImgType']); 
                if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $img_dir . $title. '.' . $imgFileType)) {
                    
                    $magazineCtrl->update($title, $imgDir, $docDir, $_POST['mgzId']);
                    echo json_encode('Image file updated successfully!');
                } else {
                    echo json_encode('Error uploading image file!!!');
                }
            }
        } 
    } else {
        echo json_encode("please input title!!!");
    }
});

$route->add('/postModifyCmt', function(){
    include './controllers/cmtController.php';
    $cmtCtrl = new cmtCtrl();
    $cmtCtrl->addModifyCmt($_POST["content"], $_POST["userId"], $_POST["mgzId"]);
});

$route->add('/logout', function() {
    session_start();
    unset($_SESSION['login']);
    header("Location: login");
    exit;
});

$route->submit();
