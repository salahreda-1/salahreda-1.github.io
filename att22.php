<?php
session_start();
require 'components/conn.php';
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM supervisor WHERE id = $user_id ";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (isset($_POST['sent_attendance'])) {
    $course_id = $_POST['course_id'];
    $sections_id = $_POST['section_id'];
    $team_id = $_POST['team_id'];

    $date = date('Y-m-d');
    $students = $_POST['students'];
    foreach ($students as $student) {
        $status = isset($_POST['status'.$student]) ? $_POST['status'.$student] : 'غائب';
        if($sections_id > 0){
            $sql = "INSERT INTO attendance (course_id, date, student_id, status,secion_id,team_id) VALUES ('$course_id','$date',  '$student', '$status', '$sections_id', '$team_id')";
        }
        else if($team_id > 0 && $sections_id == null){
            $sql = "INSERT INTO attendance (course_id, date, student_id, status,team_id) VALUES ('$course_id','$date',  '$student', '$status', '$team_id')";
        }
        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } 
    }
    echo "Data saved successfully.";
    header("Location: index2.php");
    exit();

}
?>

<?php
if(isset($_POST['name_course']) && isset($_POST['number_team']) && isset($_POST['attendance_type'])|| isset($_POST['number_section'])){
    $name_course = mysqli_real_escape_string($conn, $_POST['name_course']);
    $number_team = mysqli_real_escape_string($conn, $_POST['number_team']);
    $attendance_type = mysqli_real_escape_string($conn, $_POST['attendance_type']);
    @$section = mysqli_real_escape_string($conn, $_POST['number_section']);


    

    $code = "SELECT id FROM courses WHERE name = '$name_course'";
    $code_result = mysqli_query($conn, $code);
    $code_row = mysqli_fetch_assoc($code_result);
    $course_id = $code_row['id'];

    $code_section = "SELECT id FROM sections WHERE id = '". strval($section)."'";
    $sections_result = mysqli_query($conn, $code_section);
    $sections_row = mysqli_fetch_assoc($sections_result);
    @$sections_id = $sections_row['id'];

    $code_team = "SELECT id FROM teams WHERE id = '$number_team'";
    $team_result = mysqli_query($conn, $code_team);
    $team_row = mysqli_fetch_assoc($team_result);
    $team_id = $team_row['id'];
}
    

    
?>
<?php
 include 'components/layout.php';
?>
<body>
    <!-- Topbar Start -->
    <?php
  $nameStudent =  strtok ($user['name']," ") ;
  $personalData = "بيانات الطلاب  ";
  $locationStudent = ('profile2.php');
  $schedule ="متابعة حضور الطلاب";
  $locationschedule = ('table2.php');
  $adsenteeism ="تسجيل حضور الطلاب";
  $locationadsenteeism = ('attendance2.php');
  $locationlogo = ('index2.php');

  include 'components/header.php';
?>
    <!-- Topbar End -->


    <!-- main section start-->
    <form method="post" action="">
    <section id="land-page">
        <div class="dd m">
            <ul class="land-navigation">
                <li class="lll">
                    <a >
                       
                        <span class="j"><?php echo $attendance_type ?></span>
                    </a>
                </li>
                <li class="lll">
                    <a >
                       
                        <span class="j"><?php echo $name_course ?></span>
                    </a>
                </li>
              
           
        </div>  

        <div class="main">
            
        <?php 
        if ($section > 0) {
        $query = "SELECT student.*
          FROM student 
          JOIN student_courses ON student_courses.student_m = student.id 
          JOIN courses ON student_courses.course_m = courses.id 
          WHERE student.section_id = " . strval($section) . " AND courses.name = '$name_course' AND team_id = " . strval($number_team);
        $answer = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($answer)): ?>
     <div class="row">
                <div class="col-8 col-md-6">  
                    <input class="form-check-input" name="status<?php echo $row['id'] ?>" type="checkbox" value="حاضر" id="flexCheckIndeterminate">
                 </div>
                 <input type="hidden" name="students[]" value="<?php echo $row['id'] ?>">
                <div class="col-4 col-md-6"><?php echo $row['name'] ?></div>   
            </div>
<?php endwhile; 
}
else if ($number_team > 0 && $section == null) {
    $ask = "SELECT student.*
    FROM student 
    JOIN student_courses ON student_courses.student_m = student.id 
    JOIN courses ON student_courses.course_m = courses.id 
    WHERE student.team_id = " . strval($number_team) . " AND courses.name = '$name_course'";
       
$result_le = mysqli_query($conn, $ask);   
while ($row_le = mysqli_fetch_assoc($result_le)): ?>

    <div class="row">
                <div class="col-8 col-md-6">  
                    <input class="form-check-input" name="status<?php echo $row_le['id'] ?>" type="checkbox" value="حاضر" id="flexCheckIndeterminate">
                 </div>
                 <input type="hidden" name="students[]" value="<?php echo $row_le['id'] ?>">
                <div class="col-4 col-md-6"><?php echo $row_le['name'] ?></div>   
      </div>
<?php endwhile; } ?>

            <input type="hidden" name="course_id" value="<?php echo $course_id ?>">
            <input type="hidden" name="section_id" value="<?php echo $sections_id ?>">
            <input type="hidden" name="team_id" value="<?php echo $team_id ?>">

        </div>
        <div>
            <input type="submit" name="sent_attendance" value=" حفظ البيانات " class="btn btn-primary btt btn-block mb-3 kk">
        </div>    
    </section>
</form>