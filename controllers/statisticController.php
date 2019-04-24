<?php
class sttCtrl {
    function getDataEachYear($year) {
        require './DBConnect.php';
        $result = array();
        if($year){
            $query_fetch = mysqli_query($conn,"SELECT faculty, count(*) as mgzCount, COUNT(distinct authorId) AS authorCount FROM 
            (SELECT faculty.name as faculty, user.id as authorId, magazine.title, magazine.academicYear FROM ((user INNER JOIN faculty ON user.faculty = faculty.code) INNER JOIN magazine ON magazine.userid = user.id )
            where academicYear = $year and status='approved') AS thongke group by faculty");
            while($show = mysqli_fetch_array($query_fetch)){
                $item = (object) [
                    'faculty' => $show['faculty'],
                    'mgzCount' => $show['mgzCount'],
                    'authorCount' => $show['authorCount']
                ];
                array_push($result, $item);
            } 

        } 

        return $result;
       
    }

}

?>