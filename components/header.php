<?php
require 'components/conn.php';
if(isset($_POST['change_password'])){
  $old_pass = md5($_POST['current_password']);
  $user_id = $_SESSION['user_id'];
  $select = "SELECT pass FROM student WHERE id = '$user_id'";
  $result = mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($result);
  $db_password = $row['pass'];
  $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_password']));
  $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));
  if(empty($_POST['new_password']) || empty($_POST['confirm_password'])){
    echo '<script>alert("please enter new password and confirm password ")</script>';
  }elseif ($new_pass != $confirm_pass){
    echo '<script>alert("confirm password not matched!")</script>';
  }elseif ($old_pass != $db_password){
    echo '<script>alert("old password not matched!")</script>';
  }else {
    mysqli_query($conn, "UPDATE student SET pass = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
    echo '<script>alert("password updated successfully!")</script>';
    header('location:logout.php');
} 
}
?>
<form action =" " method="post" >
<nav class="navbar navbar-expand-lg  navbar-light sticky-to py-0 ">
            <a href="profile1.php" class="navbar-brand  me-0">
            <?php
                    if(@$user['image'] == ''){
                        echo '<img  class="imm"  src="./images/default-avatar.png">';
                    }else{
                        echo '<img  class="imm"  src="./uploaded_img/'.$user['image'].'">';
                    }
                    ?>
            </a>
  <form method="post" action="<?php include 'logout.php';  ?>">
    <button class="btn " type="submit" name="logout">
    <i class="pi bi-power pow" name="logout"></i>
    </button>
</form>
   <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"> <i class="pi bi-key-fill key"></i></button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title "  id="offcanvasWithBothOptionsLabel">تغيير كلمة المرور </h5>
    <button type="button" class="btn-close " data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body" id="right-wrapper">
    <div class="content-right-wrapper" id="content-right-wrapper">
      
        <form action ="" method="post" id="frmPassword" novalidate >
            <input type="hidden" name="csrfmiddlewaretoken" value="K8LYilafjsAtpnclcrMkOeFEO6dqel8Sl3EtZDGFK9D3sFuT2TJsV30qlbyYU3O7">
            <div class="rown justify-content-center no-gutters" >
                <div class="col-10">
                    <div class="rown" ><div class="col">
                        <div class="alert alert-danger justify-content-center" style="display:none;" role="alert" id="div-password-feedback"></div>
                    </div></div>


                    <div class="rown"><div class="col">
                        <div class="form-group">
                            <label class="rrow tt" for="txtOldPassword">كلمة المرور الحالية</label>
                            <input class="form-control rrow" type="password" name="current_password" placeholder="كلمة المرور الحالية" id="txtOldPassword" name="txtOldPassword" required>
                        </div>
                    </div></div>

                    <div class="rown"><div class="col">
                        <div class="form-group">
                            <label class="rrow tt" for="txtNewPassword" >كلمة المرور الجديدة</label>
                            <input class="form-control rrow" type="password" name="new_password" placeholder="كلمة المرور الجديدة" id="txtNewPassword" name="txtNewPassword" required maxlength="30">
                            <small id="passwordHelpBlock" class="form-text text-muted rrow" >كلمة المرور يجب أن يكون طولها على الأقل 8 احرف ولاتزيد عن 30 حرف، تبدأ بحرف وتحتوى على 3 من اصل 4 من الآتى (حروف كبيرة، حروف صغيرة، أرقام، علامات خاصة[!@$^*_])</small>
                        </div>
                    </div></div>

                    <div class="rown"><div class="col">
                        <div class="form-group rrow">
                            <label class="rrow tt" for="txtNewPassword2">تأكيد كلمة المرور</label>
                            <input class="form-control rrow" type="password" name="confirm_password" placeholder="تأكيد كلمة المرور" id="txtNewPassword2" name="txtNewPassword2" required maxlength="30">
                        </div>
                    </div></div>

                    <div class="rown "><div class="col" style="text-align: center">
                        <button class="btn btn-sm ls-red-btn js_update tt " name="change_password">تأكيد</button>
                    </div></div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
<?php
$currentDateTime =  date(' Y-m-d');
?>


                <div class="dd-flex">
                    <p><?php echo $currentDateTime; ?></p>

                </div>                
    
    
                <div class="nav-nav ms-auto p-4 p-lg-0">
               
                    <a href="<?php echo $locationlogo; ?>" class="  me-0">
                        <img class="im" src="img/logo.png" >
                    </a>
                    <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-list pow"></i></button>
    
                    <div class="offcanvas offcanvas-end bd" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                         <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                         </div>
    
    
                         <div class="offcanvas-body">
                           
                         <div class="d-flex flex-column  "><img
                                <?php
                                    if(@$user['image'] == ' '){
                                        echo '<img  class="imm"  src="./images/default-avatar.png"';
                                    }else{
                                        echo '<img  class="imm"  src="./uploaded_img/'.$user['image'].'"';
                                    }
               ?>> </div>
                               
    
                
    
    
                                <div class="row "><div class="col">
                                    <div class="form-group">
                                        <label class="roow     " for="txtOldPassword"><?php echo $nameStudent; ?></label>
                                    </div>
                                </div></div>
                            <div class="row "><div class="col">
                                <div class="form-group">
                                    <a href="<?php echo $locationStudent; ?>" class="rrow  tt " for="txtOldPassword"><?php echo $personalData; ?><i class="fa fa-id-card  iconn"></i></a>
                                </div>
                                
                                
                            </div></div>
                            <div class="row "><div class="col">
                                <div class="form-group">
                                    <a href="<?php echo $locationschedule; ?>" class="rrow  tt " for="txtOldPassword"><?php echo $schedule; ?><i class="far fa-calendar-alt iconn "></i></a>
                                </div>
                            </div></div>
                            <div class="row "><div class="col">
                                <div class="form-group">
                                    <a href="<?php echo $locationadsenteeism; ?>" class="rrow  tt " for="txtOldPassword"><?php echo $adsenteeism; ?><i class="fas fa-calendar-check iconn"></i></a>
                                </div>
                            </div></div>
                            
                        
                    </div>
                    </div>
              
                  </div>
          
        </div>        
        </nav>