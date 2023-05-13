<?php
 session_start();
 require 'components/conn.php';
 $user_id = $_SESSION['user_id'];
 $sql = "SELECT * FROM supervisor WHERE id = $user_id ";
 $result = mysqli_query($conn, $sql);
 $user = mysqli_fetch_assoc($result);
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
    <section id="land-page">
        <div class="dd">
            <ul class="land-navigation">
                <li class="ll">
                    <a href="table2.php">
                        <i class="far fa-calendar-alt icon"></i>
                        <span>  متابعة حضور الطلاب  </span>
                    </a>
                </li>
                <li class="ll">
                    <a href="profile2.php">
                        <i class="fa fa-id-card icon"></i>
                        <span> بيانات الطلاب</span>
                    </a>
                </li>
                <li class="ll">
                    <a href="attendance2.php">
                        <i class="fas fa-calendar-check icon"></i>
                        <span> تسجيل حضور الطلاب </span>
                    </a>
                </li>
            </ul>
           </div>
 
    </section>
    <!-- main section end-->