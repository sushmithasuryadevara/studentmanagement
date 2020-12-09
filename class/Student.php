<?php 
require_once ("class/DBController.php");
class Student
{
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addStudent($first_name, $last_name, $matriculation_date, $course_enrolled, $course_id) {
        $query = "INSERT INTO tbl_student (first_name,last_name,matriculation_date,course_id,currently_enrolled) VALUES (?, ?, ?, ?, ?)";
        $paramType = "sssis";
        $paramValue = array(
            $first_name,
            $last_name,
            $matriculation_date,
            $course_id,
            $course_enrolled
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function editStudent($first_name, $last_name, $matriculation_date, $course_enrolled, $course_id, $student_id){
        $query = "UPDATE tbl_student SET first_name = ?,last_name = ?,matriculation_date = ?,course_id = ?,currently_enrolled = ? WHERE id = ?";
        $paramType = "sssisi";
        $paramValue = array(
            $first_name,
            $last_name,
            $matriculation_date,
            $course_id,
            $course_enrolled,
            $student_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    
    function getStudentById($student_id) {
        $query = "SELECT * FROM tbl_student WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    
    function getAllStudent() {
        $sql = "SELECT * FROM tbl_student ORDER BY id";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }

    function getAllCourses() {
        $sql = "SELECT * FROM tbl_course";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
    
}
?>