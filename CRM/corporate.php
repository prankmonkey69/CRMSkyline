<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $object = new View;
  $rows = $object->listCoporate();

?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	  	<b><i class="fas fa-user"></i> Travel Agency</b>
	  </div>
	  <div class="card-body">
	    <!---insert transaction here--->
		          
<?php   
    
if(isset($_POST['submittravelagency'])){
    if($object->addCorporate($_POST['corporate_name'],$_POST['address'],$_POST['contact_no'],$_POST['email'])){
        echo "
        <div class='alert alert-success'>
        <strong>Successfully Added!</strong> 
        </div>";
        $rows = $object->listCoporate();
        }
        else{
        echo "
        <div class='alert alert-danger'>
        <strong>Failed!</strong> Creating failed. ".$_SESSION['errorMessage']."
        </div>";
    }
}

?>
         <div class="col-md-12">
            <div class="card shadow-sm">
                  <div class="card-body">
				  <button class="btn btn-success" data-toggle="modal" data-target="#accept" style="float:right;">
                    Add Travel Agency
                </button>
	                          <input type="text" name="search" id="search" class="form-control" placeholder="Search">
	                          <input type="submit" hidden>
	                    <br>
					    <table class="table table-borderless">
					        <thead class="bg-primary text-white">
					          <tr>
					            <th scope="col">#</th>
					            <th scope="col">Travel Agency Name</th>
					            <th scope="col">Action</th>
					          </tr>
					        </thead>
					        <tbody>
								</tbody>
					      </table>
				  </div>
				</div>
			</div>
	  </div>
	</div>
</div>




























<form action="corporate.php" method="POST" enctype="multipart/form-data">
  <div class="modal" tabindex="-1" role="dialog" id="accept">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Travel Agency</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <!-- INPUTS -->
                <span>Travel Agency Name</span>
				<input type="text" name="corporate_name" class="form-control" required>
			</div>
            <div class="form-group">
				<span>Address</span>
				<textarea name="address" class="form-control"required></textarea>
			</div>
            <div class="form-group">
				<span>Contact No.</span>
				<input type="text" name="contact_no" class="form-control"required>
			</div>
            <div class="form-group">
				<span>Email Address</span>
				<input type="email" name="email" class="form-control">
			</div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="submittravelagency" class="btn btn-success" onclick="return confirm('Are you sure?')">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
          </div>
  </div>
</form>
