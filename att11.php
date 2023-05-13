<?php
require 'components/conn.php';
include 'code.php';
$user_id = $_SESSION['user_id'];

 
$course_name = $_SESSION['name'] ;
   
if(isset($_POST['scetion'])){
    $type = $_POST['scetion'];
    $name ;

}else if(isset($_POST['lecture'])){
    $type =$_POST['lecture'];
    $name ;

}



include 'components/layout.php';
?>
<body>
    <!-- Topbar Start -->
    <?php
  $nameStudent =  strtok ($user['name']," ") ;
  $personalData = "البيانات الشخصية  ";
  $locationStudent = ('profile1.php');
  $schedule ="الجدول الدراسي  ";
  $locationschedule = ('table1.php');
  $adsenteeism ="متابعة الغياب  ";
  $locationadsenteeism = ('attendance1.php');
  $locationlogo = ('index1.php');

  include 'components/header.php';
?>
    <!-- Topbar End -->
    <!-- main section start-->
    <section id="land-page">
        <div class="dd m">
            <ul class="land-navigation">
                <li class="lll">
                    <a >
                        <span class="j"><?php echo $type ?></span>
                    </a>
                </li>
                <li class="lll">
                    <a >
                        <span class="j"><?php echo $course_name ?></span>
                    </a>
                </li>
        </div>  
        <?php
$escaped_course_name = mysqli_real_escape_string($conn, $course_name);

// retrieve attendance and absence data from the database
if($type == "سكاشن"){
    $sql = "SELECT courses.name, attendance.date, attendance.status
    FROM courses 
    JOIN attendance ON courses.id = attendance.course_id 
    WHERE attendance.student_id = $user_id AND courses.name = '$escaped_course_name' AND attendance.secion_id IS NOT NULL";
    $result = mysqli_query($conn, $sql);
}else{
    $sql = "SELECT courses.name, attendance.date, attendance.status
    FROM courses 
    JOIN attendance ON courses.id = attendance.course_id 
    WHERE attendance.student_id = $user_id AND courses.name = '$escaped_course_name' AND attendance.secion_id IS NULL";
    $result = mysqli_query($conn, $sql);

}
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