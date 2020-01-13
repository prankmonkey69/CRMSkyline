<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  require_once '../class/mailcontroller.php';
  require_once '../class/mailview.php';
  $complaints_view = new View;
  $mail = new mailview();

  $rows = $complaints_view->viewComplaints_view($_GET["id"]);
?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b> Guest Complaint</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->

      <?php
      if(isset($_POST['send']))
      {
        if($mail->getsendEmail($_POST['email']))
        {
          echo "
        <div class='alert alert-success'>
        <strong>Successfully Sended!</strong> 
        </div>";
        }
      }

       /* if(isset($_POST['send']))
        {
            if($mail->sendEmail()){
                if(ISSET($_SESSION['status'])){
                    if($_SESSION['status'] == "ok"){
                      
                    }else{
                        ?>
                        <div class="alert alert-danger"><?php echo $_SESSION['result']?></div>
                        <?php
                    }

                    unset($_SESSION['result']);
                    unset($_SESSION['status']);
                }
                $crm->Redirect("index.php");
            }
        }
*/
        ?>


        
            <?php if($row = $rows->fetch()) {?>
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $row['lname'];?>, <?php echo $row['fname'];?> <?php echo $row['mname'];?>.
                  <div class="float-right">
                  <a href="complaints.php" class="btn bg-primary text-white" style="float:right;"><i class="fas fa-chevron-left"></i><b> Back</b></a>
                  <a href="complaints-report.php?id=<?php echo $_GET['id'] ?>" class="btn bg-danger text-white" style="float:right;margin-right:10px;"><i class="fas fa-file"></i><b> Generate Complaint Report</b></a>
                  
				        
                </div>
                </h5>
                <br>
                <h5 class="card-subtitle mb-2 text-muted">Complained:</h5>
                <textarea name="message" disabled id="message" class="form-control"><?php echo $row ['message']?></textarea>
                <small class="card-subtitle mb-2 text-muted">Date Complained: <?php echo $row['created_at'];?></small>
                <br>
                <?php if($row[13]!=null){ ?>
                <h5 class="card-subtitle mb-2 text-muted">Action:</h5>
                <textarea name="message" disabled id="message" class="form-control"><?php echo $row ['action']?></textarea>
                <small class="card-subtitle mb-2 text-muted">Actioned Date : <?php echo $row['action_date'];?></small>

                <br>
                
              </div>
            <?php
             }
           ?>
        <form method="POST" action="complaints-view.php?id=<?php echo $_GET['id'] ?>">
            <div class="form-group">
                
                <input type="hidden" class="form-control" name="email" value="<?php echo $row['email'] ?>" required="required"/>
            <button name="send" class="btn btn-primary" style="float:right;"><span class="glyphicon glyphicon-envelope"></span> Send Verification</button>
        </form>
            <?php } ?>
	  </div>
	</div>
</div>
<!---
<form action="complaints-view.php?id=<?php //echo $_GET['id'];?>" method="POST" enctype="multipart/form-data">
  <div class="modal" tabindex="-1" role="dialog" id="accept">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Feedback</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <span>Feedback Message</span>
            <textarea name="actions" class="form-control"required></textarea>
          </div>
          <input type="hidden" value="<?php //echo $_GET['id'];?>" name="id" />
        </div>
        <div class="modal-footer">
            <button type="submit" name="submitAction" class="btn btn-success" onclick="return confirm('Are you sure?')">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
          </div>
  </div>
</form>-->