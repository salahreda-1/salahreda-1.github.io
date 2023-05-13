<?php
require 'components/conn.php';
include 'code.php';




?>


<?php
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
    <div class="card">
    <div class="card-header">
        <h5 class="card-hh">البيانات الشخصية</h5>
    </div>
    <div class="card-body">
        <div class="main">
            <div class="d-flex flex-column bn">
                <div class="d-flex flex-column bn">
             <?php
                    if($user['image'] == ''){
                        echo '<img  class="imm" width="200px" height="200px" src="./images/default-avatar.png">';
                    }else{
                        echo '<img  class="imm" width="200px" height="200px" src="./uploaded_img/'.$user['image'].'">';
                    }
                    ?></div>
            </div>
            <div class="fi bbn">
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['name'] ?></div>
                <div class="col-4 col-md-2"> الاسم </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['id'] ?></div>
                <div class="col-4 col-md-2"> الكود </div>
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
                <div class="col-8 col-md-10"><?php echo $user['national_id'] ?></div>
                <div class="col-4 col-md-2"> رقم البطاقة </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['name_father'] ?></div>
                <div class="col-4 col-md-2"> اسم الاب </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['constraint_status'] ?></div>
                <div class="col-4 col-md-2"> حالة قيد </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['religon'] ?></div>
                <div class="col-4 col-md-2"> الديانة </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['national'] ?></div>
                <div class="col-4 col-md-2"> الجنسية </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-10"><?php echo $user['residence'] ?></div>
                <div class="col-4 col-md-2"> محل الاقامة  </div>
            </div>
    </div>
    </div>
    </div>
    <!-- main section end-->


  
    
