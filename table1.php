<?php
 include 'components/layout.php';

require 'components/conn.php';
include 'code.php';
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
    <div class="card-header">
        <h5 class="card-hh" >الجدول الدراسي  </h5>

    </div>
    <div class="table">
       <img src="img/table.jpeg" alt="">

    </div>
    <!-- main section end-->


  
    
