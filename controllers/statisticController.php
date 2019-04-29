<?php
class sttCtrl {
    function getDataEachYear($year) {
        require './DBConnect.php';
        $result = array();
        if($year){
            $query_fetch = mysqli_query($conn,"SELECT A1.faculty, ifnull(mgzCount, 0) as mgzCount, ifnull(authorCount,0) as authorCount, 
            ifnull(nocmtCount,0) as nocmtCount, ifnull(nocmtCount14days,0) as nocmtCount14days 
            from (SELECT faculty, count(*) as mgzCount, COUNT(distinct authorId) AS authorCount FROM 
                        (SELECT faculty.name as faculty, user.id as authorId, magazine.title, magazine.academicYear
                            FROM ((user INNER JOIN faculty ON user.faculty = faculty.code) 
                            INNER JOIN magazine ON magazine.userid = user.id )
                        where academicYear = $year and status='approved') AS thongke group by faculty) as A1
            left join 
             
            (SELECT faculty, count(*) as nocmtCount from
            (SELECT faculty.name as faculty, user.id as authorId, magazine.title, magazine.academicYear
                            FROM ((user INNER JOIN faculty ON user.faculty = faculty.code) 
                            INNER JOIN magazine ON magazine.userid = user.id )
                            WHERE
                            academicYear = $year and
                            (SELECT count(id) from comments where comments.magazineId = magazine.id and userid = 
                            (select id from user where faculty = faculty.code and roles = 2)) = 0) as noCmt group by faculty) as A2
            on A1.faculty = A2.faculty
            left join 
            (SELECT faculty, count(*) as nocmtCount14days from
            (SELECT faculty.name as faculty, user.id as authorId, magazine.title, magazine.academicYear
                            FROM ((user INNER JOIN faculty ON user.faculty = faculty.code) 
                            INNER JOIN magazine ON magazine.userid = user.id )
                            WHERE
                            academicYear = $year and
                            (SELECT count(*) from comments where comments.magazineId = magazine.id and userid = 
                            (select id from user where faculty = faculty.code and roles = 2)) = 0 
                            and (SELECT TIMESTAMPDIFF(SECOND, magazine.created_at,now()))  > 1209600 ) as noCmt14days group by faculty) as A3
            on A2.faculty = A3.faculty");
            while($show = mysqli_fetch_array($query_fetch)){
                $item = (object) [
                    'faculty' => $show['faculty'],
                    'mgzCount' => $show['mgzCount'],
                    'authorCount' => $show['authorCount'],
                    'nocmtCount' => $show['nocmtCount'],
                    'nocmtCount14days' => $show['nocmtCount14days']
                ];
                array_push($result, $item);
            } 

        } 

        return $result;
       
    }

}

?>