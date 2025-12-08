<?php include 'config.php';
include 'header.php';

  $category_id = 5;

  $stmt = $pdo->prepare("SELECT * FROM posts WHERE category_id = ? ORDER BY id ASC");
  $stmt->execute([$category_id]);
  $post = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innovation</title>
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
    <h1 class="text-center mt-3 " style="font-weight: bold; ">Innovation</h1>

    <div class="container">
        <div class="row">
            <div class="col 9">
        
                <div class="row pb-4">
                    <div class="col-3 align-items-start">
                        <h3><a href="view.php?id=<?php echo $post[0]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[0]['title']; ?></a></h3>
                    </div>
                    <div class="col-9 align-items-start">
                        <img src="<?php echo $post[0]['image_path']; ?>" class="img-fluid d-block mx-auto">
                    </div>
        
                </div>
               
                <div class="row align-items-start justify-content-center">
                    <?php
                   
                    for ($i = 1; $i < 5; $i++) {
                        
                        
                        $current_post = $post[$i];
                    ?>
                        <div class="col-3">
                            <img src="<?php echo $current_post['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
                            <h6><a href="view.php?id=<?php echo $current_post['id']; ?>" class="text-dark text-decoration-none"> <?php echo $current_post['title']; ?></a></h6><hr>
                        </div>
                    <?php
                    } 
                    ?>
                </div>
            </div>


            
            <div class="col-3">
                <img src="<?php echo $post[5]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
                <h6><a href="view.php?id=<?php echo $post[5]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[4]['title']; ?></a></h6>
                <p style="font-size: 10px;"><?php echo $post[5]['summary'];?></p><hr>
                <?php 
                for($i = 6; $i <=7; $i++) {

                
                    $current_post = $post[$i];
                ?>
                    <div class="row"><h6><a href="view.php?id=<?php echo $current_post['id'];?>" class="text-dark text-decoration-none"><?php echo $current_post['title'];?></a></h6><hr></div>
                    


                <?php

                }
                ?>
            </div>

            <hr style="height: 3px; background-color: black; opacity: 1; border: none;" class="mt-5">
            <h6 style="font-weight: bold;" class="mb-1"><b>ARTIFICIAL INTELLIGENCE</b></h6>


            <div class="row pt-3 pb-5">
                <div class="col-4">
                    <img src="<?php echo $post[8]['image_path']; ?>" class="img-fluid d-block mx-auto">
                    <h6><a href="view.php?id=<?php echo $post[8]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[8]['title']; ?></a></h6>
                </div>
                <div class="col-4">
                    <img src="<?php echo $post[9]['image_path']; ?>" class="img-fluid d-block mx-auto">
                    <h6><a href="view.php?id=<?php echo $post[9]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[9]['title']; ?></a></h6>
                </div>
                <div class="col-4">
                    <img src="<?php echo $post[10]['image_path']; ?>" class="img-fluid d-block mx-auto">
                    <h6><a href="view.php?id=<?php echo $post[10]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[10]['title']; ?></a></h6>
                </div>
            </div>

            <hr style="height: 3px; background-color: black; opacity: 1; border: none;" class="mt-5">
            <h6 style="font-weight: bold;" class="mb-1"><b>FEATURES</b></h6>


            <div class="row pt-3 pb-5">
                <div class="col-3 pt-5">
                    <h3><a href="view.php?id=<?php echo $post[11]['id']; ?>" class="text-dark text-decoration-none fw-bold"> <?php echo $post[11]['title']; ?></a></h3>
                    <h6><a href="view.php?id=<?php echo $post[11]['id']; ?>" class="text-dark text-decoration-none fw-light font-size: small"> <?php echo $post[11]['summary']; ?></a></h6>

                </div>
                <div class="col-9">
                    <img src="<?php echo $post[11]['image_path']; ?>" class="img-fluid d-block mx-auto">
                </div>

                <div class="row pt-5">
                    <div class="col-9">
                        <div class="row">
                            <div class="col-3">
                                <h3><a href="view.php?id=<?php echo $post[12]['id']; ?>" class="text-dark text-decoration-none fw-bold"> <?php echo $post[12]['title']; ?></a></h3>
                                <h6><a href="view.php?id=<?php echo $post[12]['id']; ?>" class="text-dark text-decoration-none fw-light font-size: small"> <?php echo $post[12]['summary']; ?></a></h6>
                            </div>

                            <div class="col-9">
                                <img src="<?php echo $post[12]['image_path']; ?>" class="img-fluid d-block mx-auto">
                             </div>
                            <div class="row pt-5">
                                    <div class="col-3">
                                        <img src="<?php echo $post[14]['image_path']; ?>" class="img-fluid d-block mx-auto">
                                        <h6><a href="view.php?id=<?php echo $post[14]['id']; ?>" class="text-dark text-decoration-none fw-bold"> <?php echo $post[14]['title']; ?></a></h6>
                                        <h6><a href="view.php?id=<?php echo $post[14]['id']; ?>" class="text-dark text-decoration-none fw-light font-size: small"> <?php echo $post[14]['summary']; ?></a></h6><hr>
                                    </div>
                                    <div class="col-3">
                                        <img src="<?php echo $post[15]['image_path']; ?>" class="img-fluid d-block mx-auto">
                                        <h6><a href="view.php?id=<?php echo $post[15]['id']; ?>" class="text-dark text-decoration-none fw-bold"> <?php echo $post[15]['title']; ?></a></h6>
                                        <h6><a href="view.php?id=<?php echo $post[15]['id']; ?>" class="text-dark text-decoration-none fw-light font-size: small"> <?php echo $post[15]['summary']; ?></a></h6><hr>
                                    </div>
                                    <div class="col-3">
                                        <img src="<?php echo $post[16]['image_path']; ?>" class="img-fluid d-block mx-auto">
                                        <h6><a href="view.php?id=<?php echo $post[16]['id']; ?>" class="text-dark text-decoration-none fw-bold"> <?php echo $post[16]['title']; ?></a></h6>
                                        <h6><a href="view.php?id=<?php echo $post[16]['id']; ?>" class="text-dark text-decoration-none fw-light font-size: small"> <?php echo $post[16]['summary']; ?></a></h6><hr>
                                    </div>
                                    <div class="col-3">
                                        <img src="<?php echo $post[17]['image_path']; ?>" class="img-fluid d-block mx-auto">
                                        <h6><a href="view.php?id=<?php echo $post[17]['id']; ?>" class="text-dark text-decoration-none fw-bold"> <?php echo $post[17]['title']; ?></a></h6>
                                        <h6><a href="view.php?id=<?php echo $post[17]['id']; ?>" class="text-dark text-decoration-none fw-light font-size: small"> <?php echo $post[17]['summary']; ?></a></h6><hr>
                                    </div>
                                    <div class="row pt-5">
                                        <div class="col-6">
                                            <h6><a href="view.php?id=<?php echo $post[18]['id']; ?>" class="text-dark text-decoration-none fw-bold"> <?php echo $post[18]['title']; ?></a></h6>
                                            <h6><a href="view.php?id=<?php echo $post[18]['id']; ?>" class="text-dark text-decoration-none fw-light font-size: small"> <?php echo $post[18]['summary']; ?></a></h6><hr>
                                        </div>
                                            <div class="col-6">
                                            <h6><a href="view.php?id=<?php echo $post[19]['id']; ?>" class="text-dark text-decoration-none fw-bold"> <?php echo $post[19]['title']; ?></a></h6>
                                            <h6><a href="view.php?id=<?php echo $post[19]['id']; ?>" class="text-dark text-decoration-none fw-light font-size: small "> <?php echo $post[19]['summary']; ?></a></h6><hr>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <img src="<?php echo $post[13]['image_path']; ?>" class="img-fluid d-block mx-auto">
                        <h6><a href="view.php?id=<?php echo $post[13]['id']; ?>" class="text-dark text-decoration-none fw-bold"> <?php echo $post[13]['title']; ?></a></h6>
                        <h6><a href="view.php?id=<?php echo $post[13]['id']; ?>" class="text-dark text-decoration-none fw-light font-size: small"> <?php echo $post[13]['summary']; ?></a></h6><hr>


                    </div>

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
                                                    <img src="<?php echo $post[20]['image_path']; ?>" class="img-fluid w-100 d-block">
                                                </div>
                                                <div class="col-4">
                                                    <img src="<?php echo $post[21]['image_path']; ?>" class="img-fluid w-100 d-block">
                                                </div>
                                                <div class="col-4">
                                                    <img src="<?php echo $post[22]['image_path']; ?>" class="img-fluid w-100 d-block">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="container-fluid" >
                                            <div class="row justify-content-center g-3">
                                                <div class="col-4">
                                                    <img src="<?php echo $post[23]['image_path']; ?>" class="img-fluid w-100 d-block">
                                                </div>
                                                <div class="col-4">
                                                    <img src="<?php echo $post[24]['image_path']; ?>" class="img-fluid w-100 d-block">
                                                </div>
                                                <div class="col-4">
                                                    <img src="<?php echo $post[25]['image_path']; ?>" class="img-fluid w-100 d-block">
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
            </div><hr>
                <div class="row pt-5">
                <div class="col-1 ps-5" style="font-size:smaller" >
                    3 hours
                </div>
                <div class="col-7">
                    <h4><a href="view.php?id=<?php echo $post[29]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[29]['title']; ?></a></h4>
                    <h6><a href="view.php?id=<?php echo $post[29]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[29]['summary']; ?></a></h6>
                </div>
                <div class="col-4">
                <img src="<?php echo $post[29]['image_path']; ?>" class="img-fluid d-block mx-auto">

                </div>
            </div><hr>
            <div class="row pt-5">
                <div class="col-1 ps-5" style="font-size:smaller" >
                    3 hours
                </div>
                <div class="col-7">
                    <h4><a href="view.php?id=<?php echo $post[30]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[30]['title']; ?></a></h4>
                    <h6><a href="view.php?id=<?php echo $post[30]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[30]['summary']; ?></a></h6>
                </div>
                <div class="col-4">
                <img src="<?php echo $post[30]['image_path']; ?>" class="img-fluid d-block mx-auto">

                </div>
            </div><hr>
            <div class="row pt-5">
                <div class="col-1 ps-5" style="font-size:smaller" >
                    3 hours
                </div>
                <div class="col-7">
                    <h4><a href="view.php?id=<?php echo $post[31]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[31]['title']; ?></a></h4>
                    <h6><a href="view.php?id=<?php echo $post[31]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[31]['summary']; ?></a></h6>
                </div>
                <div class="col-4">
                <img src="<?php echo $post[31]['image_path']; ?>" class="img-fluid d-block mx-auto">

                </div>
            </div><hr>
            <div class="row pt-5">
                <div class="col-1 ps-5" style="font-size:smaller" >
                    3 hours
                </div>
                <div class="col-7">
                    <h4><a href="view.php?id=<?php echo $post[32]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[32]['title']; ?></a></h4>
                    <h6><a href="view.php?id=<?php echo $post[32]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[32]['summary']; ?></a></h6>
                </div>
                <div class="col-4">
                <img src="<?php echo $post[32]['image_path']; ?>" class="img-fluid d-block mx-auto">

                </div>
            </div><hr>
            <div class="row pt-5">
                <div class="col-1 ps-5" style="font-size:smaller" >
                    3 hours
                </div>
                <div class="col-7">
                    <h4><a href="view.php?id=<?php echo $post[33]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[33]['title']; ?></a></h4>
                    <h6><a href="view.php?id=<?php echo $post[33]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[33]['summary']; ?></a></h6>
                </div>
                <div class="col-4">
                <img src="<?php echo $post[33]['image_path']; ?>" class="img-fluid d-block mx-auto">

                </div>
            </div><hr>
            <div class="row pt-5 pb-5">
                <div class="col-1 ps-5" style="font-size:smaller" >
                    3 hours
                </div>
                <div class="col-7">
                    <h4><a href="view.php?id=<?php echo $post[34]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[34]['title']; ?></a></h4>
                    <h6><a href="view.php?id=<?php echo $post[34]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[34]['summary']; ?></a></h6>
                </div>
                <div class="col-4">
                <img src="<?php echo $post[34]['image_path']; ?>" class="img-fluid d-block mx-auto">

                </div>
            </div><hr>

            <div class="container d-flex justify-content-center">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                    <label class="btn btn-outline-dark" for="btnradio1">1</label> <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btnradio2">2</label> <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                    <label class="btn btn-outline-dark" for="btnradio3">3</label> 
                </div>
            </div>

        </div>



</body>
</html>
<?php include  'footer2.php' ?>