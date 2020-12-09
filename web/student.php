<?php  
$user = $_SESSION['loginUser'];
require_once "web/header.php"; ?>
 <?php if($user["role_id"] == '1')  {?>
    <div style="text-align: right; margin: 20px 0px 10px;">
        <a id="btnAddAction" href="index.php?action=student-add"><img src="web/image/icon-add.png" />Add Student</a>
    </div>
	<?php }?>
    <div id="toys-grid">
        <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>Student Name</strong></th>
                    <th><strong>Matriculation Date</strong></th>
                    <th><strong>Course Enrolled</strong></th>
                    <?php if($user["role_id"] == '1')  {?>
                    <th><strong>Action</strong></th>
                    <?php }?>

                </tr>
            </thead>
            <tbody>
                    <?php
                    if (! empty($result)) {
                        foreach ($result as $k => $v) {
                            ?>
          <tr>
                    <td><?php echo $result[$k]["first_name"].' '. $result[$k]["last_name"]; ?></td>
                    <td><?php echo $result[$k]["matriculation_date"]; ?></td>
                    <td><?php echo $result[$k]["currently_enrolled"]; ?></td>
                    <?php if($user["role_id"] == '1')  {?>
                    <td><a class="btnEditAction"
                        href="index.php?action=student-edit&id=<?php echo $result[$k]["id"]; ?>">
                        <img src="web/image/icon-edit.png" />
                        </a>
                    </td>
                    <?php }?>
                </tr>
                    <?php
                        }
                    }
                    ?>
            
            <tbody>
        
        </table>
    </div>
</body>
</html>