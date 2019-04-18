<?php
class magazineCtrl
{
    function add($title, $doc, $ava, $userid)
    {
        require_once './DBConnect.php';
        $validated = true;


            $sql = "insert into magazine(title, docFile, imgFile, userid, status, created_at, updated_at, academicYear) values(?,?,?,?,'new',now(), null, YEAR(now()))";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $title, $doc, $ava, $userid);
            $stmt->execute();
            if (mysqli_error($conn)) {
                $validated = false;
                echo json_encode('Title already used!!');
            }
            $conn->close();

        return $validated;
    }

    function delete($title){
        $sql = "delete from magazine where title = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $title);
        $stmt->execute();
        if (mysqli_error($conn)) {
            echo 'Internal server error!!';
        }
        $conn->close();
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
                    'status' => $show['status'],
                    'acYear' => $show['academicYear']
                ];
                array_push($result, $item);
            } // while loop brace

        } // isset brace
        return $result;

    }

    function update($title, $doc, $ava, $id)
    {
        require './DBConnect.php';
        $validated = true;


            $sql = "update magazine set title = ?, imgFile=?, docFile=?, updated_at = now() where id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $title, $doc, $ava, $id);
            $stmt->execute();
            if (mysqli_error($conn)) {
                $validated = false;
                echo json_encode('This title is already used!!');
            }
            $conn->close();

        return $validated;
    }

    function getListMagazineForFaculty($id) {
        require './DBConnect.php';
        $result = array();
        if($id){
            $query_fetch = mysqli_query($conn,"SELECT magazine.id, magazine.title, magazine.imgFile, magazine.created_at, magazine.updated_at, magazine.status, user.name FROM `user` 
                                                    INNER JOIN magazine ON `user`.id = magazine.userId
                                                    where `user`.faculty = (SELECT faculty from `user` where id = $id)");
            while($show = mysqli_fetch_array($query_fetch)){
                $item = (object) [
                    'id' => $show['id'],
                    'title' => $show['title'],
                    'img' => $show['imgFile'],
                    'name' => $show['name'],
                    'created_at' => $show['created_at'],
                    'update_at' => @$show['update_at'],
                    'status' => $show['status'],
                ];
                array_push($result, $item);
            } // while loop brace
    
        } // isset brace
        return $result;
    
    }
}
 
