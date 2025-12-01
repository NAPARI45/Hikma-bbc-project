
<?php include 'config.php';?>



<?php

  $stmt = $pdo->query("SELECT * FROM posts ORDER BY id DESC");
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
            <h3><a href="view.php?id=<?php echo $post[0]['id']; ?>" class="text-dark"> <?php echo $post[0]['title']; ?></a></h3>
          </div>
          <div class="col-9 align-items-start">
            <img src="<?php echo $post[0]['image_path']; ?>" class="img-fluid d-block mx-auto">
          </div>
        </div>
        <div class="row align-items-start justify-content-center">
          <div class="col-3 ">
            <img src="<?php echo $post[1]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[1]['id']; ?>" class="text-dark"> <?php echo $post[1]['title']; ?></a></h6>
            <span>10 hours ago | Politics</span>
            
            <hr>
          </div>
          <div class="col-3 ">
            <img src="<?php echo $post[2]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[2]['id']; ?>" class="text-dark"> <?php echo $post[2]['title']; ?></a></h6><hr>
          </div>
          <div class="col-3 ">
            <img src="<?php echo $post[3]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[3]['id']; ?>" class="text-dark"> <?php echo $post[3]['title']; ?></a></h6><hr>
          </div>
          <div class="col-3">
            <img src="<?php echo $post[4]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[4]['id']; ?>" class="text-dark"> <?php echo $post[4]['title']; ?></a></h6><hr>
          </div>
        </div>

        
      </div>
      <div class="col-3">
        <img src="<?php echo $post[5]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
        <h6><a href="view.php?id=<?php echo $post[5]['id']; ?>" class="text-dark"> <?php echo $post[5]['title']; ?></a></h6>
        <p style="font-size: 10px;"><?php echo $post[5]['summary'];?></p><hr>
        <div class="row"><h6><a href="view.php?id=<?php echo $post[6]['id']; ?>" class="text-dark"> <?php echo $post[6]['title']; ?></a></h6></div><hr>
        <div class="row"><h6><a href="view.php?id=<?php echo $post[7]['id']; ?>" class="text-dark"> <?php echo $post[7]['title']; ?></a></h6></div><hr>      
      </div>

    </div>
    <div class="row pt-5 pb-5">
      <div class="col-3 small"><strong><a href="view.php?id=<?php echo $post[8]['id']; ?>" class="text-dark"> <?php echo $post[8]['title']; ?></a></strong></div>
      <div class="col-3 small"><strong><a href="view.php?id=<?php echo $post[9]['id']; ?>" class="text-dark"> <?php echo $post[9]['title']; ?></a></strong></div>
      <div class="col-3 small"><strong><a href="view.php?id=<?php echo $post[10]['id']; ?>" class="text-dark"> <?php echo $post[10]['title']; ?></a></strong></div>
      <div class="col-3 small"><strong><a href="view.php?id=<?php echo $post[11]['id']; ?>" class="text-dark"> <?php echo $post[11]['title']; ?></a></strong></div>
    </div>
    <hr style="height: 3px; background-color: black; opacity: 1; border: none;">
    <h6 class="bold"><b>MORE TO EXPLORE</b></h6>






     <div class="row pt-4">
      <div class="col-9 ">
        <div class="row pb-4">
          <div class="col-3 align-items-start">
            <h3><a href="view.php?id=<?php echo $post[12]['id']; ?>" class="text-dark"> <?php echo $post[12]['title']; ?></a></h3>
          </div>
          <div class="col-9 align-items-start">
            <img src="<?php echo $post[12]['image_path']; ?>" class="img-fluid d-block mx-auto">
          </div>
        </div>
        <div class="row align-items-start justify-content-center">
          <div class="col-3 ">
            <img src="<?php echo $post[15]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[15]['id']; ?>" class="text-dark"> <?php echo $post[15]['title']; ?></a></h6>
            <span>10 hours ago | Politics</span>
            
            <hr>
          </div>
          <div class="col-3 ">
            <img src="<?php echo $post[16]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[16]['id']; ?>" class="text-dark"> <?php echo $post[16]['title']; ?></a></h6><hr>
          </div>
          <div class="col-3 ">
            <img src="<?php echo $post[17]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[17]['id']; ?>" class="text-dark"> <?php echo $post[17]['title']; ?></a></h6><hr>
          </div>
          <div class="col-3">
            <img src="<?php echo $post[18]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[18]['id']; ?>" class="text-dark"> <?php echo $post[18]['title']; ?></a></h6><hr>
          </div>
        </div>

        
      </div>
      <div class="col-3">
        <img src="<?php echo $post[19]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
        <h6><a href="view.php?id=<?php echo $post[19]['id']; ?>" class="text-dark"> <?php echo $post[19]['title']; ?></a></h6>
        <p style="font-size: 10px;"><?php echo $post[20]['summary'];?></p><hr>
        <div class="row"><h6><a href="view.php?id=<?php echo $post[21]['id']; ?>" class="text-dark"> <?php echo $post[21]['title']; ?></a></h6></div><hr>
        <div class="row"><h6><a href="view.php?id=<?php echo $post[22]['id']; ?>" class="text-dark"> <?php echo $post[22]['title']; ?></a></h6></div><hr>      
      </div>

    </div>
    <div class="row pt-5 pb-5">
      <div class="col-3 small"><strong><a href="view.php?id=<?php echo $post[23]['id']; ?>" class="text-dark"> <?php echo $post[23]['title']; ?></a></strong></div>
      <div class="col-3 small"><strong><a href="view.php?id=<?php echo $post[24]['id']; ?>" class="text-dark"> <?php echo $post[24]['title']; ?></a></strong></div>
      <div class="col-3 small"><strong><a href="view.php?id=<?php echo $post[25]['id']; ?>" class="text-dark"> <?php echo $post[25]['title']; ?></a></strong></div>
      <div class="col-3 small"><strong><a href="view.php?id=<?php echo $post[26]['id']; ?>" class="text-dark"> <?php echo $post[26]['title']; ?></a></strong></div>
    </div>
    <hr style="height: 3px; background-color: black; opacity: 1; border: none;">
    <h6 class="bold"><b>MOST WATCHED</b></h6>

  </div>
  
</body>
</html>

<?php include 'footer.php'?>