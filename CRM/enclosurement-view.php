<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $viewtEnclosement = new View;
  $info = $viewtEnclosement->viewtEnclosement($_GET["id"]);
  $type = $viewtEnclosement->viewEnclosetype($_GET["id"]);  
  $date = $viewtEnclosement->viewtEnclosement($_GET["id"]);

?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b> Enclosure</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->
          <form>
                <div class="card">
                     <div class="well profile">
                        <div class="col-sm-12">
                            <div class="col-xs-12 col-sm-8">
                            <?php while($inf = $info->fetch()) { 
                                 $diff1 = date_create($inf['reserved_date']);
                                 $diff2 = date_create($inf['check_out_date']);
                                 $diff = date_diff($diff1,$diff2);
                                ?><br>
                            <a href="enclosurement.php" class="btn bg-primary text-white" style="float:right; margin-right:-330px"><i class="fas fa-chevron-left"></i><b> Back</b></a>
                                <h4><strong>Agent Name: </strong><?php echo ucfirst($inf['firstname']);?>, <?php echo ucfirst($inf['lastname']);?>.</h4>
                                <br>
                                 <div class="row">
                                    <div class="col">
                                        <p><strong>Contact: </strong><i style="color:blue"></i><?php echo $inf['contact_no'];?></p>     
                                        <p><strong>Date Reserved: </strong><i style="color:blue"></i><?php echo $inf['reserved_date'];?></p>     
                                        <p><strong>Number of guests: </strong><i style="color:blue"></i><?php echo $inf['no_of_guests'];?></p>
                                        <p><strong>Number of Days: </strong><i style="color:blue"></i><?php echo 
                                        $diff->format("%a%") ?> Days</p>
                                        <p><strong>Number of Room: </strong><i style="color:blue"></i><?php echo $inf['no_of_room'];?></p>
                                    </div>
                                    <div class="col">
                                        <p><strong>Email:</strong> <?php echo $inf['email'];?></p>
                                        <p><strong>Check out date: </strong><i style="color:blue"></i><?php echo $inf['no_of_guests'];?></p>
                                        <p><strong>Promo Name: </strong><i style="color:blue"></i><?php echo $inf['promo'];?></p>
                                        <p><strong>Promo Rate: </strong><i style="color:blue"></i><?php echo $inf['promorate'];?>Php /day</p> 
                                        <p><strong>Total: </strong><i style="color:blue"></i><?php echo $inf['promorate']*$inf['no_of_room']*$diff->format("%a%");?> Php</p> 
                                </div>
                                </div>  <br>
                                <?php }?>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                <div class="row">
                                    <div class="col">
                                    <h5><strong>Include/s:</strong></h5>
                                    <table>
                                    <tbody>
                                        <?php while($inf = $type->fetch())
                                         {?>
                                            <tr>
                                            <td scope="row"><?php echo ucfirst($inf['type']);?></td>             
                                            </tr>
                                        <?php }?>                  
                                    </tbody>
                                    </table>
                                    </div>
                                    <div class="col">
                                       </div>                                       
                                </div>
                             </div> 
                             <br>
                             <div class="col-xs-12 col-sm-8">
                                <div class="row">
                                    <div class="col" style="float:right;">
                                    <strong>Date Created:</strong>
                                        <?php if($inf = $date->fetch()) {?>
                                        <?php echo $inf['created_at'];?>
                                        
                                    </div>
                                    <div class="col">
                                    <a href="enclosement-pdf.php?id=<?php echo $inf['9']; ?>" class="btn bg-danger text-white" style="float:right; margin-right:-330px"><i class="fas fa-file"></i><b> Generate PDF</b></a>
                                       </div>  <?php }?>                                     
                                </div>
                             </div> 
                             <br>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                
	  </div>
	</div>
</div>