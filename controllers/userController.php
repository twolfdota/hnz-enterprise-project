<?php

class userCtrl {

    function add($name, $pass, $dep, $ava) {
        require_once './DBConnect.php';
        $validated = true;

        if ($name != null && $pass != null) {
            $sql = "insert into UserLogin(username, password, adm, department, ava, joindate) values(?,?,?,?,?, now())";
            $stmt = $conn->prepare($sql);
            $salt = "124$@=+YJQ123";
            $token = hash("sha1", $pass . $salt);
            $adm = 0;
            $stmt->bind_param("ssiis", $name, $token, $adm, $dep, $ava);
            $stmt->execute();
            if (mysqli_error($conn)) {
                echo "username used!";
            }
            echo 'success!';
            $conn->close();
        } else if ($name == null || $pass == null) {
            $validated = false;
            echo 'please fill in required form!';
        }
        return $validated;
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

    function search($key) {
        require_once './DBConnect.php';
        $sql = "select username, ava from UserLogin where username like '%$key%' and adm = 0 limit 4";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $num_of_rows = $stmt->num_rows;
        $result = array();
        if ($num_of_rows > 0) {
            $stmt->bind_result($name, $ava);
            while ($stmt->fetch()) {
                $autocomp = (object) [
                            'name' => $name,
                            'ava' => $ava
                ];
                array_push($result, $autocomp);
            }
            $stmt->free_result();
            $stmt->close();
        }
        $jsonresult = json_encode($result);
        echo $jsonresult;
    }



}

?>
