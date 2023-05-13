<?php
session_start();
require 'components/conn.php';
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM student WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);


?>

<?php
 include 'components/layout.php';
?>

<body>
    <!-- Topbar Start -->
    <?php
  $nameStudent = $user['name_father'] ;
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
    <div class="card">
        <div class="card-header">
            <h5 class="card-hh" >البيانات الشخصية </h5>

        </div>
        <div class="card-body">
            <div class="main">
            <div class="d-flex flex-column bn">
             <?php
                    if($user['image'] == ''){
                        echo '<img  class="imm"  src="./images/default-avatar.png">';
                    }else{
                        echo '<img  class="imm"  src="./uploaded_img/'.$user['image'].'">';
                    }
                    ?></div>            </div>
            <div class="fi  bbn  ">
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['name'] ?></div>
                <div class="col-4 col-md-2"> اسم الابن</div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['name_father'] ?></div>
                <div class="col-4 col-md-2"> ولي امر الطالب </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['gender'] ?></div>
                <div class="col-4 col-md-2"> الجنس </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['date'] ?></div>
                <div class="col-4 col-md-2"> تاريخ الميلاد </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['social_status'] ?></div>
                <div class="col-4 col-md-2"> الحالة الاجتماعية </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['national_id_father'] ?></div>
                <div class="col-4 col-md-2"> رقم البطاقة للأب </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['national_id'] ?></div>
                <div class="col-4 col-md-2"> رقم البطاقة للإبن </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['religon'] ?></div>
                <div class="col-4 col-md-2"> الديانة  </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['national'] ?></div>
                <div class="col-4 col-md-2"> الجنسية  </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['residence'] ?></div>
                <div class="col-4 col-md-2"> محل الاقامة  </div>
            </div>
        </div>
        </div>
    </div>
    <!-- main section end-->