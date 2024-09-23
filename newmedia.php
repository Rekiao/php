<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


    <!-- Footer -->
    <?php include "footer.php";?>
    <!-- Footer -->
</body>
</html>
