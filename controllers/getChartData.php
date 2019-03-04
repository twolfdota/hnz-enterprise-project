<?php

require_once "./models/Chart.php";
require_once "./DBConnect.php";
$query = "select address, count(orderID) as sales, sum(pronum) as proNum, sum(`total-price`) as totalRevenue from staffreport";
if ($_GET['start'] != "" && $_GET['end'] != "") {
    $query = $query . " where Date(payDate) between '" . $_GET['start'] . "' and '" . $_GET['end'] . "'";

}

$query = $query . " group by address";
$result = mysqli_query($conn, $query);
$dataResult = array();
while ($row = mysqli_fetch_array($result)) {
    $chart = new Chart();
    $chart->name = $row['address'];
    $chart->proNum = $row['proNum'];
    $chart->sales = $row['sales'];
    $chart->totalRevenue = $row['totalRevenue'];
    array_push($dataResult, $chart);
}

echo json_encode($dataResult);
?>

