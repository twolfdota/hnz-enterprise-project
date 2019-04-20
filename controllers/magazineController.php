<?php
class magazineCtrl
{
    function add($title, $doc, $ava, $userid)
    {
        require_once './DBConnect.php';
        $validated = true;
        $insertId = 0;
        $stmt = mysqli_prepare($conn, "INSERT into magazine(title, docFile, imgFile, userid, `status`, created_at, updated_at, academicYear) values(?,?,?,?,'new',now(), null, YEAR(now()))");
        mysqli_stmt_bind_param($stmt, "sssi", $title, $doc, $ava, $userid);
        mysqli_stmt_execute($stmt);
            if (mysqli_error($conn)) {
                $validated = false;
                echo json_encode('Title already used!!');
            }
            else {
                $insertId = mysqli_insert_id($conn);
            }
            $conn->close();
        $addResult = (object) [
            'validated' => $validated,
            'insertId' => $insertId
        ];
        return $addResult;
    }



    function getListMagazine($id) {
        require './DBConnect.php';
        $result = array();
        if($id){


            $query_fetch = mysqli_query($conn,"SELECT * FROM magazine WHERE userid = $id order by created_at desc, updated_at desc");
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
            $query_fetch = mysqli_query($conn,"SELECT (SELECT count(id) from comments where comments.magazineId = magazine.id and userid = $id group by magazine.id ) cmtCount,
                                                    magazine.id, magazine.title, magazine.imgFile, magazine.created_at, magazine.updated_at, magazine.status, user.id as creatorId, user.name 
                                                    FROM `user` 
                                                    INNER JOIN magazine ON `user`.id = magazine.userId
                                                    where `user`.faculty = (SELECT faculty from `user` where id = $id)
                                                    order by magazine.created_at desc, magazine.updated_at desc");
            while($show = mysqli_fetch_array($query_fetch)){
                $item = (object) [
                    'id' => $show['id'],
                    'title' => $show['title'],
                    'img' => $show['imgFile'],
                    'name' => $show['name'],
                    'created_at' => $show['created_at'],
                    'update_at' => @$show['update_at'],
                    'status' => $show['status'],
                    'creatorId' => $show['creatorId'],
                    'cmtCount' => $show['cmtCount']
                ];
                array_push($result, $item);
            } // while loop brace
    
        } // isset brace
        return $result;
    
    }

    function removeMagazine($id, $deletor)
    {
        require_once './DBConnect.php';
        $docLink = "";
        $imgLink = "";
        $mgzUser = 0;
        $query_fetch = mysqli_query($conn,"SELECT imgFile, docFile, userid FROM magazine WHERE id = $id");
        while($show = mysqli_fetch_array($query_fetch)){
            $docLink = $show['docFile'];
            $imgLink = $show['imgFile']; 
            $mgzUser = $show['userid'];
        } 
        $sql = "delete from magazine where id = ".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if (mysqli_error($conn)) {
            echo mysqli_error($conn);
        }
        else {
            @unlink($docLink); 
            @unlink($imgLink);
            include './controllers/notiController.php';
            $notiCtrl = new notiCtrl();
            $notiCtrl->createNoti($id, 'delete', $deletor, $mgzUser);
        }

        $conn->close();
    }

    function approveMagazine($id, $publisher)
    {
        require_once './DBConnect.php';
        $mgzUser = 0;
        $query_fetch = mysqli_query($conn,"SELECT userid FROM magazine WHERE id = $id");
        while($show = mysqli_fetch_array($query_fetch)){
            $mgzUser = $show['userid'];
        } 
        $sql = "update magazine set status = 'approved' where id = ".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if (mysqli_error($conn)) {
            echo mysqli_error($conn);
        }
        else {
            include './controllers/notiController.php';
            $notiCtrl = new notiCtrl();
            $notiCtrl->createNoti($id, 'approve', $publisher, $mgzUser);
        }
        $conn->close();
    }

    function getMailInfo($userId){
        require './DBConnect.php';
        $email = "";
        $faculty = "";
        if($userId){
            $query_fetch = mysqli_query($conn,"SELECT email, f.`name` from `user` as u 
            inner join faculty as f on u.faculty = f.`code`
            where u.roles = 2 and u.faculty = (select u.faculty from `user` where id = $userId)");
            while($show = mysqli_fetch_array($query_fetch)){
                $email = $show['email'];
                $faculty = $show['name'];
            } // while loop brace

        } // isset brace
        $return = (object)[
            'email'=>$email,
            'faculty'=>$faculty
        ];
        return $return;
      
    }
}
 
