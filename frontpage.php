<?php 
include 'class/db.php';
include 'class/controller.php';
include 'class/view.php';

$object = new View;
$row = $object->viewPostNews();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Skyline Hotel and Restaurant</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Bootstrap CDN link------------->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--Semantic UI CDN link------------>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/button.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
    <!--Google Fonts CDN link----------->
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
      <!--CSS Style sheet link------------>
    <link rel="stylesheet" type="text/css" href="new.css">
    <!--Fontawesome ICON CDN link----------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <!-- JQUERY / Bootstrap CDN Scripts---------->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
</head>
<body>


  <nav class="upper-nav navbar navbar-expand-lg bg-light shadow-sm">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link disabled text-danger" href="#"><i class="fas fa-phone"></i> +0922-2222-2222 <i class="fas fa-envelope ml-2"></i> skylineHRMS@yahoo.com.ph</a>
      </li>
    </ul>
  </nav>


  <nav class="navigation-bar navbar navbar-expand-lg navbar-dark sticky-top">
  <a class="navbar-brand text-white ml-2" href="#"><img src="images/samplelogo.png" height="90" width="150"></a>
  <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon text-white"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <span class="navbar-text mr-5"><a href="" class="text-white text-decoration-none">Home</a></span>
    <span class="navbar-text mr-3"><a href="" class="text-white text-decoration-none">Book</a></span>
    <span class="navbar-text nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Facilities
        </a>
        <div class="dropdown-menu overflow-auto" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item text-danger" href="#">Restaurant</a>
          <a class="dropdown-item text-danger" href="#">Sport Club</a>
          <a class="dropdown-item text-danger" href="#">Swimming Pool</a>
          <a class="dropdown-item text-danger" href="#">Gymnesium</a>
          <a class="dropdown-item text-danger" href="#">Bar</a>
        </div>
    </span>
    <span class="navbar-text mr-1 nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Events
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item text-danger" href="#">Ball Room</a>
          <a class="dropdown-item text-danger" href="#">Activity Hall</a>
          <a class="dropdown-item text-danger" href="#">Zumba</a>
        </div>
    </span>
    <span class="navbar-text mr-4"><a href="" class="text-white text-decoration-none">Features</a></span>
    <span class="navbar-text mr-4"><a href="" class="text-white text-decoration-none">About</a></span>
    <span class="navbar-text mr-4"><a href="" class="text-white text-decoration-none">Contact</a></span>
  </div>
</nav>






  <div class="bd-example">
  <div id="carouselExampleCaptions" class="caro carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/hotel1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-3 text-dark font-weight-bold"><b class="text-danger">SKYLINE</b> HOTEL AND RESTAURANT</h1>
          <h1 class="display-5 text-dark text-shadow">ENJOY A LUXURY EXPERIENCE</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/hotel2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-3 font-weight-bold text-dark">YOUR PERFECT HOTEL JUST A CLICK AWAY</h1>
          <button type="button" class="btn btn-danger">BOOK NOW</button>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/hotel3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-3 font-weight-bold text-dark text-left">MAKE YOUR VACATION COMFORTABLE</h1>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<div class="jumbotron jumbotron-fluid mt-2">
  <div class="container">
    <form>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Check-in Date</label>
          <input type="date" class="form-control" id="inputEmail4" placeholder="Check-in Date">
        </div>
        <div class="form-group col-md-6">
          <label>Check-out</label>
          <input type="date" class="form-control" id="inputPassword4" placeholder="Check-out Date">
        </div>
        <div class="form-group col-md-5">
          <select class="custom-select" id="inlineFormCustomSelect">
            <option selected>Room Type</option>
            <option value="1">Single</option>
            <option value="2">Double</option>
            <option value="3">King</option>
            <option value="3">Queen</option>
          </select>
        </div>
        <div class="form-group col-md-5">
          <select class="custom-select" id="inlineFormCustomSelect">
            <option selected>Number of Guests</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="3">4</option>
            <option value="3">5</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <button type="submit" class="btn btn-danger mt-">CHECK AVAILABILITY</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="jumbotron jumbotron-fluid bg-white">
  <div class="container">
    <div class="row">
        <div class="col-12 col-md-5">
          <h1 class="display-4">WELCOME TO SKYLINE HOTEL & RESTAURANT</h1>
          <h2 class="lead">We offers a wide variety of hotels catering for a perfect stay no matter where your destination.</h2>
        </div>
        <div class="col-12 col-md-7">
           <a href="#" class="d-block mb-4 h-100">
                <img class="gallery img-fluid img-thumbnail" src="images/hotel1.jpg" alt="">
              </a>
      </div>
     </div>
 </div>
</div>


<div class="container mt-4 mb-3">
  <div class="card-deck text-center">
    <div class="card shadow-lg border border-light">
      <div class="card-body">
        <p class="card-text display-1"><i class="fas fa-map-pin"></i></p>
        <h4>MAP</h4>
      </div>
    </div>
    <div class="card shadow-lg border border-light">
      <div class="card-body">
        <p class="card-text display-1"><i class="fas fa-concierge-bell"></i></p>
        <h4>RESTAURANT</h4>
      </div>
    </div>
    <div class="card shadow-lg border border-light">
      <div class="card-body">
        <p class="card-text display-1"><i class="fas fa-spa"></i></p>
        <h4>SPA RELAXTION</h4>
      </div>
    </div>
    <div class="card shadow-lg border border-light">
      <div class="card-body">
        <p class="card-text display-1"><i class="fas fa-glass-martini-alt"></i></p>
        <h4>BAR & DRINK</h4>
      </div>
    </div>
  </div>
</div><br>


<div class="container-fluid p-0 mt-5">
 <div class="bed-card card-group">
   <div class="card bg-dark text-white border-0">
  <img src="images/kingbed3.jpg" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title">DELUXE ROOM</h5>
    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>
  </div>
</div>
  <div class="card bg-dark text-white border-0">
  <img src="images/kingbed3.jpg" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title">KING BED</h5>
    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>
  </div>
</div>
<div class="card bg-dark text-white border-0">
  <img src="images/kingbed3.jpg" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title">QUEEN BED</h5>
    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>
  </div>
</div>
 </div>
</div><br><br>

<div class="jumbotron jumbotron-fluid bg-light">
  <h1 class="display-4 text-center mb-4">Upcoming Events</h1>
  <div class="container">
    <div class="events card-deck">
      <div class="card  border-0">
        <img src="images/hotel6.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
      <div class="card  border-0">
        <img src="images/hotel5.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
      <div class="card  border-0">
        <img src="images/hotel5.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <h1 class="text-center text-secondary">WHAT'S NEWS!</h1>
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  
 
    <div class="carousel-item active">
      <div class="card-deck p-3">
        
        <<div class="card border-0" style="width: 18rem;">
          <img src="images/sampleimg.jpeg" class="card-img-top bordered " height="400"  alt="...">
          <div class="card-body">
            <h5 class="card-title">Cardo Dalisay</h5>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            <p class="card-text"><small class="text-muted">Our Beloved Guests</small></p>
          </div>
        </div>
      </div>
    </div>
    <?php while($rows = $row->fetch()):; ?>
    <div class="carousel-item">
      <div class="card-deck p-3">
        <div class="card border-0" style="width: 18rem;">
          <img src="Storage/CRM/<?php echo $rows['filename'] ?>" class="card-img-top bordered " height="400" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $rows['title'] ?></h5>
            <p class="text-muted"><?php echo $rows['description'] ?>.</p>
            <p class="card-text"><small class="text-muted">Posted: <?php echo date_format(date_create($rows['created_at']),"F d Y") ?></small></p>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>




  <footer class="footer page-footer font-small pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase text-white">SKYLINE HOTEL AND RESTAURANT</h5>
        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        
<?php 
  if(isset($_POST['submit'])){
    if($object->insSubs($_POST['email'])){
      echo '
      <p class="text-white"><b>Success!</b> Email has been saved.</p>
      ';
    }else{
      echo '
      <p class="text-white"><b>!</b> Email has been saved.</p>
      ';
    }
  }  
?>

        <form action="frontpage.php" method="POST">
        <span class="text-uppercase text-white">Newsletter: </span>
        <input type="text" name="email" class="form-control"required>
        <button type="submit" name="submit" class="btn bg-success text-white" style="float:right;" >Submit</button>      
        <form>
      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase text-white">SERVCES</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!" class="text-white text-decoration-none"><i class="fas fa-caret-right"></i> About Us</a>
          </li>
          <li>
            <a href="#!" class="text-white text-decoration-none"><i class="fas fa-caret-right"></i> Our Room</a>
          </li>
          <li>
            <a href="#!" class="text-white text-decoration-none"><i class="fas fa-caret-right"></i> Careers</a>
          </li>
          <li>
            <a href="#!" class="text-white text-decoration-none"><i class="fas fa-caret-right"></i> Employee Self Service</a>
          </li>
          <li>
            <a href="#!" class="text-white text-decoration-none"><i class="fas fa-caret-right"></i> FAQs</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase text-white">Social Media</h5>

        <ul class="list-unstyled">
          <li>
            <p class="icon"><i class="fab fa-facebook"></i> Facebook Account</p>
          </li>
          <li>
            <p class="icon"><i class="fab fa-instagram"></i> Instagram Account</p>
          </li>
          <li>
            <p class="icon"><i class="fab fa-twitter"></i> Twitter Account</p>
          </li>
          <li>
            <p class="icon"><i class="fab fa-google"></i> Google Account</p>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 text-white">© 2019 Copyright:
    <a href="" class="text-white">Skyline Hotel and Restaurant</a>
  </div>
  <!-- Copyright -->

</footer>











<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d43e5f2e5ae967ef80e114e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
  </script>
  <!--End of Tawk.to Script-->  
</body>
</html>
        

