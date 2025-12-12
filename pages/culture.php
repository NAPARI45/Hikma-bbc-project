<?php include 'config.php';

include 'header.php';

$category_id = 6;

$stmt = $pdo->prepare('SELECT * FROM posts WHERE category_id = ? ORDER BY id ASC');
$stmt->execute([$category_id]);
$post = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culture</title>
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
    <h2 class="text-center mt-3" style ="font-weight: bold">Culture</h2>
    <div class="container">
       
        <div class="row pt-3">
            
            <div class="col-3 pb-5">
                <img src="<?php echo $post[0]['image_path']; ?>" class="img-fluid d-block mx-auto">
                <h6><a href="view.php?id=<?php echo $post[0]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[0]['title']; ?></a></h6><hr>
                <img src="<?php echo $post[2]['image_path']; ?>" class="img-fluid d-block mx-auto">
                <h6><a href="view.php?id=<?php echo $post[2]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[2]['title']; ?></a></h6><hr>
            </div>
            <div class="col-6">
                <img src="<?php echo $post[1]['image_path']; ?>" class="img-fluid d-block mx-auto">
                <h3><a href="view.php?id=<?php echo $post[1]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[1]['title']; ?></a></h3><hr>
            </div>
            <div class="col-3 pb-5">
                <img src="<?php echo $post[3]['image_path']; ?>" class="img-fluid d-block mx-auto">
                <h6><a href="view.php?id=<?php echo $post[3]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[3]['title']; ?></a></h6><hr>
                <img src="<?php echo $post[5]['image_path']; ?>" class="img-fluid d-block mx-auto">
                <h6><a href="view.php?id=<?php echo $post[5]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[5]['title']; ?></a></h6><hr>
        

            </div>
            <hr style="height: 3px; background-color: black; opacity: 1; border: none;">
            <h6 style="font-weight: bold;" class="mb-1"><b>ENTERTAINMENT NEWS></b></h6>

            <div class="row fw-bold pt-3 pb-5">
                <div class="col-3 "><a href="view.php?id=<?php echo $post[6]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[6]['title']; ?></a></div>
                <div class="col-3 "><a href="view.php?id=<?php echo $post[7]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[7]['title']; ?></a></div>
                <div class="col-3 "><a href="view.php?id=<?php echo $post[8]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[8]['title']; ?></a></div>
                <div class="col-3 "><a href="view.php?id=<?php echo $post[9]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[9]['title']; ?></a></div>
            </div>

            <hr style="height: 3px; background-color: black; opacity: 1; border: none;" class="mt-5">
            <h6 style="font-weight: bold;" class="mb-1"><b>WATCH LIST</b></h6>

            <div class="row pt-3 pb-5">
                <div class="col-6">
                <img src="<?php echo $post[10]['image_path']; ?>" class="img-fluid d-block mx-auto">
                <h6><a href="view.php?id=<?php echo $post[10]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[10]['title']; ?></a></h6>
                </div>
                <div class="col-6">
                <img src="<?php echo $post[11]['image_path']; ?>" class="img-fluid d-block mx-auto">
                <h6><a href="view.php?id=<?php echo $post[11]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[11]['title']; ?></a></h6>
                </div>
            </div>
            <hr style="height: 3px; background-color: black; opacity: 1; border: none;" class="mt-5">
            <h6 style="font-weight: bold;" class="mb-1"><b>FROM OUR CULTURE EDITORS</b></h6>

            <div class="row pt-3 pb-5">
                <div class="col-4">
                    <img src="<?php echo $post[12]['image_path']; ?>" class="img-fluid d-block mx-auto">
                    <h6><a href="view.php?id=<?php echo $post[12]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[12]['title']; ?></a></h6>
                </div>
                <div class="col-4">
                    <img src="<?php echo $post[13]['image_path']; ?>" class="img-fluid d-block mx-auto">
                    <h6><a href="view.php?id=<?php echo $post[13]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[13]['title']; ?></a></h6>
                </div>
                <div class="col-4">
                    <img src="<?php echo $post[14]['image_path']; ?>" class="img-fluid d-block mx-auto">
                    <h6><a href="view.php?id=<?php echo $post[14]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[14]['title']; ?></a></h6>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <img src="<?php echo $post[15]['image_path']; ?>" class="img-fluid d-block mx-auto">
                    <h6><a href="view.php?id=<?php echo $post[15]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[15]['title']; ?></a></h6>
                </div>
                <div class="col-4">
                    <img src="<?php echo $post[16]['image_path']; ?>" class="img-fluid d-block mx-auto">
                    <h6><a href="view.php?id=<?php echo $post[16]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[16]['title']; ?></a></h6>
                </div>
                <div class="col-4">
                    <img src="<?php echo $post[17]['image_path']; ?>" class="img-fluid d-block mx-auto">
                    <h6><a href="view.php?id=<?php echo $post[17]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[17]['title']; ?></a></h6>
                </div>
            </div>
            
        </div>
      
    </div>
        <div class="container-fluid bg-black px-0" style="padding-bottom: 30px;">

            <div class="row g-0">

                <hr style="height: 3px; background-color: white; opacity: 1; border: none;" class="mt-3">
                <h6 style="font-weight: bold; color:azure;" class="mb-1"><b>ARTS IN MOTION</b></h6>
           
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container-fluid" >
                                    <div class="row justify-content-center g-3">
                                        <div class="col-4">
                                            <img src="<?php echo $post[18]['image_path']; ?>" class="img-fluid w-100 d-block">
                                        </div>
                                         <div class="col-4">
                                            <img src="<?php echo $post[19]['image_path']; ?>" class="img-fluid w-100 d-block">
                                        </div>
                                        <div class="col-4">
                                            <img src="<?php echo $post[20]['image_path']; ?>" class="img-fluid w-100 d-block">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container-fluid" >
                                    <div class="row justify-content-center g-3">
                                        <div class="col-4">
                                            <img src="<?php echo $post[21]['image_path']; ?>" class="img-fluid w-100 d-block">
                                        </div>
                                        <div class="col-4">
                                            <img src="<?php echo $post[22]['image_path']; ?>" class="img-fluid w-100 d-block">
                                        </div>
                                        <div class="col-4">
                                            <img src="<?php echo $post[23]['image_path']; ?>" class="img-fluid w-100 d-block">
                                        </div>
                                    </div>
                                </div>
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
            
                    
                    

            
            
                    
        </div>

        
        <div class="container mt-4 pb-5">
            <hr style="height: 3px; background-color: black; opacity: 1; border: none;" class="mt-5">
            <h6 style="font-weight: bold;" class="mb-1"><b>MORE CULTURE</b></h6>

            <div class="row pt-5">
                <div class="col-1 ps-5" style="font-size:smaller" >
                    3 hours
                </div>
                <div class="col-7">
                    <h4><a href="view.php?id=<?php echo $post[24]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[24]['title']; ?></a></h4>
                    <h6><a href="view.php?id=<?php echo $post[24]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[24]['summary']; ?></a></h6>
                </div>
                <div class="col-4">
                <img src="<?php echo $post[24]['image_path']; ?>" class="img-fluid d-block mx-auto">

                </div>
            </div><hr>
            <div class="row pt-5">
                <div class="col-1 ps-5" style="font-size:smaller" >
                    3 hours
                </div>
                <div class="col-7">
                    <h4><a href="view.php?id=<?php echo $post[25]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[25]['title']; ?></a></h4>
                    <h6><a href="view.php?id=<?php echo $post[25]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[25]['summary']; ?></a></h6>
                </div>
                <div class="col-4">
                <img src="<?php echo $post[25]['image_path']; ?>" class="img-fluid d-block mx-auto">

                </div>
            </div><hr>
            <div class="row pt-5">
                <div class="col-1 ps-5" style="font-size:smaller" >
                    3 hours
                </div>
                <div class="col-7">
                    <h4><a href="view.php?id=<?php echo $post[26]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[26]['title']; ?></a></h4>
                    <h6><a href="view.php?id=<?php echo $post[26]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[26]['summary']; ?></a></h6>
                </div>
                <div class="col-4">
                <img src="<?php echo $post[26]['image_path']; ?>" class="img-fluid d-block mx-auto">

                </div>
            </div><hr>
                <div class="row pt-5">
                <div class="col-1 ps-5" style="font-size:smaller" >
                    3 hours
                </div>
                <div class="col-7">
                    <h4><a href="view.php?id=<?php echo $post[27]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[27]['title']; ?></a></h4>
                    <h6><a href="view.php?id=<?php echo $post[27]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[27]['summary']; ?></a></h6>
                </div>
                <div class="col-4">
                <img src="<?php echo $post[27]['image_path']; ?>" class="img-fluid d-block mx-auto">

                </div>
            </div><hr>
                <div class="row pt-5">
                <div class="col-1 ps-5" style="font-size:smaller" >
                    3 hours
                </div>
                <div class="col-7">
                    <h4><a href="view.php?id=<?php echo $post[28]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[28]['title']; ?></a></h4>
                    <h6><a href="view.php?id=<?php echo $post[28]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[28]['summary']; ?></a></h6>
                </div>
                <div class="col-4">
                <img src="<?php echo $post[28]['image_path']; ?>" class="img-fluid d-block mx-auto">

                </div>
            </div>
        </div>


</body>

</html>
<?php include 'footer2.php'?>