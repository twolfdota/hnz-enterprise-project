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

        $sql = "insert into user(roles, faculty, `name`, dob, phone, email, `password`, avatar) values(?,?,?,?,?,?,?,'assets/images/anonymous.png')";
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

    function check($email, $pass) {
        require_once './DBConnect.php';
        $sql = "select email from user where email=? and password=?";
        $result = array();
        $stmt = $conn->prepare($sql);
        $salt = "124$@=+YJQ123";
        $token = hash("sha1", $pass . $salt);
        $stmt->bind_param("ss", $email, $token);
        $stmt->execute();
        $stmt->store_result();
        $conn->close();
        $num_of_rows = $stmt->num_rows;
        if ($num_of_rows > 0) {
            $stmt->bind_result($name);
            while ($stmt->fetch()) {
                array_push($result, $email);
            }

            $stmt->free_result();
            $stmt->close();
        }
        return $result;
    }

    function authorize() {
        require_once './DBConnect.php';
        $email = $_SESSION['login'];
        $role = 0;
        $img = "";
        $name = "";
        $fac = "";
        $sql = "select u.id, roles, u.name, f.name, avatar from user as u left join faculty as f on u.faculty = f.code where email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $num_of_rows = $stmt->num_rows;
        if ($num_of_rows > 0) {
            $stmt->bind_result($id, $adm, $username, $dep, $avatar);
            while ($stmt->fetch()) {
                $iduser = $id;
                $role = $adm;
                $name = $username;
                $fac = $dep;
                $img = $avatar != null ? $avatar : 'assets/images/anonymous.png';
            }
            $stmt->free_result();
            $stmt->close();
        }
        $author = (array) [
            'id' => $iduser,
            'role' => $role,
            'name' => $name,
            'faculty' => $fac,
            'ava' => $img
        ];
        return $author; 
    }
}
 