<?php
 include 'components/layout.php';
 include 'code.php';

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
    <div>
         <div class="card-header">
          <h5 class="card-hh" >تقديم ملاحظات   </h5>

         </div>
         <div class="last ">

            <h4 style="color:#f05757;" >اهلا بك ا/ <?php echo $user['name_father'] ?></h4>
            <h5 style="color: black;" >...يمكنك ترك ملاحظتك هنا وسوف يتم التواصل معك من خلال احد مشرفي النظام </h5>
         </div>

         <div style="align-self: center;" class="form-group">
             <textarea class="form-control ml" id="exampleFormControlTextarea1" rows="3"></textarea>
         </div>
         <section id="land-page">
          <div>
             <a href="index3.php"> <button type="button" class="btn  kk">ارسال  </button></a>
          </div>
        </section>
    </div>
  
   




    <!-- main section end-->