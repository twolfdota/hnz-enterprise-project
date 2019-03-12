<?php

include 'route.php';

$route = new Route();
//Thêm các đường dẫn load trang tĩnh vào đây
$route->add('/', function () {
    include_once './views/home.php';
});

$route->add('/register', function () {
    include_once './views/register.php';
});
$route->add('/student', function () {
    include_once './views/student.php';
});

$route->add('/login', function () {
    include_once './views/login.php';
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
    include_once './views/login.php';
    include './controllers/userController.php';

    $userCtrl = new userCtrl();
    $email = $_POST["email"];
    $pass = $_POST["password"];
    if (isset($_POST['login-form'])) {
        if ($email != null && $pass != null) {
            $num_of_rows = $userCtrl->check($email, $pass);
            if ($num_of_rows > 0) {
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

$route->add('/student', function () {
    include_once './views/student.php';
    include './controllers/magazineController.php';
    include './controllers/imgController.php';
    $imgCtrl = new imgCtrl();
    $magazineCtrl = new magazineCtrl();
    $title = $_POST["title"];
    if (isset($_POST["form-upload"])) {
        if (!$_POST["agree"]) {
            echo '<script>alert("You must agree with the terms!")</script>';
        } else if ($title == "") {
            echo '<script>alert("Please input the title!!")</script>';
        } else if (!$_FILES["doc"]["name"]) {
            echo '<script>alert("Please upload your document!!")</script>';
        } else {
            $img_dir = 'uploads/mgzImg/';
            $doc_dir = 'uploads/doc/';
            $avaDir = 'assets/images/no-cover.png';
            if ($_FILES["input-file-preview"]["name"]) {
                $img_target_file = $img_dir . basename($_FILES["input-file-preview"]["name"]);
                $imageFileType = strtolower(pathinfo($img_target_file, PATHINFO_EXTENSION));
                $avaDir = $img_dir . $title . '.' . $imageFileType;
            }
            $doc_target_file = $doc_dir . basename($_FILES["doc"]["name"]);
            $docFileType = strtolower(pathinfo($doc_target_file, PATHINFO_EXTENSION));
            $docDir = $doc_dir . $title . '.' . $docFileType;
            $validated = $magazineCtrl->add($title, $docDir, $avaDir);
            if ($validated) {
                $imgCtrl->addImg($img_dir, $title, $doc_dir, $title);
            } else {
                echo '<script>alert("Cannot upload magazine!")</script>';
            }
        }
    }
});

$route->submit();
