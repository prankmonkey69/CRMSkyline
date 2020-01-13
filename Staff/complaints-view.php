<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation-staff.php';
  $complaints_view = new View;
 
  $rows = $complaints_view->viewCallview($_GET["id"]);
?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b> Customer Complaint</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->

      <?php
			if(isset($_POST['submitAction'])){
        if($complaints_view->viewCallAction($_POST['actions'],
                                    $_POST['id'])){
					echo "
						<div class='alert alert-success'>
						<strong>Success!</strong> Action has been preformed.
						</div>";
            
				}else{
					echo "
						<div class='alert alert-danger'>
						<strong>Failed!</strong> Creating failed. ".$_SESSION['errorMessage']."
						</div>";
				}
			}
		?>


          
        <form>
            <?php while($row = $rows->fetch()) {?>
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $row['name'];?>.
                  <div class="float-right">
                  <a href="complaints.php" class="btn bg-primary text-white" style="float:right;"><i class="fas fa-chevron-left"></i><b> Back</b></a>
                  </div>
                </h5>
                <br>
                <h6 class="card-subtitle mb-2 text-muted">Phone Number: <?php echo $row['contact_no'];?></h6>
                <h6 class="card-subtitle mb-2 text-muted">Email: <?php echo $row['email'];?></h6>
                <textarea name="message" disabled id="message" class="form-control"><?php echo $row ['message']?></textarea>
                <h6 class="card-subtitle mb-2 text-muted"  style="float:right;">Complaint Date: <?php echo $row['created_at'];?></h6>
                <br>
                <?php if($row['action']!=''){?>
                <h5 class="card-subtitle mb-2 text-muted">Action:</h5>
                <textarea name="message" disabled id="message" class="form-control"><?php echo $row ['action']?></textarea>
                <h6 class="card-subtitle mb-2 text-muted" style="float:right;">Date Actioned: <?php echo $row['action_date'];?></h6>
                <br>
                <?php }else{?>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#accept" style="float:right;">
                    Action
                </button>
                <?php }?>
              <br>
              <br>
              <h6 class="card-subtitle mb-1 text-muted" style="float:right;">Complaint created by: <?php echo $row['staffname'];?></h6>
              </div>
            <?php }?>
        </form>
	  </div>
	</div>
</div>

<form action="complaints-view.php?id=<?php echo $_GET['id'];?>" method="POST" enctype="multipart/form-data">
  <div class="modal" tabindex="-1" role="dialog" id="accept">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Create Action</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <span>Action</span>
            <textarea name="actions" class="form-control"></textarea>
          </div>
          <input type="hidden" value="<?php echo $_GET['id'];?>" name="id" />
        </div>
        <div class="modal-footer">
            <button type="submit" name="submitAction" class="btn btn-success" onclick="return confirm('Are you sure?')">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
          </div>
  </div>
</form>