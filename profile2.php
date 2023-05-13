
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
    <div class="card">
        <div class="card-header">
            <h5 class="card-hh" >بيانات الطلاب  </h5>
        </div>
        <form method="post">

    <div class="input-group u rounded" >
    <input type="search" class="form-control x" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="search" />
    <button class="input-group-text" id="search-addon" type="submit">
      <i class="fas fa-search"></i>
    </button>
</div>
</form>

<?php
if (isset($_POST['search'])) {
  $search = $_POST['search'];
  $sql = $conn->prepare("SELECT * FROM student WHERE id = '$search'");
  $sql->execute();
  $result = $sql->get_result();
  $user = mysqli_fetch_assoc($result);
  if ($result->num_rows > 0) {
    ?>
    <div class="card-body">
      <div class="main">
      <div class="d-flex flex-column bn">
             <?php
                    if($user['image'] == ''){
                        echo '<img  class="imm"  src="./images/default-avatar.png">';
                    }else{
                        echo '<img  class="imm"  src="./uploaded_img/'.$user['image'].'">';
                    }
                    ?></div>        <div class="row">
          <div class="col-8 col-md-10"><?php echo $user['name']; ?></div>
          <div class="col-4 col-md-2">الاسم</div>
        </div>
        <div class="row">
          <div class="col-8 col-md-10"><?php echo $user['id']; ?></div>
          <div class="col-4 col-md-2">الكود</div>
        </div>
        <div class="row">
          <div class="col-8 col-md-10"><?php echo $user['gender']; ?></div>
          <div class="col-4 col-md-2">الجنس</div>
        </div>
        <div class="row">
          <div class="col-8 col-md-10"><?php echo $user['date']; ?></div>
          <div class="col-4 col-md-2">تاريخ الميلاد</div>
        </div>
        <div class="row">
          <div class="col-8 col-md-10"><?php echo $user['social_status']; ?></div>
          <div class="col-4 col-md-2">الحالة الاجتماعية</div>
        </div>
        <div class="row">
          <div class="col-8 col-md-10"><?php echo $user['national_id'] ?></div>
          <div class="col-4 col-md-2"> رقم البطاقة  </div>   
        </div>
        <div class="row">
          <div class="col-8 col-md-10"><?php echo $user['name_father'] ?></div>
          <div class="col-4 col-md-2"> اسم الاب  </div>   
        </div>
        <div class="row">
          <div class="col-8 col-md-10"><?php echo $user['constraint_status'] ?></div>
          <div class="col-4 col-md-2"> حالة قيد </div>
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
<?php
  }
}
?>
    <!-- main section end-->
