<?php
 


 session_start();
 require 'components/conn.php';
 $user_id = $_SESSION['user_id'];
 $sql = "SELECT * FROM supervisor WHERE id = $user_id ";
 $result = mysqli_query($conn, $sql);
 $user = mysqli_fetch_assoc($result);



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
    <form id="attendance-form" method="post" action="att2.php">

    <div class="card-header">
        <h5 class="card-hh" >متابعة حضور الطلاب </h5>

    </div>
    <section id="land-page">
        <div class="dd">
            <ul class="land-navigation">
                <li class="llli">
                    <select name="attendance_type" class="form-select k" aria-label="Default select example">
                        <option selected disabled>اختر نوع الحضور    </option>
                        <option value="سكاشن">سكاشن</option>
                        <option value="محاضرات">محاضرات</option>
                        
                      </select>
                </li>
                <li class="llli">
                    <select name="name_course" class="form-select k" aria-label="Default select example">
                        <option selected disabled>   اختر اسم المادة</option>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
    <?php endwhile; ?>
                      </select>
                </li>
                <li class="llli">
                    <select name="number_team" class="form-select k" aria-label="Default select example">
                        <option selected disabled>اختر رقم الفرقة </option>
                        <?php while ($rows = mysqli_fetch_assoc($answer)): ?>
      <option value="<?php echo $rows['team_name'] ?>"><?php echo $rows['team_name'] ?></option>
    <?php endwhile; ?>

                      </select>
                </li>
                <li class="llli">
                <input class="form-control k" type="text" name="id_student" placeholder="ادخل الرقم التعريفي للطالب ">
                 </li>
              
            </ul>
           </div>
          
            <div>
          <a href="att2.php"> <button type="submit" name="submit" class="btn  kk">عرض البيانات </button></a>
             </div>

 
    </section>

                        </form>
    <?php
if(isset($_POST['submit'])) {
    $name_course = $_POST['name_course'];
    $number_team = $_POST['number_team'];
    $attendance_type = $_POST['attendance_type'];
    $id_student = $_POST['id_student'];

}
?>


    <!-- main section end-->
