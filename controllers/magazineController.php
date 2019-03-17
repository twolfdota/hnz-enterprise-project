<?php
class magazineCtrl
{
    function add($title, $doc, $ava)
    {
        require_once './DBConnect.php';
        $validated = true;


            $sql = "insert into magazine(title, docFile, imgFile, status, created_at, updated_at) values(?,?,?,'new',now(), null)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $title, $doc, $ava);
            $stmt->execute();
            if (mysqli_error($conn)) {
                $validated = false;
                echo json_encode('Title already used!');
            }
            $conn->close();

        return $validated;
    }
}
 
