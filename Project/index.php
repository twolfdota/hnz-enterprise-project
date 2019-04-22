<?php

include 'route.php';

$route = new Route();

$route->add('/', function() {
    require_once './DBConnect.php';
    $sql = "select * from faculty";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    $result = array();
    if ($num_of_rows > 0) {
        $stmt->bind_result($id, $name, $code);
        while ($stmt->fetch()) {
            echo $id . " " . $name . " " . $code . '<br>';
        }
        $stmt->free_result();
        $stmt->close();
    }

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

