<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation-staff.php';

  $object = new View;

  $rows = $object->viewCallComplaint();


?>

<div class="col-12 col-sm-9">
  <div class="card mt-3 shadow-sm">
    <div class="navigation text-white card-header">
      <b>Complaints</b>
    </div>
    <div class="card-body">
      <!---insert transaction here--->
    <?php
    
      if(isset($_POST['submit'])){
       $data = $object->Call_Complaint($_POST['name'],
                                    $_POST['contact_no'],
                                    $_POST['email'],
                                    $_POST['message']);

        if(!$data){
          echo "
						<div class='alert alert-success'>
						<strong>Success!</strong> Complaint has been added.
						</div>";
            $rows = $object->viewCallComplaint();
        
        }

      }

    ?>
          <div class="col-md-12">
            <div class="card shadow-sm">
                  <div class="card-body">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#accept" style="float:left;">
                   Add Complaints
                </button>
                <br><br>
                     <table class="table table-borderless">
                       <thead class="bg-primary text-white">
                         <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                         </tr>
                       </thead>
                       <?php $count = 1;
                  if($rows->rowCount() != 0){ ?>
								<?php while($row = $rows->fetch()) {?>
								<tr>
									<td scope="row"><?php echo $count++; ?></td>
									<td><?php echo $row['name']; ?> </td>
                  <td><?php echo $row['message']; ?> </td>
                  <td>''</td>
									<td><a href="complaints-view.php?id=<?php echo $row['id']; ?>"class="button btn-view"><i class="fas fa-eye"></i>&nbsp;view</a>
								</tr>
                <?php }
                }else{ 
                  echo"
                        <td colspan='5'><h6 class='card-subtitle mb-2 text-muted ' align='center' >No data found</h6></td>
                        ";
                }?>
                    </tbody>
                      
                     </table>
                  </div>
               </div>
    </div>
  </div>
</div>
<form action="save-complain.php" method="POST" >
  <div class="modal" tabindex="-1" role="dialog" id="accept">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Complaints</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <!-- INPUTS -->
				<span>Name</span>
				<input type="text" name="name" class="form-control"required>
			</div>
      <div>   
      <span>Phone Number</span>
				<input type="text" name="contact_no" class="form-control"required>
			</div>
      <div>
      <span>Email Address</span>
				<input type="email" name="email" class="form-control"required>
			</div>
			<div class="form-group">
				<span>Message</span>
				<textarea name="message" class="form-control"required></textarea>
			</div>
        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
       
  </div>
</form>