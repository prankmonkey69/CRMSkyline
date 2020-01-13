<!----Navigation---->
<?php
	include '../class/auth.php';
	
	$ses = new auth;
	if($ses->checkLoginStatus()){
	$firstname = $_SESSION['firstname'];
	$lastname = $_SESSION['lastname'];
	$user_type = $_SESSION['user_type'];
	}else{
		header("location:../index.php");
	}
	
?>
<nav class="navigation navbar navbar-expand-lg navbar-dark shadow-sm">
  <a class="navbar-brand" href="index.php"><h4 class="mt-2"><img src="../images/logo.png"> Skyline Hotel and Restaurant</h4></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <span class="account mr-3 mt-2">
		<div class="dropdown">
		  <button class=" btn btn-outline-info btn-sm border-0 text-white rounded-pill" type="button" data-toggle="dropdown" data-hover="dropdown">
		    <h6 class="mt-2 mr-2"><img class="rounded-circle mr-1" src="../images/sampleimg.jpeg" width="30" height="30"> Welcome! <?php echo ucfirst($lastname).', '. ucfirst($firstname)?> <h6>
		  </button>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		    <a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> Account Profile</a>
		    <a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
		  </div>
		</div>	
	</span>
	<span class="hr mr-3">		
	</span>
    <span class="mt-2 mr-3">
    	<div class="btn-group">
			  <a href="" class="notif btn btn-outline-info btn-sm border-0 text-white rounded-pill" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="top" title="Notification"><i class="far fa-bell"></i></a>
			  <div class="dropdown-menu dropdown-menu-right shadow-sm">
			  	<span class="dropdown-item-text"><i class="far fa-bell"></i> Notification <a href="" class="float-right text-primary">Clear All</a></span>
			  	<div class="dropdown-divider"></div>
				  <a class="dropdown-item text-dark" href="#">Procurement sent you a budget request</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item text-dark" href="#">You subscribed to local deals in Amsterdam</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item text-dark" href="#">You accepted to the group</a>
			  </div>
		  </div> 
    </span>

    <span class="mt-2 mr-2 text-white">
    	<a class="text-white text-decoration-none" href=""><i class="notif far fa-question-circle"></i> Help</a>	
    </span>

  </div>
</nav>


<!---Side Navigation Menu-->

<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-sm-3">
      <div class="nav mt-3 shadow-sm">
      	<div class="multi-level">
      		<input type="checkbox" id="menu"/>
      		<label class="menu" for="Menu"><i class="fas fa-bars"></i> Menu Navigation</label>
      		<div class="item">
      			<input type="checkbox" id="A"/>
      			<label for="A"><i class="fas fa-chart-line"></i><a href="index.php" style="color:black; text-decoration: none;"> Dashboard </a></label>
      		</div>

      		<div class="item">
      			<input type="checkbox" id="B"/>
      			<label for="B"> <i class="fas fa-mail-bulk"></i><a href="newsletter.php" style="color:black; text-decoration: none;"> News Letter </a></label>
      		</div>

      		<div class="item">
      			<input type="checkbox" id="C"/>
      			<label for="C"> <i class="fas fa-users"></i><a href="customer-list.php" style="color:black; text-decoration: none;"> Customer List </a></label>
        	</div>

      		<div class="item">
      			<input type="checkbox" id="D"/>
      			<label for="D"><i class="fas fa-id-card"></i><a href="customer-loyalty.php" style="color:black; text-decoration: none;"> Customer Loyalty </a></label>
          </div>

      		<div class="item">
      			<input type="checkbox" id="E"/>
      			<label for="E"><i class="fas fa-comment-dots"></i><a href="complaints.php" style="color:black; text-decoration: none;"> Complaints </a></label>
          </div>

		  <div class="item">
      			<input type="checkbox" id="F"/>
      			<label for="E"><i class="fas fa-user"></i><a href="travelagent.php" style="color:black; text-decoration: none;"> Travel Agent </a></label>
          </div>

		  <div class="item">
      			<input type="checkbox" id="G"/>
      			<label for="E"><i class="fas fa-building"></i><a href="corporate.php" style="color:black; text-decoration: none;"> Corporate </a></label>
          </div>
      	</div>
      </div>
      <div class="nav mt-3 shadow-sm">
        <div class="multi-level">
          <input type="checkbox" id="menu"/>
          <label class="menu" for="Menu"><i class="fas fa-cog"></i> Settings</label>
          <div class="item">
            <input type="checkbox" id="F"/>
            <i class="arrow fas fa-chevron-down"></i><label for="F"><i class="fas fa-user-cog"></i> Account Settings</label>

            <ul>
              <li><a href=""><i class="far fa-user"></i> Update Profile</a></li>
              <li><a href=""><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
          </div>
         
        </div>
      </div>

    </div>
