<?php

include 'route.php';

$route = new Route();
//Thêm các đường dẫn load trang tĩnh vào đây
$route->add('/', function () {
    include_once './views/home.php';
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
            $img_dir = 'uploads/mgzImg/';
            $doc_dir = 'uploads/doc/';
            $avaDir = 'assets/images/no-cover.png';

                $img_target_file = $img_dir . basename($_FILES["imageUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($img_target_file, PATHINFO_EXTENSION));
                $avaDir = $img_dir . $title . '.' . $imageFileType;

            $doc_target_file = $doc_dir . basename($_FILES["doc"]["name"]);
            $docFileType = strtolower(pathinfo($doc_target_file, PATHINFO_EXTENSION));
            $docDir = $doc_dir . $title . '.' . $docFileType;
            $validated = $magazineCtrl->add($title, $docDir, $avaDir, $_POST['userid']);
            if ($validated) {
                $imgCtrl->addImg($img_dir, $title, $doc_dir, $title);
            } else {
                echo 'Cannot upload magazine!';
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
