<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body style="background-image: url('imanges/18544.jpg');background-position: center;background-size: cover;background-repeat: no-repeat;">
    
     <?php 
     include("menu.php");
     $id = $_GET['id'];
     ?>

     
     <section style="background-image: url('imanges/7666-3.jpg');height: 200px;width: 100%;position: relative;">
            <button  style="position: absolute;bottom: 10px;left: 10px;border: none;outline: none;background-color: #DC3545;;color: white !important;border-radius: 30px;height: 40px;width: 300px;margin-top: 10%;display: flex;justify-content: center;align-items: center;" >
        รายละเอียด
        </button>
     </section>


     <section style="margin-bottom: 100px;background:transparent;;position: relative;display: flex;justify-content: center;align-items: center;">
          <div class="row" style="margin-top: 10px;display: flex;justify-content: center;align-items: center;width: 68.5%;">
                <div class="col-12">
                    <div id="cards-container" class="row">
                    <!-- Cards will be inserted here -->
                    </div>   
                    <input type="hidden" id="id" value="<?php echo $id;?>">
            </div>
            <br>         
        </div>
     </section>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
  $(document).ready(function() {
    // Initial load of data
        loadPage();
         // Handle input changes     
    });

    function loadPage() {
        var title = $('#id').val();
        $.ajax({
            url: 'news-detail-data.php?id=' + title,
            type: 'GET',
            data: {},
            dataType: 'json',
            success: function(data) {
                if (data.error) {
                    console.error("Error: " + data.error);
                    return;
                }
                
                // Clear existing content
                $('#cards-container').empty();

                
                // Append new cards
                data.forEach(function(item) {
                    $('#cards-container').append(`
                        <div style="display: flex;justify-content: center;align-items: center"> <img style="width: auto;height: 300px;" src="news/${item.path}" alt=""></div>
                        </br>
                        </br>
                        <p style="margin-top: 20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${item.detail}</p>      
                    `);
                });
                
            },
            error: function() {
                alert("An error occurred. Please try again.");
            }
        });
    }
    </script>

     
    <!-- Footer -->
     <?php include("footer.php");?>
     <!-- Footer -->
</body>
</html>
