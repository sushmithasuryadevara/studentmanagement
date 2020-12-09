<?php require_once "web/header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">First Name</label> <span
            id="first-name-info" class="info"></span><br /> <input type="text"
            name="first_name" id="first_name" class="inputBox">
    </div>
     <div>
        <label style="padding-top: 20px;">Last Name</label> <span
            id="last-name-info" class="info"></span><br /> <input type="text"
            name="last_name" id="last_name" class="inputBox">
    </div>
    <div>
        <label>Matriculation Date</label> <span id="matriculation-date-info"
            class="info"></span><br /> <input type="date"
            name="matriculation_date" id="matriculation_date" class="inputBox">
    </div>
    <div>
        <label>Course Enrolled</label> <span id="course-info" class="info"></span><br />
        <input type="radio" name="course_enrolled" class="enrolled" value="Yes"> Yes
        <input type="radio" name="course_enrolled" class="enrolled" value="No"> No
    </div>
    <div style="display: none;" id="course">
        <label>Course</label> <span id="course-info" class="info"></span><br />
       <select class="inputBox" name="course_id">
        <?php foreach($course  as $course) {?>
           <option value="<?php echo $course["course_id"];?>"><?php echo $course["course_name"];?></option>
          <?php }?>
       </select>
    </div>

    <div>
        <input type="submit" name="add" id="btnSubmit" value="Add" />
    </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"
    type="text/javascript"></script>
<script>
function validate() {
    var valid = true;   
    $(".inputBox").css('background-color','');
    $(".info").html('');
    
    if(!$("#first_name").val()) {
        $("#first-name-info").html("(required)");
        $("#first_name").css('background-color','#FFFFDF');
        $("#first_name").focus();
        valid = false;
    }
    return valid;
}
$('.enrolled').click(function() {
  if(this.value == 'Yes') {
    $("#course").show();
  }else {
    $("#course").hide();
  }
});
</script>
</body>
</html>