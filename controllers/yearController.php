<?php
class yearCtrl {
function loadYear()
{
    require_once './DBConnect.php';
    $sql = "select * from academic_year where `year` =  YEAR(now())";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    $result = array();
    if ($num_of_rows > 0) {
        $stmt->bind_result($id, $year, $startDate, $end_date, $final_closure_date,$yearName);
        while ($stmt->fetch()) {
            $resItem = (object)[
                'std' => $startDate,
                'dl1' => $end_date,
                'dl2' => $final_closure_date,
                'yearName' => $yearName
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
}


function editYear(){
    require_once './DBConnect.php';
    $yearName = $_POST['yearName'];
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
        $sql = "update academic_year set start_date = ?, end_date = ?, final_closure_date = ?, yearName = ? where `year` = YEAR(now())";
    } else {
        $sql = "insert into academic_year(`year`,start_date, end_date, final_closure_date, yearName) values (YEAR(now()),?,?,?,?)";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $startDate, $endDate, $finalDate, $yearName);
    $stmt->execute();
    if (mysqli_error($conn)) {
        echo '{"status":"error", "message": "Internal server error!"}';
    } else {
        echo '{"status":"success"}';
    }
    $conn->close();
}
}

 
?>