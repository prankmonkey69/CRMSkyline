<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  
  require_once '../class/mailcontroller.php';
  require_once '../class/mailview.php';
  $mail = new mailview;
  $complaints = new View;
  $rows = $complaints->viewComplaints();
?>

<div class="col-12 col-sm-9">
  <div class="card mt-3 shadow-sm">
    <div class="navigation text-white card-header">
      <b><i class="fas fa-comment-dots"></i> Guest Complaints</b>
    </div>
     <div class="card-body">
      <!---insert transaction here--->
      <?php 
if(isset($_POST['submitComplaint'])){
    if($complaints->sendComplaint($_POST['id'],$_POST['message'])){
        //$rows = $object->searchName($_GET['name']);
        echo "
						<div class='alert alert-success'>
						<strong>Success!</strong> Complaint has been sended.
						</div>";
            $rows = $complaints->viewComplaints();
    }
}

      if(isset($_POST['email_data']))
      {
        $number = count($_POST["email"]);
        echo "
        <div class='alert alert-success'>
        <strong>Success!</strong> Verification has been sended.
        </div>";
        if($number>0){
            for($i=0; $i<$number;$i++){
                if($mail->getsendEmail($_POST['email'][$i])){
                 
                }    
            }
        }
      }


?>
          <div class="col-md-12">
            <div class="card shadow-sm">
                  <div class="card-body">                  
                  <a href="complaints-pdf.php" class="btn bg-primary text-white" style="float:right;"><i class="fas fa-chevron-left"></i><b> Generate PDF</b></a>
                    <br>
                    <br>

                    <form action="complaints.php" method=POST >
                     <table class="table table-borderless">
                       <thead class="bg-primary text-white">
                         <tr>
                           <th scope="col">#</th>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                         </tr>
                       </thead>
                       <?php $count = 1; ?>
                       <?php while($row = $rows->fetch()) {?>
                       <tbody>
                    <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row['lname']; ?>, <?php echo $row['fname']; ?></td>
                    <td><?php echo $row['email']; ?>
                    <input type="hidden" name="email[]" value="<?php echo $row['email']; ?>"></td>
                    <?php if ($row[13]==null){?>
                    <td>Pending</td>
                    <?php }else{ ?>
                    <td>Resolved</td>
                    <?php } ?>
                    <td scope="col"><a href='complaints-view.php?id=<?php echo $row[9]; ?>' class="button btn-view" style="float:center;" ><i class="fas fa-eye"></i> View </a></td>
                    </tr>
                       <?php } ?>
                        </tbody>
                     </table>
                     <button type="submit" name="email_data" class="btn btn-success" style="float:right;" >Send Notify All</button>
                     </form>
                  </div>
               </div>
    </div>
  </div>
</div>
