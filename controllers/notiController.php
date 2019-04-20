<?php

class notiCtrl{
    function createNoti($mgzId, $notiType, $senderId, $receiverId) {
        require './DBConnect.php';
            $sql = "insert into noti(mgzId, notiType, senderId, receiverId, notiDate) values(?,?,?,?,now())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isii", $mgzId, $notiType, $senderId, $receiverId);
            $stmt->execute();
            if (mysqli_error($conn)) {
                echo '{"error":"' .mysqli_error($conn) . '"}';
            }
            $conn->close();
    }

    function getNoti($userId) {
        require './DBConnect.php';
        $result = array();
        if($userId){
            $query_fetch = mysqli_query($conn,"SELECT m.title, u.name, u.avatar, n.notiType, n.notiDate, n.id, n.mgzId FROM noti as n 
                                                    LEFT JOIN magazine as m ON m.id = n.mgzId
                                                    INNER JOIN user as u ON u.id = n.senderId
                                                    where n.receiverId = $userId
                                                    order by n.notiDate desc");
            while($show = mysqli_fetch_array($query_fetch)){
                $item = (object) [
                    'id' => $show['id'],
                    'title' => $show['title'],
                    'name' => $show['name'],
                    'type' => $show['notiType'],
                    'date' => $show['notiDate'],
                    'avatar' => $show['avatar'],
                    'mgzId' => $show['mgzId']
                ];
                array_push($result, $item);
            } // while loop brace
    
        } // isset brace
        return $result;        
    }

    function removeNoti($condition) {
        require './DBConnect.php';
        mysqli_query($conn,"delete from noti where ". $condition);
        if (mysqli_error($conn)) {
            echo 'Internal server error!!';
        }
        $conn->close();
    }
}

?>