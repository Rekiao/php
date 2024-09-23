<?php 
    session_start();
    include "connect.php";
    $login_check = 0;  
    if (isset($_SESSION['id'])) {
        $login_check = 1;   
        // Retrieve the order ID from the URL
        $user_id = $_SESSION['id'] ?? null;

        if ($user_id) {
            // Prepare and execute the SQL statement
            $stmt = $con->prepare("SELECT * FROM `accountinfo` WHERE id = ?");
            $stmt->bind_param('s', $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $order = $result->fetch_assoc();    
                $name = $order['name'];
                $surname = $order['surname'];
                $status = $order['status'];
                // Map status codes to messages
                $statusMessages = [
                    0 => "ผู้ดูแลระบบ",
                    1 => "สมาชิกทั่วไป",
                ];
            
                $statusMessage = $statusMessages[$status] ?? "สถานะไม่รู้จัก";
            } else {
                echo "ไม่พบข้อมูล";
                exit();
            }

            $stmt->close();
            $con->close();
        }
    }  
?>
<nav class="navbar navbar-expand-lg bg-danger" 
      style="height:50px;font-size: 14px;">
        <div class="container-fluid">
            <form style="width: 100%;" >
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="width: 100%;float: right;display: flex;justify-content: end; align-items: center">
                    <?php if ($login_check === 0): ?>  <!-- If not logged in -->
                        <li class="nav-item">
                            <a class="nav-link text-white" 
                            style="cursor: pointer; background-color: white; color: red !important; border-radius: 30px; width: 100px; height: 30px; display: flex; justify-content: center; align-items: center;"  
                            data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                            เข้าสู่ระบบ
                            </a>
                        </li>   
                    <?php else: ?>  <!-- If logged in -->
                        <li class="nav-item">
                            <a class="nav-link text-white" 
                            style="cursor: pointer; background-color: white; color: red !important; border-radius: 30px; width: 300px; height: 30px; display: flex; justify-content: center; align-items: center;" 
                            data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                            <?php echo 'สถานะ : (' . $statusMessage . ') ' . $name . ' ' . $surname; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" 
                            style="cursor: pointer; background-color: white; color: red !important; border-radius: 30px; width: 100px; height: 30px; margin-left: 10px; display: flex; justify-content: center; align-items: center;" 
                            data-bs-toggle="modal" data-bs-target="#logout">
                            ออกจากระบบ
                            </a>
                        </li>
                    <?php endif; ?>  
                  </ul>
            </form>
          </div>    
        </div>
      </nav>
      <nav class="navbar navbar-expand-lg bg-white" style="font-size: 24px;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
             <img src="imanges/logo.png" width="240px" height="80px" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index-admin.php"><i class="fas fa-home"></i>&nbsp;หน้าหลัก</a>
              </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-newspaper"></i>&nbsp;ข่าวสาร
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="add-news.php?subject=2">เพิ่มข้อมูลสำนักข่าวสร้างสุข </a></li>
                  <li><a class="dropdown-item" href="add-news.php?subject=3">เพิ่มข้อมูลสาระสุขภาพ </a></li>
                  <li><a class="dropdown-item" href="add-news.php?subject=4">เพิ่มข้อมูลข่าวสุขภาพ </a></li>
                  <!-- <li><a class="dropdown-item" href="calendar.php">ปฎิทินกิจกรรม</a></li> -->
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-photo-video"></i>&nbsp;สื่อสร้างสุข
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="add-multimidia.php">เพิ่มข้อมูลมัลธิมิเดีย</a></li>
                  <li><a class="dropdown-item" href="add-infographic.php">เพิ่มข้อมูลอินโฟกราฟิก </a></li>
                  <li><a class="dropdown-item" href="add-gallery.php">เพิ่มข้อมูลแกลอรี่</a></li>
                </ul>
              </li>
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bullhorn"></i>&nbsp;ประกาศ
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="generalannouncement.php">เพิ่มข้อมูลประกาศทั่วไป</a></li>
                </ul>
              </li>            -->
            </ul>
            <form class="d-flex" role="search">
              
            </form>
          </div>
        </div>
      </nav>

<!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logout" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ออกจากระบบ</h5>
      </div>
      <div class="modal-body">
        <!-- Display login result -->
        <p>คุณต้องการยืนยันการออกจากระบบหรือไม่ ?</p>
        <div class="text-center" id="logoutResult"></div>
      </div>
      <div class="modal-footer">
        <!-- Updated button for Bootstrap 5 -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">ยกเลิก</button>
        <form id="logoutForm">
            <button type="submit" class="btn btn-primary">ยืนยัน</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="card">
            <div class="card-body">
                <section style="padding: 10px;">
                    <form id="loginForm">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-center">
                            <h2>เข้าสู่ระบบ</h2>
                        </div> 
                        <!-- Display login result -->
                        <div class="text-center" id="loginResult"></div>
                        <hr>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="email" name="email" style="font-size: 16px;" class="form-control form-control-lg" placeholder="กรอกชื่อบัญชี" required />
                        </div>

                        <div data-mdb-input-init class="form-outline mb-3">
                            <input type="password" id="password" name="password" style="font-size: 16px;" class="form-control form-control-lg" placeholder="กรอกรหัสผ่าน..." required />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" id="rememberMe" />
                            <label class="form-check-label" for="rememberMe"> จดจำรหัสผ่าน </label>
                            </div>
                            <a href="#!" class="text-body">ลืมรหัสผ่าน ?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">เข้าสู่ระบบ</button>
                        </div>                  
                    </form>
                </section>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery (from CDN) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
  // Handle form submission
  $("#loginForm").on("submit", function(e) {
    e.preventDefault(); // Prevent the form from submitting the traditional way

    var username = $("#email").val();  // Fix input field ID
    var password = $("#password").val();

    // Send AJAX request
    $.ajax({
      url: 'act-login.php',  // Path to your PHP login script
      type: 'POST',
      data: {
        username: username,
        password: password
      },
      success: function(response) {
        // Handle success response
        if (response == "true") {  // Compare response string correctly
          $("#loginResult").html(`
              <h6  style="color : green">ล็อกอินเสร็จสิ้น กำลังเข้าสู่ระบบ ...</h6>
          `);

          // Optionally, redirect after success
          setTimeout(function() {
            window.location.href = 'index-admin.php';  // Redirect to your desired page
          }, 2000);
        } else {
          $("#loginResult").html(`
            <h6 style="color : red">การล็อกอินล้มเหลว ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</h6>
          `);
        }
      },
      error: function() {
        // Handle error
        $("#loginResult").html('<div class="alert alert-danger">An error occurred. Please try again later.</div>');
      }
    });
  });

  $("#logoutForm").on("submit", function(e) {
    e.preventDefault(); // Prevent the form from submitting the traditional way

    // Send AJAX request
    $.ajax({
      url: 'act-logout.php',  // Path to your PHP login script
      type: 'POST',
      data: {},
      success: function(response) {
        // Handle success response
        if (response == "true") {  // Compare response string correctly
          $("#logoutResult").html(`
              <h6 style="color : green">ออกจากระบบเสร็จสิ้น กำลังเข้าออกจากระบบ ...</h6>
          `);

          // Optionally, redirect after success
          setTimeout(function() {
            window.location.href = 'index.php';  // Redirect to your desired page
          }, 2000);
        } else {
          $("#logoutResult").html(`
            <h6 style="color : red">ออกจากระบบล้มเหลว</h6>
          `);
        }
      },
      error: function() {
        // Handle error
        $("#loginResult").html('<div class="alert alert-danger">An error occurred. Please try again later.</div>');
      }
    });
  });
});

</script>