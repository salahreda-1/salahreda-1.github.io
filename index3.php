<?php
 include 'components/layout.php';
 include 'code.php';

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
        <div class="dd">
            <ul class="land-navigation">
                <li class="ll">
                    <a href="table3.php">
                        <i class='fas fa-comment-dots icon'></i>                  
                         <span> تقديم ملاحظات </span>
                    </a>
                </li>
                <li class="ll">
                    <a href="profile3.php">
                        <i class="fa fa-id-card icon"></i>
                        <span>البيانات الشحصية</span>
                    </a>
                </li>
                <li class="ll">
                    <a href="attendance3.php">
                        <i class="fas fa-calendar-check icon"></i>
                        <span> متابعة الغياب</span>
                    </a>
                </li>
            </ul>
           </div>
 
    </section>




    <!-- main section end-->