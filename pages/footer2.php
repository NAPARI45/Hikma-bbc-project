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
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 pt-5 border-bottom border-black "></nav>
            <div class="container-lg bg-white pt-3">
                    
                    <div class="mb-2">
                        <div class="bbc-box me-2">B</div>
                        <div class="bbc-box me-2">B </div>
                        <div class="bbc-box">C</div>
                    </div>

                    <nav class="navbar navbar-expand-lg navbar-light bg-white ">
                            <div class="container-fluid p-0 " >
                                <ul class="navbar-nav flex-row flex-wrap gap-3">
                                    <li class="nav-item"><a class="nav-link p-0" href="#" style="color:black; font-size: 15px;">Home</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#" style="color:black; font-size: 15px;">News</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#" style="color:black; font-size: 15px;">Sport</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#" style="color:black; font-size: 15px;">Business</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="innovation.php" style="color:black; font-size: 15px;">Innovation</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#" style="color:black; font-size: 15px;">Culture</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#" style="color:black; font-size: 15px;">Arts</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#" style="color:black; font-size: 15px;">Travel</a></li>
                                    <li class="nav-item"><a class="nav-link p-0" href="#" style="color:black; font-size: 15px;">Earth</a></li>
                                </ul>
                            </div>

                    </nav>        
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle rounded-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="color:black">
                                    BBC in other languages
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">English</a></li>
                                    <li><a class="dropdown-item" href="#">French</a></li>
                                    <li><a class="dropdown-item" href="#">Spanish</a></li>
                                </ul>
                            </div>
                            <hr>

                            <div class="d-flex">
                                <div style="font-weight: bolder; color:black">Follow BBC on:</div>

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
                                    <li class="nav-item small"><a class="nav-link p-0" href="#" style="font-size: small;">Terms Of Use</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#" style="font-size: small;">Subscription Terms</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#" style="font-size: small;">About the BBC</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#" style="font-size: small;">Privacy Policy</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#" style="font-size: small;">Cookies</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#" style="font-size: small;">Accesibilty Help</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#" style="font-size: small;">Contact the BBC </a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#" style="font-size: small;">Advertise With Us</a></li>
                                    <li class="nav-item small"><a class="nav-link p-0" href="#" style="font-size: small;">Do not share or sell my info</a></li>
                                </ul>
                            </div>

                        </nav>  
                        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 ">
                            <div class="container-fluid p-0 " style="font-size: small;" >
                               Copyright 2025 BBC. All rights reserved. The BBC is not responsible for the content of external sites. Read about our approach to external linking.
                            </div>

                        </nav>  

                            
                      

                    

            </div>
        
        

        
        
        
           

       
    </footer>   
    </body>
    </html>