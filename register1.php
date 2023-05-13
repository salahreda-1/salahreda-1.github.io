<?php

require 'components/conn.php';
if (isset($_POST['save_profile'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $name_father = strtok($name, " ");
    $first_word = $name_father;
    $remaining_words = explode(" ", substr($name, strlen($first_word)+1));
    $remaining_name = implode(" ", $remaining_words);    
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $national_id = mysqli_real_escape_string($conn,$_POST['national_id']);
    $national_id_father = mysqli_real_escape_string($conn,$_POST['national_id_father']);
    $residence = mysqli_real_escape_string($conn,$_POST['residence']);
    $religon= mysqli_real_escape_string($conn,$_POST['religon']);
    $national = mysqli_real_escape_string($conn,$_POST['national']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $social_status = mysqli_real_escape_string($conn,$_POST['social_status']);
    $date = mysqli_real_escape_string($conn, $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day']);
    $pass=md5($_POST['pass']);
    $cpass =md5($_POST['cpass']);

    
    $select = "SELECT * FROM student WHERE national_id = '$national_id' AND pass = '$pass'";
    $result = mysqli_query($conn, $select);
    
    if(mysqli_num_rows($result) > 0) {
        echo '<script>alert("User already exists!")</script>';

    } else {
        if($pass != $cpass) {
            echo '<script>alert("Passwords do not match!")</script>';

        } else {
            $insert = "INSERT INTO student (name, id, residence, national_id,national_id_father, religon, national, gender, social_status, date, pass,name_father) VALUES ('$name', '$id','$residence', '$national_id','$national_id_father ', '$religon', '$national', '$gender', '$social_status', '$date', '$pass','$remaining_name')";
            if(mysqli_query($conn, $insert)) {
                header('location: login1.php');
            } else {
                echo '<script>alert("Error inserting user into database!")</script>';

            }
        }
    }


}
?>
<?php
include 'components/layout.php';
?>

<body>
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
                                    <div class="yyy">
                                        <div class="form-outline mb-4">
                                            <input class="form-control me-2" style="text-align: end;" type="Name" name="name" placeholder="الاسم كما في البطاقه" aria-label="Name" >
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input class="form-control me-2" style="text-align: end;" type="Name" name="id" placeholder=" الكود الجامعي" aria-label="Name" >
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input class="form-control me-2" style="text-align: end;" type="text" name="national_id" placeholder="الرقم القومي" aria-label="Email" >
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input class="form-control me-2" style="text-align: end;" type="text" name="national_id_father" placeholder="  الرقم القومي للأب" aria-label="Email" >
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input class="form-control me-2" style="text-align: end;" type="text" name="residence" placeholder="محل الاقامة كما في البطاقة " aria-label="Email" >
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input class="form-control me-2" style="text-align: end;" type="text" name="religon" placeholder="الديانة " aria-label="Email" >
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input class="form-control me-2" style="text-align: end;" type="text" name="national" placeholder="   الجنسية" aria-label="Email" >
                                        </div>
                                        <div class="form-outline mb-4">
                                            <select class="form-select" name="gender" style="text-align: end;" aria-label="Default select example">
                                                <option selected disabled>الجنس</option>
                                                <option value="ذكر">ذكر</option>
                                                <option value="انثي">انثي</option>
                                            </select>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <select class="form-select" name="social_status" style="text-align: end;" aria-label="Default select example">
                                                <option selected disabled>الحالة الاجتماعية</option>
                                                <option value="اعزب">اعزب</option>
                                                <option value="متزوج">متزوج</option>
                                            </select>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <h6 style="text-align: end; color: #fff;">تاريخ الميلاد</h6>
                                            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <select class="form-select" name="year" style="text-align: end;" aria-label="Default select example">
                                                        <option selected disabled>السنة </option>
                                                        <?php
                                                        // Get the current year
                                            $current_year = date('Y');
                                            // Loop through the years from 1900 to the current year
                                            for ($year = 1960; $year <= $current_year; $year++) {
                                            // Print an option element for each year
                                            echo "<option value=\"$year\">$year</option>";
                                            }
                                            ?>
                                            </select>
                                            </li>
                                            <li class="nav-item" role="presentation">
                <select class="form-select" name="month" style="text-align: end;" aria-label="Default select example">
                  <option selected disabled>الشهر</option>
                  <option value="1">يناير</option>
                  <option value="2">فبراير</option>
                  <option value="3">مارس</option>
                  <option value="4">ابرايل</option>
                  <option value="5">مايو</option>
                  <option value="6">يونيو</option>
                  <option value="7">يوليو</option>
                  <option value="8">اغسطس</option>
                  <option value="9">سبتمبر</option>
                  <option value="10">اكتوبر</option>
                  <option value="11">نوفمبر</option>
                  <option value="12">ديسمبر</option>
                </select>
              </li>
              <li class="nav-item" role="presentation">
                <input class="form-control me-2" name="day" style="text-align: end;" type="day" placeholder="اليوم" aria-label="password">
              </li>
            </ul>

            <div class="form-outline mb-4">
              <input class="form-control me-2" style="text-align: end;" name="pass" type="password" placeholder="الرقم السري" aria-label="password">
            </div>

            <div class="form-outline mb-4">
              <input class="form-control me-2" style="text-align: end;" name="cpass" type="password" placeholder="تأكيد الرقم السري" aria-label="Repeat password">
            </div>

            <div class="form-check d-flex justify-content-center mb-4">
              <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked aria-describedby="registerCheckHelpText" />
              <label class="form-check-label" style="text-align: end;" for="registerCheck">لقد قرأت ووافقت على الشروط</label>
            </div>

            <input type="submit" name="save_profile" value="تسجيل" class="btn btn-primary btt btn-block mb-3">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- Carousel End -->

       <!-- places Start -->


    <!-- Back to Top -->