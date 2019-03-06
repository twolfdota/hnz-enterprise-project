<?php

class facultyCtrl {
    function loadFalcuty(){
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
    }
}

?>