<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $travelagent_view = new View;
  $rows = $travelagent_view->viewTravelAgent_view($_GET["id"]);

?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b> Travel Agent Information</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->
          <form>
                <div class="card">
                     <div class="well profile">
                        <div class="col-sm-12">
                            <div class="col-xs-12 col-sm-8">
                            <?php while($row = $rows->fetch()) {?><br>
                            <a href="enclosure-create.php?id=<?php echo $row['id'];?>" class="btn bg-success text-white" style="float:right; margin-right:-250px"><i class="fas fa-chevron-left"></i><b> Create Enclosure</b></a>
                            <a href="travelagent.php" class="btn bg-primary text-white" style="float:right; margin-right:-330px"><i class="fas fa-chevron-left"></i><b> Back</b></a>
                                <h2><?php echo ucfirst($row['firstname']);?>, <?php echo $row['lastname'];?> <?php echo $row['middlename'];?>.</h2>
                                <br>
                                <div class="row">
                                <div class="col">
                                    <p><strong>Birthday : </strong><i style="color:blue"></i><?php echo $row['birthdate'];?></p> 
                                    <p><strong>Contact: </strong><i style="color:blue"></i><?php echo $row['contact_no'];?></p>
                                    <p><strong>Address : </strong><i style="color:blue"></i><?php echo $row['address'];?></p>               
                                </div>
                                <div class="col">
                                    <p><strong>Email : </strong><i style="color:blue"></i><?php echo $row['email'];?></p>
                                   </div>
                                </div>  <br>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                
           
	  </div>
	</div>
</div>