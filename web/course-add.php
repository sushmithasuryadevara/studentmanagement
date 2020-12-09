<?php require_once "web/header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate();">
   
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">Course Name</label> 
        <span id="course-name-info" class="info"></span><br /> 
            <input type="text" name="course_name" id="course_name" class="inputBox">
    </div>
    <div>
        <label>Course Description</label> 
        <span id="course-desc-info" class="info"></span><br /> 
        <textarea name="course_desc" id="course_desc" class="inputBox"></textarea>
    </div>
     <div>
        <label>Start Date</label>
        <span id="start-date-info" class="info"></span><br /> 
        <input type="date" name="start_date" id="start_date" class="inputBox"> <span id="start_date-info" class="info"></span>
    </div>
    <div>
        <label>Duration</label> <span id="duration-info" class="info"></span><br />
        <input type="text" name="duration" id="duration" class="inputBox">
    </div>
   
    <div>
        <input type="submit" name="add" id="btnSubmit" value="Add" />
    </div>

</form>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"
    type="text/javascript"></script>
<script>
function validate() {
    var valid = true;   
    $(".inputBox").css('background-color','');
    $(".info").html('');
    
    if(!$("#course_name").val()) {
        $("#course-name-info").html("(required)");
        $("#course_name").css('background-color','#FFFFDF');
        $("#course_name").focus();
        valid = false;
    }
    return valid;
}
</script>
</body>
</html>