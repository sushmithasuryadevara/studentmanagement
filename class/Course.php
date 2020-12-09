<?php 
require_once ("class/DBController.php");
class Course {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addCourse($course_name, $course_desc, $start_date, $duration) {
        $query = "INSERT INTO tbl_course (course_name,course_description,start_date,duration) VALUES (?, ?, ?, ?)";
        $paramType = "sssi";
        $paramValue = array(
            $course_name,
            $course_desc,
            $start_date,
            $duration
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editCourse($course_name, $course_desc, $start_date, $duration, $course_id) {
        $query = "UPDATE tbl_course SET course_name = ?,course_description = ?,start_date = ?,duration = ? WHERE course_id = ?";
        $paramType = "sssii";
        $paramValue = array(
            $course_name,
            $course_desc,
            $start_date,
            $duration,
            $course_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getCourseById($course_id) {
        $query = "SELECT * FROM tbl_course WHERE course_id = ?";
        $paramType = "i";
        $paramValue = array(
            $course_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getCourse() {
        $sql = "SELECT * FROM tbl_course";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
}
?>