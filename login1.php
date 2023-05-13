<?php
require 'components/conn.php';
session_start();
if (isset($_POST['submit'])){
$national_id = mysqli_real_escape_string($conn, $_POST['national_id']);

$pass = mysqli_real_escape_string($conn, md5($_POST['pass']));
$sql= "SELECT * FROM student WHERE national_id = '$national_id' && pass = '$pass' ";
if(mysqli_num_rows(mysqli_query($conn,$sql)) >0 ){
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['user_id'] = $row ['id'];
  header("location: index1.php");

}else{
  echo '<script>alert("incorrect email or password!")</script>';
}
}
?>

<?php
 include 'components/layout.php';
?>
<body>

 <!-- Topbar End -->
      <!-- Carousel Start -->
      <form action =" " method="post" >
      <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/back.jpeg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-start">
                                    
                                    <div class="cppp">
                                        <ul class="nav nav-pills cppp nav-justified mb-3" id="ex1" role="tablist">
                                            <li class="nav-item" role="presentation">
                                              <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="login1.php" role="tab"
                                                aria-controls="pills-login" aria-selected="true">طالب</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                              <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="login2.php" role="tab"
                                                aria-controls="pills-register" aria-selected="false">مشرف</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                              <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="login3.php" role="tab"
                                                aria-controls="pills-register" aria-selected="false">ولي امر</a>
                                            </li>
                                          </ul>
                                          
                                         
                                           <!-- Pills content -->
                                        <div class="tab-content   ">
                                            <div class="tab-pane fade show active cppp" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                                              
                                               
                                          
                                                
                                          
                                                <!-- Email input -->
                                                <div class="form-outline mb-4">
                                                  
                                                  <input class="form-control me-2" style="text-align: end;" type="text" name="national_id" placeholder="الرقم القومي" aria-label="Email" >
                                                </div>
                                          
                                                <!-- Password input -->
                                                <div class="form-outline mb-4">
                                                    <input class="form-control me-2" style="text-align: end;" type="password" name="pass" placeholder="الرقم السري" aria-label="password" >
                                        
                                                 
                                                </div>
                                          
                                                <!-- 2 column grid layout -->
                                                <div class="row mb-4">
                                                  <div class="col-md-6 d-flex justify-content-center">
                                                    <!-- Checkbox -->
                                                    <div class="form-check mb-3 mb-md-0">
                                                        <label class="form-check-label" for="loginCheck"> تذكرني  </label>

                                                      <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                                    </div>
                                                  </div>
                                          
                                           
                                                </div>
                                          
                                                <!-- Submit button -->
                                                <input type="submit" name="submit" value="تسجيل الدخول" class="btn btt btn-block mb-4">
                                          
                                                <!-- Register buttons -->
                                                <div class="text-center yy "  >
                                                  <p>  <a href="register1.php " class="text-decoration-underline" style="color: #f05757;"> سجل معنا   </a>      </p>
                                                </div>
                                              
                                            </div>
                                           
                                          </div>
                                          
                                        </div>
                                 
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
          
        </div>
    </div>
    <!-- Carousel End -->

       <!-- places Start -->

   





  


    <!-- Back to Top -->