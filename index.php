<?php session_start();
if(empty($_SESSION['loginUser'])) {
    header("location: login.php");
    exit;
}
require_once ("class/DBController.php");
require_once ("class/Student.php");
require_once ("class/Course.php");

$db_handle = new DBController();

$action = "";
if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "course-add":
    if (isset($_POST['add'])) {
            $course_name = $_POST['course_name'];
            $course_desc = $_POST['course_desc'];
            $start_date = "";
            if ($_POST["start_date"]) {
                $start_date_timestamp = strtotime($_POST["start_date"]);
                $start_date = date("Y-m-d", $start_date_timestamp);
            }
            $duration = $_POST['duration'];
            
            $course = new Course();
            $insertId = $course->addCourse($course_name, $course_desc, $start_date, $duration);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: index.php?action=course");
            }
        }
        
        $student = new Student();
        $studentResult = $student->getAllStudent();
        require_once "web/course-add.php";
        break;
    
    case "course-edit":

        $course_id = $_GET["id"];
        $course = new Course();
        
        if (isset($_POST['add'])) {
            $course_name = $_POST['course_name'];
            $course_desc = $_POST['course_desc'];
            $start_date = "";
            if ($_POST["start_date"]) {
                $start_date_timestamp = strtotime($_POST["start_date"]);
                $start_date = date("Y-m-d", $start_date_timestamp);
            }
            $duration = $_POST['duration'];
            
            $course->editCourse($course_name, $course_desc, $start_date, $duration, $course_id);
            
            header("Location: index.php?action=course");
        }
        
        $result = $course->getCourseById($course_id);
        require_once "web/course-edit.php";
        break;
    
    case "course":
        $course = new Course();
        $result = $course->getCourse();
        require_once "web/course.php";
        break;
    
    case "student-add":
        if (isset($_POST['add'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $matriculation_date = "";
            if ($_POST["matriculation_date"]) {
                $matriculation_date_timestamp = strtotime($_POST["matriculation_date"]);
                $matriculation_date = date("Y-m-d", $matriculation_date_timestamp);
            }
            $course_enrolled = $_POST['course_enrolled'];
            $course_id = $_POST['course_id'];
            
            $student = new Student();
            $insertId = $student->addStudent($first_name, $last_name, $matriculation_date, $course_enrolled, $course_id);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problem in Adding New Record",
                    "type" => "error"
                );
            } else {
                header("Location: index.php");
            }
        }
        $student = new Student();
        $course = $student->getAllCourses();
        require_once "web/student-add.php";
        break;
    
    case "student-edit":
        $student_id = $_GET["id"];
        $student = new Student();
        
        if (isset($_POST['add'])) {
           $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $matriculation_date = "";
            if ($_POST["matriculation_date"]) {
                $matriculation_date_timestamp = strtotime($_POST["matriculation_date"]);
                $matriculation_date = date("Y-m-d", $matriculation_date_timestamp);
            }
            $course_enrolled = $_POST['course_enrolled'];
            $course_id = $_POST['course_id'];
            
            $student->editStudent($first_name, $last_name, $matriculation_date, $course_enrolled, $course_id, $student_id);
            
            header("Location: index.php");
        }
        
        $result = $student->getStudentById($student_id);
        $course = $student->getAllCourses();
        require_once "web/student-edit.php";
        break;
    
    default:
        $student = new Student();
        $result = $student->getAllStudent();
        require_once "web/student.php";
        break;
}
?>