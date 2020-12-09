<?php require_once "web/header.php"; ?>
    <div style="text-align: right; margin: 20px 0px 10px;">
        <a id="btnAddAction" href="index.php?action=course-add"><img src="web/image/icon-add.png" />Add Course</a>
    </div>
    <div id="toys-grid">
        <table cellpadding="10" cellspacing="1" class="course_table">
            <thead>
                <tr>
                    <th><strong>Course Name</strong></th>
                    <th><strong>Course Description</strong></th>
                    <th><strong>Start Date</strong></th>
                    <th><strong>Duration</strong></th>
                    <th><strong>Action</strong></th>

                </tr>
            </thead>
            <tbody>
                    <?php
                    if (! empty($result)) {
                        foreach ($result as $k => $v) {
                            ?>
          <tr>
                    <td><?php echo $result[$k]["course_name"]; ?></td>
                    <td><?php echo $result[$k]["course_description"]; ?></td>
                    <td><?php echo $result[$k]["start_date"]; ?></td>
                    <td><?php echo $result[$k]["duration"]; ?> week</td>
                    <td><a class="btnEditAction"
                        href="index.php?action=course-edit&id=<?php echo $result[$k]["course_id"]; ?>">
                        <img src="web/image/icon-edit.png" />
                        </a>
                    </td>
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