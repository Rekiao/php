<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
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
        .news:hover{
            background-color:  rgb(247, 149, 149) !important;   
        }
        .news{
            cursor: pointer;
        }
</style>
<body style="background-image: url('imanges/18544.jpg');background-position: center;background-size: cover;background-repeat: no-repeat;">
   
      <?php include "menu.php";?>
     
      <div id="carouselExample"  class="carousel slide">
        <div style="height: 400px;" class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://i.ytimg.com/vi/DmsH6sTbaY4/maxresdefault.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://www.palangkhao.com/wp-content/uploads/2024/06/619037-1024x768.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://www.thaihealth.or.th/wp-content/uploads/2023/08/%E0%B8%A1%E0%B8%B1%E0%B8%AA%E0%B8%A2%E0%B8%B4%E0%B8%94%E0%B8%9B%E0%B8%A5%E0%B8%AD%E0%B8%94%E0%B8%9A%E0%B8%B8%E0%B8%AB%E0%B8%A3%E0%B8%B5%E0%B9%88.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="content" style="position:relative;">
        <section style="position: absolute;top: -180px;left: 10%;width: 80%;display: flex;justify-content: center;align-items: center;">
            <div class="container-fluid">
                <div class="row">
                    <!-- Sidebar -->
                    <div class="col-md-3 news-sidebar">
                        <h4>อัพเดจล่าสุด</h4>
                        <hr>
                        <ul>
                            <li><a href="news.php?subject=2">สำนักข่าวสร้างสุข</a></li>
                            <li><a href="news.php?subject=3">สาระสุขภาพ</a></li>
                            <li><a href="news.php?subject=4">ข่าวสุขภาพ</a></li>
                            <li><a href="news.php?subject=1">ทั้งหมด</a></li>
                        </ul>
                    </div>
                    <!-- Main content -->
                    <div class="col-md-9 " >
                        <div class="row">
                        <?php
                        // Include your database connection file
                        include 'connect.php'; // Assuming your database connection is in this file

                        // Query to get the news or articles from the database
                        $sql = "SELECT *,(SELECT path FROM `newsdetailinfo` WHERE newsinfo.newdetailid = newsid LIMIT 1) AS path FROM `newsinfo` WHERE 1=1 LIMIT 3"; // Modify this query based on your table structure
                        $result = $con->query($sql); // Using MySQLi

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                // Output each card
                                echo '
                                <div class="col-md-4 news-card">
                                     <a style="text-decoration: none;color: black" href="news-detail.php?id='.$row["newdetailid"].'">
                                    <div class="card news">
                                        <img src="news/' . $row["path"] . '" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h6 class="card-title">' . $row["createtime"] . '</h6>
                                            <p class="card-text">' . $row["title"] . '</p>                                       
                                        </div>
                                    </div>
                                    </a>
                                </div>';
                            }
                        } else {
                            echo 'No news found.';
                        }

                        $con->close(); // Close the database connection
                        ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section style="margin-top: 220px;display: flex;justify-content: center;align-items: center;width: 100%;height: auto">
        <div class="row">    
            <!-- Main content -->
            <div class="col-md-12 main-content">
                <!-- <div class="row">
                    <div class="col-md-8">
                        <div class="position-relative">
                            <img width="800px" height="400px" src="https://www.thaihealth.or.th/wp-content/uploads/2024/07/%E0%B9%80%E0%B8%82%E0%B9%89%E0%B8%B2%E0%B8%9E%E0%B8%A3%E0%B8%A3%E0%B8%A9%E0%B8%B2-WEB-%E0%B8%AA%E0%B8%B3%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7%E0%B8%AA%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%87%E0%B8%AA%E0%B8%B8%E0%B8%82-1536x1024.jpg" alt="Main Video">
                            <span class="play-button">&#9658;</span>
                        </div>
                        <h5 class="mt-2">งดเหล้าแค่ 3 เดือน</h5>
                        <p class="video-details"><small class="text-muted">23 กรกฎาคม 2567 • 3 views</small></p>
                        <p>คนรอบข้างคุณต้องแปลกใจ เมื่อเห็นคุณตาไม่ดำ ผิวดี พุงไม่มี เงินเหลือเก็บ เพราะลด ละ เลิกแอลกอฮอล์ ก็เปลี่ยนคุณเป็นคนใหม่ได้</p>
                    </div>
                    <div class="col-md-4 video-list">
                        <div class="mb-3">
                            <img width="200px" height="150px" src="https://www.thaihealth.or.th/wp-content/uploads/2024/07/%E0%B9%80%E0%B8%82%E0%B9%89%E0%B8%B2%E0%B8%9E%E0%B8%A3%E0%B8%A3%E0%B8%A9%E0%B8%B2-WEB-%E0%B8%AA%E0%B8%B3%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7%E0%B8%AA%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%87%E0%B8%AA%E0%B8%B8%E0%B8%82-1536x1024.jpg" alt="Thumbnail 1">
                            <p class="video-title">อ่อนเเอกล้าเลิกเหล้า</p>
                            <p class="video-details"><small class="text-muted">19 กรกฎาคม 2567 • 44 views</small></p>
                        </div>
                        <div class="mb-3">
                            <img height="200px" height="150px" src="https://www.thaihealth.or.th/wp-content/uploads/2024/07/%E0%B9%80%E0%B8%82%E0%B9%89%E0%B8%B2%E0%B8%9E%E0%B8%A3%E0%B8%A3%E0%B8%A9%E0%B8%B2-WEB-%E0%B8%AA%E0%B8%B3%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%82%E0%B9%88%E0%B8%B2%E0%B8%A7%E0%B8%AA%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%87%E0%B8%AA%E0%B8%B8%E0%B8%82-1536x1024.jpg" alt="Thumbnail 2">
                            <p class="video-title">งดเหล้า 3 เดือน</p>
                            <p class="video-details"><small class="text-muted">18 กรกฎาคม 2567 • 39 views</small></p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <section>
        <div class="container my-5">
            <div class="row">
                <!-- Carousel -->
                <div class="col-md-8">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img width="800px" height="300" src="news/1-1.webp" class="d-block w-100" alt="Slide 1">
                            </div>
                            <div class="carousel-item">
                                <img width="800px" height="300" src="news/1-2.webp" class="d-block w-100" alt="Slide 2">
                            </div>
                            <div class="carousel-item">
                                <img width="800px" height="300" src="news/1-3.webp" class="d-block w-100" alt="Slide 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <!-- Calendar -->
                <div class="col-md-4">
                    <div class="calendar">
                        <h5>กรกฎาคม 2024</h5>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>อา.</th>
                                    <th>จ.</th>
                                    <th>อ.</th>
                                    <th>พ.</th>
                                    <th>พฤ.</th>
                                    <th>ศ.</th>
                                    <th>ส.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-muted">30</td>
                                    <td class="text-muted">1</td>
                                    <td class="text-muted">2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td class="text-muted">11</td>
                                    <td>12</td>
                                    <td>13</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>15</td>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>18</td>
                                    <td>19</td>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <td>21</td>
                                    <td>22</td>
                                    <td>23</td>
                                    <td>24</td>
                                    <td>25</td>
                                    <td>26</td>
                                    <td>27</td>
                                </tr>
                                <tr>
                                    <td>28</td>
                                    <td>29</td>
                                    <td>30</td>
                                    <td>31</td>
                                    <td class="text-muted">1</td>
                                    <td class="text-muted">2</td>
                                    <td class="text-muted">3</td>
                                </tr>
                            </tbody>
                        </table>
                        <p>ไม่พบกิจกรรมในช่วงเวลานี้</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="background-image: url('imanges/elegant-white-background-with-blue-wave-lines.jpg');background-position: center;background-size: cover;background-repeat: no-repeat;">
        <div class="col-md-8" style="position: relative;;width: 100%;;display: flex;justify-content: start;align-items: center;width: 100%;padding-left: 7%;padding-right: 7%;padding-top: 10px;padding-bottom: 10px;">
            <div style="font-size: 32px;float: left;"><i class="fas fa-newspaper"></i> ข่าวสาร</div>
            <div style="font-size: 16px;position: absolute;top: 20px;right: 7%;background-color: #DC3545;;border-radius: 20px;padding: 5px;color: white;width: 100px;text-align: center;"> ทั้งหมด</div>
        </div> 
        <!-- Carousel -->
         <div class="col-md-8" style="display: flex;justify-content: center;align-items: center;width: 100%;padding-left: 7%;padding-right: 7%;padding-top: 10px;padding-bottom: 10px;">
            <div class="row">
            <?php
                        // Include your database connection file
                        include 'connect.php'; // Assuming your database connection is in this file

                        // Query to get the news or articles from the database
                        $sql = "SELECT *,(SELECT path FROM `newsdetailinfo` WHERE newsinfo.newdetailid = newsid LIMIT 1) AS path FROM `newsinfo` WHERE 1=1 LIMIT 4"; // Modify this query based on your table structure
                        $result = $con->query($sql); // Using MySQLi

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                // Output each card
                                echo '
                                 <div class="col-md-3 news-card">
                                    <a style="text-decoration: none;color: black" href="news-detail.php?id='.$row["newdetailid"].'">
                                    <div class="card" >
                                        <img src="news/' . $row["path"] . '" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">' . $row["createtime"] . '</h5>
                                            <p class="card-text">' . $row["title"] . '</p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                ';
                            }
                        } else {
                            echo 'No news found.';
                        }

                        $con->close(); // Close the database connection
                        ?>
                </div>
            </div>
         </div>
         <div class="col-md-8" style="position: relative;width: 100%;;display: flex;justify-content: center;align-items: center;width: 100%;padding-left: 7%;padding-right: 7%;padding-top: 10px;padding-bottom: 10px;">
            <div class="row">
                <!-- Card 1 -->
                <div class="col-6 news-card">
                    <div class="card bg-success" style="height: 100px;width: 550px;display: flex;justify-content: center;align-items: center;color: white;font-weight: bolder;font-size: 24px;">
                        <a target="_blank"  style="color: white;text-decoration: none;" href="news.php?subject=1">ข่าวสาร</a>
                    </div>
                </div>
                <!-- Card 1 -->
                <div class="col-6 news-card">
                    <div class="card bg-primary" style="height: 100px;width: 550px;display: flex;justify-content: center;align-items: center;color: white;font-weight: bolder;font-size: 24px;">
                        <a target="_blank" style="color: white;text-decoration: none;" href="generalannouncement.php">ประกาศ</a>
                    </div>
                </div>
            </div>
        </div> 
    </section>

    <section style="background-color: #DC3545;padding: 10px;height: 20px;">

    </section>

    <!-- Footer -->
    <?php include "footer.php";?>
    <!-- Footer -->
</body>
</html>
