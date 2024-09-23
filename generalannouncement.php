<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประกาศทั่วไป</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<style>
    .news-sidebar {
            background-color: #DC3545;
            padding: 20px;
            color: white;
        }
        .news-sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .news-sidebar ul li {
            margin: 10px 0;
        }
        .news-sidebar ul li a {
            color: white;
            text-decoration: none;
        }
        .card img {
            object-fit: cover;
        }
        .card-body {
            padding: 10px;
        }
        .news-card {
            margin-bottom: 20px;
        }

        .sidebar {
            background-color: #00a79d;
            color: white;
            padding: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 10px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }
        .main-content img {
            width: 100%;
            border-radius: 8px;
        }
        .video-list img {
            width: 100%;
            border-radius: 8px;
        }
        .video-title {
            font-size: 18px;
            font-weight: bold;
        }
        .video-details {
            font-size: 14px;
            color: grey;
        }
        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 48px;
            color: orange;
        }

        .carousel-item img {
            max-height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }
        .calendar {
            background-color:  #DC3545;
            padding: 20px;
            border-radius: 8px;
            color: white;
            text-align: center;
        }
        .calendar h5 {
            margin-bottom: 20px;
        }
        .calendar .table {
            margin: 0;
        }
</style>
<body style="background-image: url('imanges/18544.jpg');background-position: center;background-size: cover;background-repeat: no-repeat;">
   
     <?php include "menu.php";?>

      <section style="background-image: url('imanges/7666-3.jpg');height: 200px;width: 100%;position: relative;">
        <button  style="position: absolute;bottom: 10px;left: 10px;border: none;outline: none;background-color: #DC3545;;color: white !important;border-radius: 30px;height: 40px;width: 300px;margin-top: 10%;display: flex;justify-content: center;align-items: center;" >
            ประกาศทั่วไป
        </button>
     </section>

     <section style="background:transparent;;position: relative;display: flex;justify-content: center;align-items: center;">
          <div class="row" style="margin-top: 10px;display: flex;justify-content: center;align-items: center;width: 68.5%;">
            <div class="col-12">
                <h2>ประกาศทั่วไป</h2>
                <form id="announceForm">
                <div class="row">
                        <div class="col-3">
                            <input name="title" id="title" type="text" class="form-control" placeholder="ค้นหา..." style="border-radius: 20px;border: 2px solid #DC3545;">
                        </div>
                        <div class="col-3">
                            <select name="subject" id="subject" class="form-control" style="border-radius: 20px;border: 2px solid #DC3545;">
                                <?php
                                    $query = "SELECT * FROM `detailinfo` WHERE code = 'ANNOUNCE'";
                                    $result = $con->query($query);
                                    if (!$result) {
                                        die("Query failed: " . $con->error);
                                    }
                                    while ($row = $result->fetch_assoc()) {
                                        $subcode = $row['subcode'];
                                        $detailthai = $row['detailthai'];
                                        echo "<option value='$subcode'>$detailthai</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-3"> 
                            <select name="createtime" id="createtime" class="form-control" style="border-radius: 20px;border: 2px solid #DC3545;">
                                <option value="">เรียงลำดับข้อมูล</option>
                                <?php
                                    $query = "SELECT * FROM `detailinfo` WHERE code = 'SORT'";
                                    $result = $con->query($query);
                                    if (!$result) {
                                        die("Query failed: " . $con->error);
                                    }
                                    while ($row = $result->fetch_assoc()) {
                                        $subcode = $row['subcode'];
                                        $detailthai = $row['detailthai'];
                                        echo "<option value='$subcode'>$detailthai</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </form>   
            </div>
            <br>         
        </div>
     </section>

     <section style="background:transparent;;position: relative;display: flex;justify-content: center;align-items: center;">
      <div class="row" style="margin-top: 10px;display: flex;justify-content: center;align-items: center;width: 68.5%;">
        <div class="col-12">         
            <div id="cards-container" class="row">
                <!-- Cards will be inserted here -->
            </div>
            
            <div id="pagination" style="margin-top: 50px;margin-bottom: 20px;display: flex;justify-content: center;align-items: center;">
                <!-- Pagination buttons will be inserted here -->
            </div>
            <br>     
        </div>
        <br>         
    </div>
 </section>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
   $(document).ready(function() {
    // Initial load of data
        loadPage(1);

        // Attach event handlers to form elements to trigger search
        $('#announceForm').on('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Get form data
            var title = $('#title').val();
            var subject = $('#subject').val();
            var createtime = $('#createtime').val();

            // Load data with current form values
            loadPage(1, title, subject, createtime);
        });

         // Handle input changes
        $('#announceForm input, #announceForm select').on('change', function() {
            // Get form values
            var title = $('#title').val();
            var subject = $('#subject').val();
            var createtime = $('#createtime').val();

            // Load data with current form values
            loadPage(1, title, subject, createtime);
        });
    });

    function loadPage(page, title = '', subject = '', createtime = '') {
        $.ajax({
            url: 'generalannouncement-data.php',
            type: 'GET',
            data: { page: page, title: title, subject: subject, createtime: createtime },
            dataType: 'json',
            success: function(data) {
                if (data.error) {
                    console.error("Error: " + data.error);
                    return;
                }
                
                // Clear existing content
                $('#cards-container').empty();
                $('#pagination').empty();
                
                // Append new cards
                data.forEach(function(item) {
                    $('#cards-container').append(`                    
                          <div class="row-12">
                            <div style="border: 2px solid  #DC3545;margin-top: 10px;width: 100%;height: 80px;border-radius: 20px;background-color: white;">
                                <div class="row">
                                    <div class="col-2" >
                                        <div style="display: flex;justify-content: center;align-items: center;border-radius: 10px;margin: 10px;width: 60px;height: 60px;background-color: #DC3545;">
                                        <i style="color: white;font-size: 32px;" class="fas fa-file-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-8" style="display: flex;justify-content: start;align-items: center;">
                                        <b>${item.title}</b>
                                    </div>
                                    <div class="col-2" style="display: flex;justify-content: center;align-items: center;">
                                        <button style="border: none;background: transparent;">อ่านเพิ่มเติม <i style="color: #DC3545;" class="fas fa-arrow-alt-circle-right"></i></button>
                                    </div>
                                </div>           
                            </div>
                        </div>
                    `);
                });
                
                // Append pagination buttons (assuming you have 4 pages for simplicity)
                $('#pagination').append(`
                    <button style="background-color: transparent;border: none;" onclick="loadPage(${page - 1})">ก่อนหน้า</button>
                    <button style="background-color: transparent;border: none;" onclick="loadPage(1)">1</button>
                    <button style="background-color: transparent;border: none;" onclick="loadPage(2)">2</button>
                    <button style="background-color: transparent;border: none;" onclick="loadPage(3)">3</button>
                    <button style="background-color: transparent;border: none;" onclick="loadPage(${page + 1})">ต่อไป</button>
                `);
            },
            error: function() {
                alert("An error occurred. Please try again.");
            }
        });
    }
    </script>


    <!-- Footer -->
    <?php include "footer.php";?>
    <!-- Footer -->
</body>
</html>
