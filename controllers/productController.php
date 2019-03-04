<?php

class productCtrl {

    function search($key) {
        require_once './DBConnect.php';
        $sql = "select id, proname, price, ava from product where proname like '%$key%' limit 4";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        $num_of_rows = $stmt->num_rows;
        $result = array();
        if ($num_of_rows > 0) {
            $stmt->bind_result($id, $name, $price, $ava);
            while ($stmt->fetch()) {
                $autocomp = (object) [
                            'id' => $id,
                            'name' => $name,
                            'price'=> $price,
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

