<?php
class cmtCtrl {
    function getListModifyCmt($id) {
        require './DBConnect.php';
        $mgzTitle = "";
        $mgzDoc = "";
        $mgzImg = "";
        $mgzYear = 1973;
        $mgzStatus = "";
        $authorId = 0;
        $result = array();
        if($id){

            $query_fetch = mysqli_query($conn,"SELECT m.title, m.imgFile, m.docFile, c.*, u.name as username, u.roles, f.name as fName, u.avatar FROM comments as c
            inner join `user` as u on c.userId = u.id
            inner join faculty as f on u.faculty = f.code
            left join magazine as m on c.magazineId = m.id 
            WHERE magazineId = $id AND cmtType = 1");
            while($show = mysqli_fetch_array($query_fetch)){

                $item = (object) [
                    'id' => $show['id'],
                    'content' => $show['content'],
                    'username' => $show['username'],
                    'roles' => $show['roles'],
                    'fName' => $show['fName'],
                    'avatar' => $show['avatar'],
                    'cmtDate' => $show['cmtDate'],
                ];
                array_push($result, $item);
            } // while loop brace
            $query_fetch = mysqli_query($conn,"SELECT userid, title, imgFile, docFile,academicYear, `status` FROM magazine
            WHERE id = $id");
            while($show = mysqli_fetch_array($query_fetch)){
                $mgzTitle = $show['title'];
                $mgzDoc = $show['docFile'];
                $mgzImg= $show['imgFile'];
                $mgzYear = $show['academicYear'];
                $mgzStatus = $show['status'];
                $authorId = $show['userid'];
            }

        } // isset brace
        $mgzObj = (object) [
            'title'=>$mgzTitle,
            'doc'=> $mgzDoc,
            'img' => $mgzImg,
            'year' => $mgzYear,
            'status' => $mgzStatus,
            'author' => $authorId,
            'cmtList'=>$result
        ];
        return $mgzObj;

    }

    function addModifyCmt($content, $userId, $magazineId, $authorId, $corId) {
        require_once './DBConnect.php';

            $sql = "insert into comments(content, userId, magazineId, cmtType, cmtDate) values(?,?,?,1,now())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $content, $userId, $magazineId);
            $stmt->execute();
            if (mysqli_error($conn)) {
                echo '{"error":"' .mysqli_error($conn) . '"}';
            }
            else {
                echo json_encode("Success!");
                include './controllers/notiController.php';
                $notiCtrl = new notiCtrl();
                if ($userId == $authorId) {
                    $notiCtrl->createNoti($magazineId, 'comment', $authorId, $corId);
                }
                else {
                    $notiCtrl->createNoti($magazineId, 'comment', $corId, $authorId);
                }               
            }
            $conn->close();

    }
    
}

?>