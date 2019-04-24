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

$route->add('/postdetail', function () {
    session_start();
    if (isset($_SESSION['login'])) {
        include './controllers/userController.php';
        $userCtrl = new userCtrl();
        $author = $userCtrl->authorize();
        include_once './views/postdetail.php';

    }
    else {
        header("Location:login");
        exit();
    }
});

$route->add('/viewmagazine', function () {
    session_start();
    if (isset($_SESSION['login'])) {
        include './controllers/userController.php';
        $userCtrl = new userCtrl();
        $author = $userCtrl->authorize();
        if($author['role'] == 2){
            include_once './views/viewmagazine.php';
        }
        else {
            return;
        }
    }
    else {
        header("Location:login");
        exit();
    }
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
    $rawRes = $cmtCtrl->getListModifyCmt($_GET['mgzId']);
    echo json_encode($rawRes);
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

$route->add('/downloadZip', function(){
$zipname = $_GET['year'].'.zip';
// Initialize archive object
$rootPath = realpath('./uploads/' . $_GET['year']);

// Initialize archive object
$zip = new ZipArchive();
$zip->open($zipname, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();
  
    header('Content-Type: application/zip');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-Disposition: attachment; filename=\"".$_GET['year'].".zip" ."\"");
    header('Content-Length: ' . filesize($zipname));

    readfile(realpath('./'.$zipname));
    unlink(realpath('./'.$zipname));
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
    $magazineCtrl = new magazineCtrl();
    include './controllers/yearController.php';
    $yearCtrl = new yearCtrl();
    $currYearInfo = $yearCtrl->loadThisYear();
    $now = new DateTime();
    if (count($currYearInfo) <=0 || new DateTime($currYearInfo[0]->std) > $now || new DateTime($currYearInfo[0]->dl1) < $now) {
        echo json_encode('upload time expired!');
    }
    else {
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
            $img_dir = 'uploads/'.date("Y").'//mgzImg/';
            $doc_dir = 'uploads/'.date("Y").'//doc/';
            $avaDir = 'assets/images/no-cover.png';

                $img_target_file = $img_dir . basename($_FILES["imageUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($img_target_file, PATHINFO_EXTENSION));
                $avaDir = $img_dir . $title . '.' . $imageFileType;

            $doc_target_file = $doc_dir . basename($_FILES["doc"]["name"]);
            $docFileType = strtolower(pathinfo($doc_target_file, PATHINFO_EXTENSION));
            $docDir = $doc_dir . $title . '.' . $docFileType;
            $addResult= $magazineCtrl->add($title, $docDir, $avaDir, $_POST['userid']);
            if ($addResult->validated) {
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
                        $message = '<!DOCTYPE html><html><body>A student uploaded a new magazine just now, check it out in your <a href="localhost/hnz-enterprise-project/viewmagazine?mgzId='.$addResult->insertId.'">cms</a>.<hr/> This is automatic message, please dont reply.<body></html>';
                        $headers = 'From: yearlymagazinesys@gmail.com' . "\r\n" .
                        'Content-type: text/html' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                        mail($to, $subject, $message, $headers);
                        include './controllers/notiController.php';
                        $notiCtrl = new notiCtrl();
                        $notiCtrl->createNoti($addResult->insertId, 'create', $_POST['userid'], $_POST['corId']);                        
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
}
});

$route->add('/updateMgz', function () {
    include './controllers/magazineController.php';
    $magazineCtrl = new magazineCtrl();

    include './controllers/yearController.php';
    $yearCtrl = new yearCtrl();
    $currYearInfo = $yearCtrl->loadThisYear();
    $now = new DateTime();
    if (count($currYearInfo) <=0 || new DateTime($currYearInfo[0]->std) > $now || new DateTime($currYearInfo[0]->dl2) < $now) {
        echo json_encode('Editing time expired!');
    }
    else {
    $updated = false;
    if (isset($_POST["title"])) {
        $title = $_POST["title"];
        if ($title == "") {
            echo json_encode('Please input the title!!');
        }
        else {
        $img_dir = 'uploads/'.date("Y").'/mgzImg/';
        $doc_dir = 'uploads/'.date("Y").'/doc/';
        $docDir = $doc_dir . $title.'.' . $_POST['oldDocType'];
        $imgDir = $img_dir. $title.'.' . $_POST['oldImgType'];
        $magazineCtrl->update($title, $imgDir, $docDir, $_POST['mgzId']);
        if ($title != $_POST['oldTitle']) {
            rename('./'. $img_dir . $_POST['oldTitle'].'.' . $_POST['oldImgType'], './'. $img_dir . $title.'.' . $_POST['oldImgType']);
            rename('./' .$doc_dir. $_POST['oldTitle'].'.' . $_POST['oldDocType'], './'.$doc_dir. $title.'.' . $_POST['oldDocType']);
            $updated = true;
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
                    $updated = true;

                    echo json_encode('doc updated!');
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
                    $updated = true;
                    echo json_encode('Image updated!');
                } else {
                    echo json_encode('Error uploading image file!!!');
                }
            }
        } 
        if($updated) {
            include './controllers/notiController.php';
            $notiCtrl = new notiCtrl();
            @$notiCtrl->createNoti($_POST['mgzId'], 'update', $_POST['userid'], $_POST['corId']);   
        }
    }
    } else {
        echo json_encode("please input title!!!");
    }
}
});

$route->add('/postModifyCmt', function(){
    include './controllers/cmtController.php';
    $cmtCtrl = new cmtCtrl();
    $cmtCtrl->addModifyCmt($_POST["content"], $_POST["userId"], $_POST["mgzId"], $_POST['authorId'], $_POST['corId']);
});

$route->add('/postPublicCmt', function(){
    include './controllers/cmtController.php';
    $cmtCtrl = new cmtCtrl();
    $cmtCtrl->addPublicCmt($_POST["content"], $_POST["userId"], $_POST["mgzId"]);
});

$route->add('/logout', function() {
    session_start();
    unset($_SESSION['login']);
    header("Location: login");
    exit;
});

$route->add('/deleteMgz', function() {
    include './controllers/magazineController.php';
    $magazineCtrl = new magazineCtrl();
    $magazineCtrl->removeMagazine($_GET['mgzId'], $_GET['deletor']);

});

$route->add('/approveMgz', function() {
    include './controllers/magazineController.php';
    $magazineCtrl = new magazineCtrl();
    $magazineCtrl->approveMagazine($_GET['mgzId'], $_GET['publisher']);

});

$route->add('/deleteNoti', function() {
    include './controllers/notiController.php';
    $notiCtrl = new notiCtrl();
    $condition = "mgzId = '" .$_POST['mgzId']. "' and receiverId = '". $_POST['userId']."'";
    $notiCtrl->removeNoti($condition);
});

$route->submit();
