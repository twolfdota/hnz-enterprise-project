<?php

class orderCtrl {

    function addOrder($name, $detail) {
        require_once './DBConnect.php';
        $validated = true;
        if (count($detail) == 0) {
            $validated = false;
            $response_array['status'] = "please add some item!";
            header('Content-type: application/json');
            echo json_encode($response_array);
        }
        for ($i = 0; $i < count($detail); $i++) {
            if (strval($detail[$i]->proQty) != strval(intval($detail[$i]->proQty)) || intval($detail[$i]->proQty) < 1) {
                $validated = false;
                $response_array['status'] = "invalid quantity!";
                header('Content-type: application/json');
                echo json_encode($response_array);
            }
        }
        if ($validated) {
            $sql = "insert into ord(Staff, recordDate, payDate) values (?, now(),null)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $name);
            $stmt->execute();
            if (mysqli_error($conn)) {
                $response_array['status'] = mysqli_error($conn);
                header('Content-type: application/json');
                echo json_encode($response_array);
            }
            $id = mysqli_insert_id($conn);
            $stmt->close();
            for ($i = 0; $i < count($detail); $i++) {
                $sql1 = "insert into orderDetail(orderID, productID, quantity) values (?, ?, ?)";
                $stmt1 = $conn->prepare($sql1);
                $stmt1->bind_param("iii", $id, $detail[$i]->proId, $detail[$i]->proQty);
                $stmt1->execute();
                if (mysqli_error($conn)) {
                    $response_array['status'] = mysqli_error($conn);
                    print mysqli_error($conn);
                    header('Content-type: application/json');
                    echo json_encode($response_array);
                }
                $stmt1->close();
            }
            $response_array['status'] = "order recorded successfully!";
            header('Content-type: application/json');
            echo json_encode($response_array);
        }
    }

    function cancelOrder($id) {
        require_once './DBConnect.php';
        $result = mysqli_query($conn, "SELECT paid from ord where id =" . $id);
        $stat = false;
        while ($row = mysqli_fetch_array($result)) {
            $stat = $row['paid'];
        }
        if ($stat != "no") {
            echo 'cannot finish order!';
        } else {
            mysqli_query($conn, "update ord set payDate = now(), paid = 'cancelled' where id =" . $id);
            if (mysqli_error($conn)) {
                echo mysql_error($conn);
            }
            echo "<script>alert('order cancelled!'); window.location = '/ABCShop/manage-order'</script>";
        }
    }

    function finishOrder($id) {
        require_once './DBConnect.php';
        $result = mysqli_query($conn, "SELECT paid from ord where id =" . $id);
        $stat = false;
        while ($row = mysqli_fetch_array($result)) {
            $stat = $row['paid'];
        }
        if ($stat != "no") {
            echo 'cannot finish order!!';
        } else {
            mysqli_query($conn, "update ord set payDate = now(), paid = 'yes' where id =" . $id);
            if (mysqli_error($conn)) {
                echo mysqli_error($conn);
            }
            echo "<script>alert('order finished!'); window.location = '/ABCShop/manage-order'</script>";
        }
    }

    function getDetail($id) {
        require_once './DBConnect.php';
        require_once './models/orderDetail.php';
        $dataResult = array();
        $result = mysqli_query($conn, "SELECT ava, proname, quantity, quantity*price as priceSum from product as p "
                . "inner join orderDetail as od on p.id = od.productID where orderID =" . $id);
        while ($row = mysqli_fetch_array($result)) {
            $od = new orderDetail();
            $od->ava = $row['ava'];
            $od->proName = $row['proname'];
            $od->quantity = $row['quantity'];
            $od->price = $row['priceSum'];
            array_push($dataResult, $od);
        }
        
        echo json_encode($dataResult);
    }

}

?>