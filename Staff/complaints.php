<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation-staff.php';
  
  require_once '../class/mailcontroller.php';
  require_once '../class/mailview.php';
  $mail = new mailview;

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
 /*   
    if(!isset($_GET['search'])){
       $rows = $object->viewCallComplaint();
      }else{
        $search = $_GET['search_name'];
        $rows = $object->searchCallCom($search);
      }
    */
  
  ?>
    <?php
    
    if(isset($_POST['archive'])){
      if($object->viewArchive($_POST['id'])){
        echo "
						<div class='alert alert-success'>
						<strong>Success!</strong> Archived.
            </div>";
  $rows = $object->viewCallComplaint();
            
      }
    }


      if(isset($_POST['submit'])){

       $data = $object->Call_Complaint($_POST['name'],
                                    $_POST['contact_no'],
                                    $_POST['email'],
                                    $_POST['message'],$firstname,$lastname);

        if(!$data){
          echo "
						<div class='alert alert-success'>
						<strong>Success!</strong> Complaint has been added.
						</div>";
           
            
        
        }
        if($mail->getsendEmail($_POST['email'],$_POST['name'])){
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
                  <form action="complaints.php" method="GET" style="width:400px;float:right;"> 
                    <input type="text" name="search_name" class="form-control" placeholder="Search">
                    <input type="submit" name='search'hidden>
                  </form>
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
                       <?php 
                              $count=1;
                              while($row = $rows->fetch()) {
                                if($row['archive_date']==null){

                                
                                ?>
                              <tr>
                                <td scope="row"><?php echo $count++?></td>             
                                <td scope="row"> <?php echo $row['name'];?></td>
                                <td scope="row"><?php echo $row['email'];?></td>
                                <?php if($row['action']==null){ ?>
                                  <td scope="row">Pending</td> 
                                  <td>
                                <a href="complaints-view.php?id=<?php echo $row["id"]; ?>" class="button btn-view"><i class="fas fa-eye"></i> View </a>
                                </td>      
                                <?php }else{ ?>
                                  <td scope="row">Done</td>
                                <td>
                                <form action="complaints.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <button class="btn-view bg-white text-red" type="submit" name="archive" ><i class="fas fa-trash"></i> archive </button> 
                                </form>
                                <a href="complaints-view.php?id=<?php echo $row["id"]; ?>" class="button btn-view"><i class="fas fa-eye"></i> View </a>
                                </td>
                                <?php }
                              } ?>
                               
                                </tr>
                              <?php }
                               ?>
                    </tbody>
                      
                     </table>
                  </div>
               </div>
    </div>
  </div>
</div>
<form action="complaints.php" method="POST" >
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
				<input type="text" name="name" class="form-control"required minlength="8" >
			</div>
      <div>   
      <span>Phone Number</span>
				<input type="text" name="contact_no" class="form-control"required minlength="11" maxlength="11" >
			</div>
      <div>
      <span>Email Address</span>
				<input type="email" name="email" class="form-control"required placeholder="e.g. example@gmail.com">
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