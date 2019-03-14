<?php
class magazineCtrl
{
    function add($title, $doc, $ava, $userid)
    {
        require_once './DBConnect.php';
        $validated = true;


            $sql = "insert into magazine(title, docFile, imgFile, userid, status, created_at, updated_at) values(?,?,?,?,'new',now(), null)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $title, $doc, $ava, $userid);
            $stmt->execute();
            if (mysqli_error($conn)) {
                $validated = false;
                echo '<script>alert("Title used!!")</script>';
            }
            $conn->close();

        return $validated;
    }

    function getListMagazine($id) {
        require './DBConnect.php';
        $result = array();
        if($id){


            $query_fetch = mysqli_query($conn,"SELECT * FROM magazine WHERE userid = $id");
            while($show = mysqli_fetch_array($query_fetch)){
                $item = (object) [
                    'id' => $show['id'],
                    'title' => $show['title'],
                    'img' => $show['imgFile'],
                    'doc' => $show['docFile'],
                    'status' => $show['status']
                ];
                array_push($result, $item);
            } // while loop brace

        } // isset brace
        return $result;

    }
}
 
