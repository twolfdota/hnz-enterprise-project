<?php

include 'route.php';

$route = new Route();
//Thêm các đường dẫn load trang tĩnh vào đây
$route->add('/', function () {
    include_once './views/home.php';
});

$route->add('/cms', function () {
    include_once './views/register.php';
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


$route->submit();
