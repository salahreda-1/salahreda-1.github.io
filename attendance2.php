<?php




 session_start();
 require 'components/conn.php';
 $user_id = $_SESSION['user_id'];
 $sql = "SELECT * FROM supervisor WHERE id = $user_id ";
 $result = mysqli_query($conn, $sql);
 $user = mysqli_fetch_assoc($result);
include 'components/layout.php';


$sql= "SELECT courses.name 
FROM courses 
JOIN supervisor_courses ON courses.id = supervisor_courses.courses_m
WHERE supervisor_courses.supervisor_m = $user_id";
$result = mysqli_query($conn, $sql);
$que= "SELECT teams.team_name 
FROM teams 
JOIN supervisor_team ON teams.id = supervisor_team.team_m
WHERE supervisor_team.supervisor_m = $user_id";
$answer = mysqli_query($conn, $que); 
$code = "SELECT section_name FROM sections";
$respond = mysqli_query($conn, $code); 

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
    <form id="attendance-form" method="post" action="att22.php">
    <div class="card-header">
        <h5 class="card-hh" >تسجيل حضور الطلاب  </h5>

    </div>
    <section id="land-page">
        <div class="dd">
            <ul class="land-navigation">
                
            <li class="llli">

    
    <select class="form-select k" name="attendance_type" aria-label="Default select example">
        <option selected disabled>اختر نوع الحضور</option>
        <option value="سكاشن" >سكاشن</option>
        <option value="محاضرات">محاضرات</option>
    </select>
            </li>
                
                <!-- Select the course name -->
<li class="llli">
  <select name="name_course" class="form-select k" aria-label="Default select example">
    <option selected disabled>اختر اسم المادة</option>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
    <?php endwhile; ?>
  </select>
</li>

<!-- Select the team number -->
<li class="llli">
  <select name="number_team" class="form-select k" aria-label="Default select example">
    <option selected disabled>اختر رقم الفرقة</option>
    <?php while ($rows = mysqli_fetch_assoc($answer)): ?>
      <option value="<?php echo $rows['team_name'] ?>"><?php echo $rows['team_name'] ?></option>
    <?php endwhile; ?>
  </select>
</li>

<!-- Select the section number (if attendance type is 'سكاشن') -->
<?php if(isset($_POST['attendance_type']) ) ?>
  <li class="llli">
    <select name="number_section" class="form-select k" aria-label="Default select example">
      <option selected disabled>اختر رقم السكشن</option>
      <?php while ($row = mysqli_fetch_assoc($respond)): ?>
        <option value="<?php echo $row['section_name'] ?>"><?php echo $row['section_name'] ?></option>
      <?php endwhile;?>
    </select>
  </li>

<script>
  const attendanceTypeSelect = document.querySelector('select[name="attendance_type"]');
  const sectionNumberSelect = document.querySelector('select[name="number_section"]');

  attendanceTypeSelect.addEventListener('change', () => {
    if (attendanceTypeSelect.value === 'سكاشن') {
      sectionNumberSelect.style.display = 'block';
    } else {
      sectionNumberSelect.style.display = 'none';
    }
  });
</script>
             
            </ul>
           </div>
            <div>
          <a href="att22.php"> <button type="submit" name="submit" class="btn  kk">عرض البيانات </button></a>
          
             </div>
             
             
    </section>
</form>
<?php
if(isset($_POST['submit'])) {
    $name_course = $_POST['name_course'];
    $number_team = $_POST['number_team'];
    $number_section = $_POST['attendance_type'];
    $section = $_POST['number_section'];

}
?>