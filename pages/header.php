

<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 border-bottom border-grey">
  
  <div class="container-fluid bg-white">

      
    <div class="d-flex">
       <!-- LEFT: Search button (large screens) -->
    <button class="btn btn-light rounded-0 bg-white d-none d-lg-block">
      Search
    </button>
    </div>

    <!-- LEFT: Toggler (small screens) -->
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <!-- Make it look like a search button if you want -->
      <span class="navbar-toggler-icon"></span>
    </button>
    


      <!-- Center menu -->
    <a class="navbar-brand mx-auto d-flex align-items-center" href="#">
    
      <div class="bbc-box me-2">B</div>
      <div class="bbc-box me-2">B </div>
      <div class="bbc-box">C</div>
    </a>

    

   

    <!-- Right buttons -->
    <div class="d-flex">
      <a href="register.php">
      <button class="btn btn-dark rounded-0 me-2">Register</button>
      </a>
      <?php if (isset($_SESSION['user_id'])): ?>
        <a href="logout.php">
        <button class="btn btn-outline-dark rounded-0 ms-2 border-0 ">Sign Out</button>
        </a>

      <?php else: ?> 


          <a target="_blank" href="login.php">
          <button class="btn btn-outline-dark rounded-0 ms-2 border-0 ">Sign In</button>
          </a>
      <?php endif ?>


    </div>

  </div>
</nav>


<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom border-grey">
  
  <div class="container-fluid bg-white">
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="news.php">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sport</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="business.php">Business</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="innovation.php">Innovation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="culture.php">Culture</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Arts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Travel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Earth</a>
        </li>
    </div>
  </div>


</nav>






















 
</body>
</html>