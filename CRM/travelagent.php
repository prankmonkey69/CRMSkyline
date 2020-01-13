<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $travelagent = new View;
  $rows = $travelagent->viewTravelAgent();
?>

<div class="col-12 col-sm-9">
  <div class="card mt-3 shadow-sm">
    <div class="navigation text-white card-header">
      <b> <i class="fas fa-user"></i> Travel Agents </b>
    </div>
    <div class="card-body">

    <?php
	    if(isset($_POST['submittravelagent'])){
            if($travelagent->insertTravelAgent($_POST['firstname'],
            $_POST['middlename'],
            $_POST['lastname'],
            $_POST['birthdate'],
            $_POST['address'],
            $_POST['contact_no'],
            $_POST['gender'],
            $_POST['email'])){
                echo "
                    <div class='alert alert-success'>
                    <strong>Successfully Added!</strong> News Letter has been created.
                    </div>";
                    $rows = $travelagent->viewTravelAgent();
            }
            else{
                echo "
                    <div class='alert alert-danger'>
                    <strong>Failed!</strong> Creating failed. ".$_SESSION['errorMessage']."
                    </div>";
				}
			}
		?>

      <!---insert transaction here--->
      
          <div class="col-md-12">
            <div class="card shadow-sm">
                  <div class="card-body">   
                  <a  class="btn btn-primary" href="enclosurement.php" style="float:right; margin-left:10px;">
                    Travel Agent Enclosement
                </a>         
                
				  <button class="btn btn-success" data-toggle="modal" data-target="#accept" style="float:right;">
                    Add Travel Agent
                </button>
                
                <br>
                <BR>
                     <table class="table table-borderless">
                       <thead class="bg-primary text-white">
                         <tr>
                           <th scope="col">#</th>
                           <th scope="col">AgentName</th>
                           <th scope="col">Email</th>
                           <th scope="col">Action</th>
                         </tr>
                       </thead>
                       <?php $count = 1; 
                        if($rows->rowCount() != 0){
                       ?>
                       <?php while($row = $rows->fetch()) {?>
                       <tbody>
                    
                    <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row['firstname']; ?>, <?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><a href='travelagent-view.php?id=<?php echo $row['id']; ?>' class="button btn-view"><i class="fas fa-eye"></i> View </a></td>
                    </tr>
                    </tbody>
                       <?php }
                      }else{ 
                        echo"
                              <td colspan='4'><h6 class='card-subtitle mb-2 text-muted ' align='center' >No data found</h6></td>
                              ";
                      } ?>
                     </table>
                  </div>
               </div>
    </div>
  </div>
</div>


<form action="travelagent.php" method="POST" enctype="multipart/form-data">
  <div class="modal" tabindex="-1" role="dialog" id="accept">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add New Travel Agent</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <!-- INPUTS -->
                <span>Firstname</span>
				<input type="text" name="firstname" class="form-control"required>
			</div>
			<div class="form-group">
				<span>Middlename</span>
				<input type="text" name="middlename" class="form-control"required>
			</div>
			<div class="form-group">
				<span>Lastname</span>
				<input type="text" name="lastname" class="form-control"required>
			</div>
            <div class="form-group">
				<span>Birthdate</span>
				<input type="date" data-date="yyyy-mm-dd" name="birthdate" class="form-control"required>
			</div>
            <div class="form-group">
				<span>Address</span>
				<textarea name="address" class="form-control"></textarea>
			</div>
            <div class="form-group">
				<span>Contact No.</span>
				<input type="text" name="contact_no" class="form-control"required>
			</div>
            <div class="form-group">
				<span>Gender</span>
                <select name="gender" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
                </select>
			</div>
            <div class="form-group">
				<span>Email Address</span>
				<input type="email" name="email" class="form-control"required>
			</div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="submittravelagent" class="btn btn-success" onclick="return confirm('Are you sure?')">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
          </div>
  </div>
</form>