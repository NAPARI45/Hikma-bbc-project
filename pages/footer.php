<?php include 'config.php';
include 'eg.php';


  $stmt = $pdo->query((new sqlcommands())->select("posts", ["*"], "", "id_asc"));
  // $stmt->execute([$id]);
  $post = $stmt->fetchAll(PDO::FETCH_ASSOC);



//   var_dump($post[1]['title']);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap');

        body {
          font-family: "Merriweather", sans-serif, Times;
        }

         .bbc-box {
            display: inline-block;
            background-color: black;
            color: white;
            width: 40px;
            height: 40px;
            padding: 5px 5px 5px 5px ;
            font-family: "Merriweather", sans-serif, Times;
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            justify-content: center;
            box-sizing: border-box;
        }
    </style> 
</head>
<body>
    <footer>
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 border-bottom border-black">
            <div class="container pb-5 ">
                <div class="row pt-5">
                    <div class="col-4 align-content-start pt-5">
                        <h4><b> Sign Up To News Briefing</b></h4>
                        <p class="small">News and expert analysis for every schedule. Get morning and evening editions of our flagship newsletter in your inbox.</p>
                        <button class="btn btn-outline-dark rounded-0 ">See more</button>
                    </div>
                    <div class="col-8 align-content-start">
                        <img src="<?php echo $post[29]['image_path']; ?>" class="img-fluid d-block mx-auto">
                    </div>
                </div>


            </div>
        </nav>
       


     


        
            <div class="container-lg bg-white pt-3  ">
                    
                    <div class="mb-2">
                        <div class="bbc-box me-2">B</div>
                        <div class="bbc-box me-2">B </div>
                        <div class="bbc-box">C</div>
                    </div>

                    <nav class="navbar navbar-expand-lg navbar-light bg-white ">
                            <div class="container-fluid p-0 " >
                                <ul class="navbar-nav flex-row flex-wrap gap-3">
                                    <li class="nav-item"><a class="nav-link p-0" href="#">Home</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#">News</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#">Sport</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#">Business</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#">Innovation</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#">Culture</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#">Arts</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#">Travel</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#">Earth</a></li>
                                </ul>
                            </div>

                    </nav>        
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle rounded-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    BBC in other languages
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                            <hr>

                            <div class="d-flex">
                                <div>Follow BBC on:</div>

                                <div class="ms-5">
                                    <button>fg</button>
                                    <button>f</button>
                                    <button>v</button>
                                    <button>cb</button>
                                    <button>f</button>
                                    <button>ft</button>
                                        
                                </div>
                            </div>

                        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 ">
                            <div class="container-fluid p-0 " >
                                <ul class="navbar-nav flex-row flex-wrap gap-3 ">
                                    <li class="nav-item small"><a class="nav-link p-0" href="#">Terms Of Use</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#">Subscription Terms</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#">About the BBC</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#">Privacy Policy</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#">Cookies</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#">Accesibilty Help</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#">Contact the BBC </a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#">Advertise With Us</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#">Do not share or sell my info</a></li>
                                </ul>
                            </div>

                        </nav>  

                            
                      

                    

            </div>
        

        
        
        
           

       
    </footer>   
    </body>
    </html>