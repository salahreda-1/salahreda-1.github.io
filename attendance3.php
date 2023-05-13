<?php

require 'components/conn.php';
include 'code.php';

$sql= "SELECT courses.name 
FROM courses 
JOIN student_courses ON courses.id = student_courses.course_m
WHERE student_courses.student_m = $user_id";
$result = mysqli_query($conn, $sql);

?>

<?php
 include 'components/layout.php';
?>
<body>
    <!-- Topbar Start -->
    <?php
  $nameStudent =  strtok ($user['name']," ") ;
  $personalData = "البيانات الشخصية  ";
  $locationStudent = ('profile3.php');
  $schedule ="تقديم الملاحظات  ";
  $locationschedule = ('table3.php');
  $adsenteeism ="متابعة الغياب  ";
  $locationadsenteeism = ('attendance3.php');
  $locationlogo = ('index3.php');

  include 'components/header.php';
  ?>
    <!-- Topbar End -->
    <!-- main section start-->
    <div class="card-header">
        <h5 class="card-hh" >متابعة الغياب  </h5>
    </div>
    <section id="land-page">
    <div class="dd">
        <ul class="land-navigation">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <li class="lll">
                <form action="att3.php" method="post">
                    <button class="lll" name="course_name" value="<?= $row['name']; ?>">
                        <span class="j"><?= $row['name']; ?></span>
                    </button>
                </form>
            </li>
            <?php endwhile;  
            
            if (isset($_POST['course_name'])) {
                $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
                $query = "SELECT * FROM courses WHERE name = '{$course_name}'";
                $result = mysqli_query($conn, $query);
                $course = mysqli_fetch_assoc($result);
                echo "<form method='post' action='att1.php'>";
                echo "<input type='hidden' name='course_name' value='" . $course['name'] . "'>";
                echo "</form>";
            }
            mysqli_close($conn);
            ?>
        </ul>
    </div>
</section>

    <!-- main section end-->