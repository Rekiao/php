
<?php 
    include "connect.php";
    $id = $_GET['id'];
    // Prepare and execute the SQL statement
    $stmt = $con->prepare("SELECT * FROM `infographicinfo` WHERE id = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();    
        $title = $order['title'];
        $path = $order['path'];
    } else {
        echo "ไม่พบข้อมูล";
        exit();
    }

    $stmt->close();
    $con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
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

        .card-custom-infographic:hover{
            background-color: rgb(247, 149, 149);
            cursor: pointer;
        }
</style>
<body style="background-image: url('imanges/18544.jpg');background-position: center;background-size: cover;background-repeat: no-repeat;">
      <?php include "menu.php";?>

      <section style="background-image: url('imanges/7666-3.jpg');height: 200px;width: 100%;position: relative;">
        <button  style="position: absolute;bottom: 10px;left: 10px;border: none;outline: none;background-color: #DC3545;;color: white !important;border-radius: 30px;height: 40px;width: 300px;margin-top: 10%;display: flex;justify-content: center;align-items: center;" >
            อินโฟกราฟิก&nbsp;<i style="font-size: 8px;" class="fas fa-circle"></i> &nbsp;<?php echo $title;?>
        </button>
     </section>

     <section style="background:transparent;;position: relative;display: flex;justify-content: center;align-items: center;">
          <div class="row" style="margin-top: 10px;display: flex;justify-content: center;align-items: center;width: 68.5%;">
           
            <br>         
        </div>
     </section>
   
    <!-- Footer -->
    <?php include "footer.php";?>
    <!-- Footer -->
</body>
</html>
