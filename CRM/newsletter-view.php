<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $object = new View;
  $rows = $object->viewNewsLetterView($_GET["id"]);
  $sub = $object->viewSubs();
  $guest = $object->viewCustomer_list();
  $row2 = $object->viewNewsLetterView($_GET["id"])->fetch();
  
  
?>



<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b><i class="fas fa-mail-bulk "></i> Newsletter View</b>
	  </div>
    <br>
	  <div class="card-body">
	  	<!---insert transaction here--->
          
              <div class="card">
                  <div class="well profile">
                    <div class="col-sm-12">
                        <div class="col-xs-12 col-sm-8">
                          <br>
                        <a href="newsletter.php" class="btn bg-primary text-white" style="float:right; margin-right:-300px"><i class="fas fa-chevron-left"></i><b> Back</b></a>
                        <form action="newsletter.php" method="POST">
                        
                        <input type='hidden' name='title' value='<?php echo $row2['title']; ?>' >
                          <input type='hidden' name='description' value='<?php echo $row2['description']; ?>' >
                          <input type='hidden' name='filename' value='<?php echo $row2['filename']; ?>' >
                          <?php while($guests = $guest->fetch()){ ?>
                            <input type='hidden' name='email[]' value='<?php echo $guests['email']; ?>' >
                            <?php
                          }                    
                          ?>
                        <button type="submit" name="email_data" class="btn bg-success text-white" style="float:right; margin-right:-220px;" >
                        <i class="fas fa-message"></i>Send To All Guests</button>
                        </form>
                        <!---guest-->
                        <form action="newsletter.php" method="POST">
                          <input type='hidden' name='title' value='<?php echo $row2['title']; ?>' >
                          <input type='hidden' name='description' value='<?php echo $row2['description']; ?>' >
                          <input type='hidden' name='filename' value='<?php echo $row2['filename']; ?>' >
                          <?php while($subs = $sub->fetch()){ ?>
                                <input type='hidden' name='email[]' value='<?php echo $subs['email']; ?>' >
                                <?php
                              }                    
                              ?>
                              <button type="submit" name="emails" class="btn bg-success text-white" style="float:right; margin-right:-60px;" >
                               <i class="fas fa-message"></i>Send To All Subscribers</button>
                        </form>
                        
                        <?php while($row = $rows->fetch()){
                              ?>
                            <h4>Title: 
                            <br>
                            &emsp;
                              <span style="color:blue;" name="title"><?php echo $row['title']; ?></span></h4>
                              <input type='hidden' name='title' value='<?php echo $row['title']; ?>' >
                            <br>
                            <h4>Description: </h4>
                            <h6 style="margin-left:30px;" align="justify" name="description"><?php echo $row['description']; ?></h6>
                            <input type='hidden' name='description' value='<?php echo $row['description']; ?>' >
                            <br>
                            <h4>Photo:</h4><?php  $fileNameNew = $row['filename']; ?>
                            <input type='hidden' name='filename' value='<?php echo $row['filename']; ?>' >
                            <img src="../Storage/CRM/<?php echo $fileNameNew ?>" height="400" width="800" style="margin-left:40px;">
                            <small class="card-subtitle mb-2 text-muted"   style="margin-right:-225px;float:right; margin-top:5px;">Date Created: <?php echo $row['created_at']; ?></small>
                        <?php } ?>
                       <br><br>
                        
                        <br>
                        <br>
                            <br>
                            </div>    
                        </div>
                    </div>
                </div>
              </div>
                
           
	  </div>
	</div>
</div>