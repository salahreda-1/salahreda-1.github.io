<?php
require 'components/conn.php';
include 'code.php';

if(isset($_POST['name_course']) && isset($_POST['number_team']) && isset($_POST['attendance_type']) && isset($_POST['id_student'])){
    $name_course = mysqli_real_escape_string($conn, $_POST['name_course']);
    $number_team = mysqli_real_escape_string($conn, $_POST['number_team']);
    $attendance_type = mysqli_real_escape_string($conn, $_POST['attendance_type']);
    $id_student = mysqli_real_escape_string($conn, $_POST['id_student']);

    $escaped_course_name = mysqli_real_escape_string($conn, $name_course);
    if($attendance_type == "سكاشن"){
        $sql = "SELECT courses.name, attendance.date, attendance.status
            FROM courses 
            JOIN attendance ON courses.id = attendance.course_id 
            WHERE attendance.student_id = $id_student AND courses.name = '$escaped_course_name' AND attendance.secion_id IS NOT NULL";
    } else {
        $sql = "SELECT courses.name, attendance.date, attendance.status
            FROM courses 
            JOIN attendance ON courses.id = attendance.course_id 
            WHERE attendance.student_id = $id_student AND courses.name = '$escaped_course_name' AND attendance.secion_id IS NULL";
    }
    
    $result = mysqli_query($conn, $sql);
}

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
    $attendance_count = 0;
    $absence_count = 0;

while ($row = mysqli_fetch_assoc($result)) {
    if ($row["status"] == "حاضر") {
        $icon_class = "cv bi-check-circle-fill";
        $status_text = "حاضر";
        $status_color = "green";
        $attendance_count++;
    } else {
        $icon_class = "cvv bi-x-circle-fill";
        $status_text = "غائب";
        $status_color = "red";
        $absence_count++;
    }

    echo '<div class="row">
              <div class="col-8 col-md-6"><i class="'.$icon_class.'" style="color:'.$status_color.'"></i>'.$status_text.'</div>
              <div class="col-4 col-md-6">'.$row["date"].'</div>
          </div>';
}

echo '<h5 class="mm"> عدد ايام الحضور = '.$attendance_count.'</h5><br>';
echo '<h5 class="mm"> عدد ايام الغياب = '.$absence_count.'</h5>';

mysqli_close($conn);
?>
 <!-- main section end-->