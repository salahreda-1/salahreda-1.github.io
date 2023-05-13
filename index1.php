<?php
include 'code.php';
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
        <div class="dd">
            <ul class="land-navigation">
                <li class="ll">
                    <a href="table1.php">
                        <i class="far fa-calendar-alt icon"></i>
                        <span> الجدول الدراسي</span>
                    </a>
                </li>
                <li class="ll">
                    <a href="profile1.php">
                        <i class="fa fa-id-card icon"></i>
                        <span>البيانات الشحصية</span>
                    </a>
                </li>
                <li class="ll">
                    <a href="attendance1.php">
                        <i class="fas fa-calendar-check icon"></i>
                        <span> متابعة الغياب</span>
                    </a>
                </li>
            </ul>
           </div>
 
    </section>




    <!-- main section end-->


  
    
