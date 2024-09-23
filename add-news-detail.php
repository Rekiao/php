<?php
    include "connect.php";
    $subject_id = $_GET['subject'];
    // Prepare and execute the SQL statement
    $news_id = $_GET['id'] ?? '';
    $id = $_GET['news_id'] ?? '';
    $query = "SELECT * FROM `detailinfo` WHERE trim(code) like '%NEWS%' AND trim(subcode) like '%$subject_id%'";
    
    // Execute the query
    $result = $con->query($query);

    // Check if the query failed
    if (!$result) {
        die("Query failed: " . $con->error);
    }

    // If rows are returned, fetch the data
    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();    
        $detailthai = $order['detailthai'];
    } else {
        echo "ไม่พบข้อมูล";
    }

    // Close the connection
    $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลรายละเอียด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body style="background-image: url('imanges/18544.jpg');background-position: center;background-size: cover;background-repeat: no-repeat;">
    
     <?php 
        include("menu-admin.php");
     ?>

     
     <section style="background-image: url('imanges/7666-3.jpg');height: 200px;width: 100%;position: relative;">
        <button  style="position: absolute;bottom: 10px;left: 10px;border: none;outline: none;background-color: #DC3545;;color: white !important;border-radius: 30px;height: 40px;width: 300px;margin-top: 10%;display: flex;justify-content: center;align-items: center;" >
            เพิ่มข้อมูลรายละเอียด
        </button>
     </section>


     <section style="margin-bottom: 400px;background:transparent;;position: relative;display: flex;justify-content: center;align-items: center;">
          <div class="row" style="margin-top: 10px;display: flex;justify-content: center;align-items: center;width: 88.5%;">
            <div class="col-12">
                <div class="container mt-4">
                <div style="width: 100%;" >
                        <h4 style="float: left;">ข้อมูลรายละเอียด</h4>
                        <h4 style="float: right;">
                        <button class="btn btn-primary"   data-bs-toggle="modal" data-bs-target="#multimidiaModal">เพิ่มข้อมูลรายละเอียด</button>
                        </h4>
                    </div>
                </div>
                <br>
                <div class="container mt-4">
                    <hr>
                    <div class="table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">รหัสงาน'</th>
                            <th scope="col" class="text-center">ไฟล์</th>
                            <th scope="col" class="text-center">รายละเอียด</th>
                            <th scope="col" class="text-center">วันที่สร้าง</th>
                            <th scope="col" class="text-center">ดำเนินการ</th>
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                include "connect.php";
                                $news_id = $_GET['id'] ?? '';
                                $query = "SELECT * FROM `newsdetailinfo` WHERE newsid = '$news_id'"; // Adjust the query to match your table structure            
                                $result = $con->query($query);

                                if ($result->num_rows > 0) {
                                    // Output data for each row
                                    while ($row = $result->fetch_assoc()) {
                                        $mul_id = $row['id']; 
                                        $path = $row['path']; // Adjust field names to match your database schema
                                        $detail = $row['detail'];
                                        $createtime = $row['createtime'];

                                        echo "<tr class='text-white'>
                                                <th scope='row' class='text-center'>{$mul_id}</th>
                                                <td class=''>{$path}</td>
                                                <td class=''>{$detail}</td>
                                                <td class='text-center'>{$createtime}</td>
                                                <td class='text-center'>  
                                                    <a href='delete-news-detail.php?id=$mul_id&&subject=$subject_id&&news_id=$id'><button class='btn btn-danger'>ลบ</button></a>
                                                </td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>ไม่มีข้อมูล</td></tr>";
                                }

                                // Close the database connection
                                $con->close();
                                ?>
                            </tbody>
                    </table>
                    </div>
                </div>
            <br>         
        </div>
     </section>


    <!-- Modal -->
    <div class="modal fade" id="multimidiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                <div style="width: 100%;" class="card">
                        <div class="card-header">
                        <div class="container mt-4">
                            <div style="width: 100%;" >
                                <h4 style="float: left;">เพิ่มข้อมูลรายละเอียด</h4>    
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="container mt-4">
                        <div class="text-center" id="result"></div>
                        <form id="multimidiaaddForm">
                            <div class="mb-3">
                                    <label for="catagory" class="form-label">รายละเอียด</label>
                                    <textarea class="form-control" id="detail" name="detail" rows="3" required></textarea>
                            </div>       
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="subject" name="subject" value="<?php echo  $subject_id;?>" >
                                <input type="hidden" class="form-control" id="newsid" name="newsid" value="<?php echo  $news_id;?>" >
                                <input  type="hidden" class="form-control" id="id" name="id" value="<?php echo  $id;?>" >
                            </div>                
                            <div class="mb-3">
                                <label for="document" class="form-label">ภาพ (.่jpg,.png,.webp)</label>
                                <input class="form-control" type="file" id="image" name="image" accept=".่jpg,.png,.webp" required>
                            </div>
                            <div style="width: 100%">
                                <button style="float: right" type="button" class="btn btn-secondary"  data-bs-dismiss="modal" aria-label="Close">ยกเลิก</button>
                                <button style="float: right" type="submit" class="btn btn-primary">เพิ่ม</button>
                            </div>
                            <br><br>
                        </form>
                    </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#multimidiaaddForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Create a FormData object to hold the form data
                var formData = new FormData(this);
                var subject = $('#subject').val();

                $.ajax({
                    url: 'act-add-news-detail.php',  // Replace with your PHP file to handle the request
                    type: 'POST',
                    data: formData,
                    contentType: false,  // Prevent jQuery from automatically setting content type
                    processData: false,  // Prevent jQuery from processing the data
                    success: function(response) {
                        if (response == 'true') {
                            // Optionally, clear the form or refresh the data on the page
                            $('#multimidiaaddForm')[0].reset();
                            $("#result").html(`
                                <h6  style="color : green">เพิ่มข้อมูลเสร็จสิ้จ</h6>
                            `);

                            // Optionally, redirect after success
                            setTimeout(function() {
                                window.location.href = 'add-news.php?subject=' + subject;  // Redirect to your desired page
                            }, 1000);
                        } else {
                            alert('Error: ' + response);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('AJAX error: ' + textStatus + ', ' + errorThrown);
                    }
                });
            });
        });
  </script>
    <!-- Footer -->
     <?php include("footer.php");?>
     <!-- Footer -->
</body>
</html>
