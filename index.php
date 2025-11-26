
<?php include 'config.php';?>



<?php

  $stmt = $pdo->query("SELECT * FROM posts ORDER BY id ASC");
  // $stmt->execute([$id]);
  $post = $stmt->fetchAll(PDO::FETCH_ASSOC);



  // var_dump($post[0]['title']);
?>
 



<?php include 'header.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewing Page</title>
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap');

        body {
          font-family: "Merriweather", sans-serif, Times;
        }
        .bold {
          font-weight: 800;
          font-size: 15px;
        }
    </style>    
    

</head>
<body>
 
  <?php /*foreach($posts as $post)*/ ?>
  <div class="container">
    <div class="row pt-3">
      <div class="col-9 ">
        <div class="row pb-4">
          <div class="col-3 align-items-start">
            <h3><?php echo $post[0]['title']; ?></h3>
          </div>
          <div class="col-9 align-items-start">
            <img src="<?php echo $post[0]['image_path']; ?>" class="img-fluid d-block mx-auto">
          </div>
        </div>
        <div class="row align-items-start justify-content-center">
          <div class="col-3 ">
            <img src="<?php echo $post[1]['image_path']; ?>" class="img-fluid d-block mx-auto">
            <h6><?php echo $post[1]['title']; ?></h6>
            <span>10 hours ago | Politics</span>
            
            <hr>
          </div>
          <div class="col-3 ">
            <img src="<?php echo $post[2]['image_path']; ?>" class="img-fluid d-block mx-auto">
            <h6><?php echo $post[2]['title']; ?></h6><hr>
          </div>
          <div class="col-3 ">
            <img src="<?php echo $post[3]['image_path']; ?>" class="img-fluid d-block mx-auto">
            <h6><?php echo $post[3]['title']; ?></h6><hr>
          </div>
          <div class="col-3">
            <img src="<?php echo $post[4]['image_path']; ?>" class="img-fluid d-block mx-auto">
            <h6><?php echo $post[4]['title']; ?></h6><hr>
          </div>
        </div>

        
      </div>
      <div class="col-3">
        <img src="<?php echo $post[5]['image_path']; ?>" class="img-fluid d-block mx-auto">
        <h6><?php echo $post[5]['title']; ?></h6>
        <p class="small"><?php echo $post[5]['summary'];?></p><hr>
        <div class="row"><h6><?php echo $post[6]['title']; ?></h6></div><hr>
        <div class="row"><h6><?php echo $post[7]['title']; ?></h6></div><hr>      
      </div>

    </div>
    <div class="row pt-5 pb-5">
      <div class="col-3"><strong><?php echo $post[8]['title']; ?></strong></div>
      <div class="col-3"><strong><?php echo $post[9]['title']; ?></strong></div>
      <div class="col-3"><strong><?php echo $post[10]['title']; ?></strong></div>
      <div class="col-3"><strong><?php echo $post[11]['title']; ?></strong></div>
    </div>
    <hr style="height: 3px; background-color: black; opacity: 1; border: none;">
    <h6 class="bold"><b>MORE TO EXPLORE</b></h6>






     <div class="row pt-4">
      <div class="col-9 ">
        <div class="row pb-4">
          <div class="col-3 align-items-start">
            <h3><?php echo $post[12]['title']; ?></h3>
          </div>
          <div class="col-9 align-items-start">
            <img src="<?php echo $post[12]['image_path']; ?>" class="img-fluid d-block mx-auto">
          </div>
        </div>
        <div class="row align-items-start justify-content-center">
          <div class="col-3 ">
            <img src="<?php echo $post[15]['image_path']; ?>" class="img-fluid d-block mx-auto">
            <h6><?php echo $post[15]['title']; ?></h6>
            <span>10 hours ago | Politics</span>
            
            <hr>
          </div>
          <div class="col-3 ">
            <img src="<?php echo $post[16]['image_path']; ?>" class="img-fluid d-block mx-auto">
            <h6><?php echo $post[16]['title']; ?></h6><hr>
          </div>
          <div class="col-3 ">
            <img src="<?php echo $post[17]['image_path']; ?>" class="img-fluid d-block mx-auto">
            <h6><?php echo $post[17]['title']; ?></h6><hr>
          </div>
          <div class="col-3">
            <img src="<?php echo $post[18]['image_path']; ?>" class="img-fluid d-block mx-auto">
            <h6><?php echo $post[18]['title']; ?></h6><hr>
          </div>
        </div>

        
      </div>
      <div class="col-3">
        <img src="<?php echo $post[19]['image_path']; ?>" class="img-fluid d-block mx-auto">
        <h6><?php echo $post[19]['title']; ?></h6>
        <p class="small"><?php echo $post[20]['summary'];?></p><hr>
        <div class="row"><h6><?php echo $post[21]['title']; ?></h6></div><hr>
        <div class="row"><h6><?php echo $post[22]['title']; ?></h6></div><hr>      
      </div>

    </div>
    <div class="row pt-5 pb-5">
      <div class="col-3"><strong><?php echo $post[23]['title']; ?></strong></div>
      <div class="col-3"><strong><?php echo $post[24]['title']; ?></strong></div>
      <div class="col-3"><strong><?php echo $post[25]['title']; ?></strong></div>
      <div class="col-3"><strong><?php echo $post[26]['title']; ?></strong></div>
    </div>
    <hr style="height: 3px; background-color: black; opacity: 1; border: none;">
    <h6 class="bold"><b>MOST WATCHED</b></h6>

  </div>
  
</body>
</html>