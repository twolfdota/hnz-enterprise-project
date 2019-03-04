<?php

include 'route.php';

$route = new Route();

$route->add('/', function () {
    include_once './views/home.php';
});

$route->add('/cms', function () {
    include_once './views/register.php';
});

$route->add('/loadFaculty', function () {
    require_once './DBConnect.php';
    $sql1 = "select * from faculty";

    $sql2 = "select * from faculty where code not in (select faculty from `user` as t1 inner join faculty as t2 on t1.faculty = t2.code where `roles`=2)";

    $result1 = array();
    $result2 = array();
    $stmt = $conn->prepare($sql1);
    $stmt->execute();
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows > 0) {
        $stmt->bind_result($id, $name, $code);
        while ($stmt->fetch()) {
            $resItem = (object)[
                'id' => $id,
                'name' => $name,
                'code' => $code
            ];
            array_push($result1, $resItem);
        }
        $stmt->free_result();
        $stmt->close();
    }
    $stmt1 = $conn->prepare($sql2);
    $stmt1->execute();
    $stmt1->store_result();
    $num_of_rows = $stmt1->num_rows;
    if ($num_of_rows > 0) {
        $stmt1->bind_result($id, $name, $code);
        while ($stmt1->fetch()) {
            $resItem = (object)[
                'id' => $id,
                'name' => $name,
                'code' => $code
            ];
            array_push($result2, $resItem);
        }
        $stmt1->free_result();
        $stmt1->close();
    }

    $result = (object)[
        'allFC' => $result1,
        'leftFC' => $result2,
        'status'  => 'success'
    ];
    $jsonresult = json_encode($result);
    echo $jsonresult;
});


$route->add('/createUser', function () {
    require_once './DBConnect.php';
    $name = $_POST["name"];
    $pass = $_POST["password"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $input_date = $_POST['dob'];
    $dob = date("Y-m-d", strtotime($input_date));
    $role = (int)$_POST["role"];
    $faculty = $_POST["faculty"];

    $sql = "insert into user(roles, faculty, `name`, dob, phone, email, `password`, avatar) values(?,?,?,?,?,?,?,'assets/img/anonymous.png')";
    $stmt = $conn->prepare($sql);
    $salt = "124$@=+YJQ123";
    $token = hash("sha1", $pass . $salt);
    $stmt->bind_param("issssss", $role, $faculty, $name, $dob, $phone, $email, $token);
    $stmt->execute();
    if (mysqli_error($conn)) {
        echo mysqli_error($conn);
    } else {
        switch ($role) {
            case 1:
                $stdID = $faculty . str_pad($conn->insert_id, 5, '0', STR_PAD_LEFT);
                $result = (object)[
                    'role' => 'Student',
                    'faculty' => $faculty,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'dob' => $input_date,
                    'stdID' => $stdID
                ];
                $jsonresult = json_encode($result);
                echo $jsonresult;
                break;
            case 2:
                $result = (object)[
                    'role' => 'Coordinator',
                    'faculty' => $faculty,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'dob' => $input_date
                ];
                $jsonresult = json_encode($result);
                echo $jsonresult;
                break;
            case 3:
                $result = (object)[
                    'role' => 'Guest',
                    'faculty' => $faculty,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'dob' => $input_date
                ];
                $jsonresult = json_encode($result);
                echo $jsonresult;
                break;
        }
    }
    $conn->close();
});


$route->add('/editDeadlines', function () {
    require_once './DBConnect.php';
    $input_sdate = $_POST['startDate'];
    $startDate = date("Y-m-d H:i:s", strtotime($input_sdate));
    $input_edate = $_POST['deadline'];
    $endDate = date("Y-m-d H:i:s", strtotime($input_edate));
    $input_fdate = $_POST['finalDeadline'];
    $finalDate = date("Y-m-d H:i:s", strtotime($input_fdate));
    $sql = "select * from academic_year where `year` =  YEAR(now())";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows > 0) {
        $sql = "update academic_year set start_date = ?, end_date = ?, final_closure_date = ? where `year` = YEAR(now())";
    } else {
        $sql = "insert into academic_year(`year`,start_date, end_date, final_closure_date) values (YEAR(now()),?,?,?)";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $startDate, $endDate, $finalDate);
    $stmt->execute();
    if (mysqli_error($conn)) {
        echo '{"status":"error", "message": "Internal server error!"}';
    } else {
        echo '{"status":"success"}';
    }
    $conn->close();
});


$route->add('/loadYear', function () {
    require_once './DBConnect.php';
    $sql = "select * from academic_year where `year` =  YEAR(now())";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    $result = array();
    if ($num_of_rows > 0) {
        $stmt->bind_result($id, $year, $startDate, $end_date, $final_closure_date);
        while ($stmt->fetch()) {
            $resItem = (object)[
                'std' => $startDate,
                'dl1' => $end_date,
                'dl2' => $final_closure_date
            ];
            array_push($result, $resItem);
        }
        $stmt->free_result();
        $stmt->close();
    } 
    if (mysqli_error($conn)) {
        echo '{"status":"error", "message": "Internal server error!"}';
    } else {
        $jsonresult = json_encode($result);
        echo $jsonresult;
    }
    $conn->close();
});

$route->add('/vldEmail', function () {
    require_once './DBConnect.php';
    $sql = "select email from user";
    $result = array();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    if ($num_of_rows > 0) {
        $stmt->bind_result($email);
        while ($stmt->fetch()) {
            array_push($result, $email);
        }

        $stmt->free_result();
        $stmt->close();
    }
    $jsonresult = json_encode($result);
    echo $jsonresult;
});
/* 
$route->add('/login', function() {
    include_once './views/pages/login.php';
    include './controllers/userController.php';

    $userCtrl = new userCtrl();
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    if (isset($_POST['login-form'])) {
        if ($name != NULL && pass != NULL) {
            $num_of_rows = $userCtrl->check($name, $pass);
            if ($num_of_rows > 0 && !isset($_POST['rmb'])) {
                $_SESSION['login'] = $name;

                header("Location: index.php");
                exit;
            } else if ($num_of_rows > 0 && isset($_POST['rmb'])) {
                setcookie("login", $name, time() + (86400 * 30), "/");
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

$route->add('/create', function() {
    include_once './views/pages/create.php';
    include './controllers/userController.php';
    include './controllers/imgController.php';
    $imgCtrl = new imgCtrl();
    $userCtrl = new userCtrl();
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $dep = (int) $_POST["dep"];
    echo $dep;
    if (isset($_POST["add"])) {
        $target_dir = 'uploads/user-avatar/';
        $ava = null;
        if ($_FILES["fileToUpload"]["name"]) {
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $ava = $target_dir . $name . '.' . $imageFileType;
        }
        echo $ava;
        $validated = $userCtrl->add($name, $pass, $dep, $ava);
        if ($validated) {
            $imgCtrl->addImg($target_dir, $name);
        }
    }
});

$route->add('/logout', function() {
    unset($_COOKIE['login']);
    setcookie('login', null, time() - 86400 * 30, '/');
    session_start();
    unset($_SESSION['login']);
    header("Location: login");
    exit;
});


$route->add('/record-new', function() {
    include_once './views/pages/recordorder.php';
});

$route->add('/search-product', function() {
    include './controllers/productController.php';
    $productCtrl = new productCtrl();
    $productCtrl->search($_GET['term']);
});

$route->add('/search-staff', function() {
    include './controllers/userController.php';
    $userCtrl = new userCtrl();
    $userCtrl->search($_GET['term']);
});

$route->add('/add-order', function() {
    include './controllers/orderController.php';
    $orderCtrl = new orderCtrl();
    session_start();
    $username = isset($_SESSION['login']) ? $_SESSION['login'] : $_COOKIE['login'];
    $detail = json_decode(stripslashes($_REQUEST['data']));
    $orderCtrl->addOrder($username, $detail);
});

$route->add('/confirm-order', function() {
    include './controllers/orderController.php';
    $orderCtrl = new orderCtrl();
    $orderCtrl->finishOrder($_GET['id']);
});

$route->add('/cancel-order', function() {
    include './controllers/orderController.php';
    $orderCtrl = new orderCtrl();
    $orderCtrl->cancelOrder($_GET['id']);
});

$route->add('/manage-order', function() {
    include_once './views/pages/manageorder.php';
});

$route->add('/stat', function() {
    include_once './views/pages/viewstat.php';
});
$route->add('/ChartData', function() {
    include_once './controllers/getChartData.php';
});

$route->add('/get-detail', function() {
    include './controllers/orderController.php';
    $orderCtrl = new orderCtrl();
    $orderCtrl->getDetail($_GET['id']);
});

$route->add('/this/is/the/.+/story/of/.+', function($first, $second) {
    echo "This is the $first story of $second";
});
*/

$route->submit();
