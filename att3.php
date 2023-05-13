<?php
require 'components/conn.php';
include 'code.php';

if (isset($_POST['course_name'])) {
    $course_name = $_POST['course_name'];
}

$_SESSION['name'] = $course_name;




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
    <section id="land-page">
        <div class="dd m">
            <ul class="land-navigation">
                <li class="lll">
                    <a >
                        <span class="j"><?php echo $_SESSION['name'];?></span>
                    </a>
                </li>
        </div>  
        <div class="dd">
            <ul class="land-navigation">
                <form action="att33.php" method="post">
                <li class="lll">
                    <button class="lll" name="scetion" value="سكاشن">
                        <span class="j">سكاشن</span>
                    </button>
                </li>
                <li class="lll">
                <button class="lll" name="lecture" value="محاضرات">
                        <span class="j">محاضرات</span>
                    </button>
                </li>
                </form>
            </ul>
            <?php 
            if(isset($_POST['scetion'])){
                $type = $_POST['scetion'];
            }else if(isset($_POST['lecture'])){
                 $type =$_POST['lecture'];
            }
            ?>
        </div>  
        <?php
 
?>

    </section>
    <!-- main section end-->
