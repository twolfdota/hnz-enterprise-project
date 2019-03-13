<?php

class userCtrl
{

    function create()
    {
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
    }

    function validateEmail()
    {
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
    }

    function check($name, $pass) {
        require_once './DBConnect.php';
        $sql = "select ava from UserLogin where UserName=? and Password=?";
        $stmt = $conn->prepare($sql);
        $salt = "124$@=+YJQ123";
        $token = hash("sha1", $pass . $salt);
        $stmt->bind_param("ss", $name, $token);
        $stmt->execute();
        $stmt->store_result();
        $conn->close();
        $num_of_rows = $stmt->num_rows;
        return $num_of_rows;
    }

    function authorize() {
        require_once './DBConnect.php';
        $name = isset($_SESSION['login']) ? $_SESSION['login'] : $_COOKIE['login'];
        $role = 0;
        $store = 0;
        $img = "";
        $bigimg = "";
        $storename = "";
        $sql = "select adm, department, ava, address, storeimg from UserLogin as u left join department as d on u.department = d.id where UserName=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->store_result();
        $num_of_rows = $stmt->num_rows;
        if ($num_of_rows > 0) {
            $stmt->bind_result($adm, $dep, $ava, $address, $storeimg);
            while ($stmt->fetch()) {
                $role = $adm;
                $store = $dep;
                $img = $ava != null ? $ava : 'assets/images/anonymous.png';
                $bigimg = $storeimg;
                $storename = $address;
            }
            $stmt->free_result();
            $stmt->close();
        }
        $author = (array) [
                    'role' => $role,
                    'store' => $store,
                    'ava' => $img,
                    'storeimg' => $bigimg,
                    'storename' => $storename
        ];
        return $author;
    }
}
 