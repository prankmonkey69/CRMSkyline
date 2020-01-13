<?php
  include '../includes/header.php';
  include '../classdummy/db.php';
  include '../classdummy/controller.php';
  include '../classdummy/view.php';
  $customer_list_view = new View;
  $rows = $customer_list_view->viewCustomer_list_view($_GET["id"]);
  $info = $customer_list_view->viewCustomer_list_view($_GET["id"]);

  
  
?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b> Customer Information</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->
          <form>
                <div class="card">
                     <div class="well profile">
                        <div class="col-sm-12">
                            <div class="col-xs-12 col-sm-8">
                            <?php if($row = $rows->fetch()) {?><br>
                            <a href="dummypage.php" class="btn bg-primary text-white" style="float:right; margin-right:-330px"><i class="fas fa-chevron-left"></i><b> Back</b></a>
                                <h2><?php echo $row['fname'];?>, <?php echo $row['lname'];?> <?php echo $row['mname'];?>.</h2>
                                <br>
                                <div class="row">
                                <div class="col">
                                    <p><strong>Birthday : </strong><i style="color:blue"></i><?php echo $row['birthdate'];?></p> 
                                    <p><strong>Contact: </strong><i style="color:blue"></i>+63<?php echo $row['contact_number'];?></p>
                                    <p><strong>Address : </strong><i style="color:blue"></i><?php echo $row['address'];?></p>               
                                </div>
                                <div class="col">
                                    <p><strong>Contact: </strong><i style="color:blue"></i><?php echo $row['country'];?></p>
                                    <p><strong>Email : </strong><i style="color:blue"></i><?php echo $row['email'];?></p>
                                   <?php } ?>
                                </div>
                                </div>  <br>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                <div class="container-fluid mt-3">
                    <div class="row">
                        <div class="col-12 bg-white rounded shadow-sm ml-2">
                            <h4 class="text-secondary">Checking</h4>
                    <form action="new_check.php?id=<?php echo $_GET['id']; ?>" method="POST" enctypye="multipart/form-data">
                            <!-- INPUTS -->
                        <div class="form-group">                                                   
                            <span>Room no.</span>
                            <input type="text" name="room_no" class="form-control" required>
                            <span>Room Type</span>
                            <input type="text" name="room" class="form-control" required>
                            <br>
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <button type="submit" name="submit" class="btn btn-success" >Submit</button>
                        </div>          
                    </form>
                        </div>
                    </div>
                </div>
            
	  </div>
	</div>
</div>