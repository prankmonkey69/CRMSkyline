<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $customer_loyalty_view = new View;
  $rows = $customer_loyalty_view->viewCustomer_loyalty_view($_GET["id"]);
  $info = $customer_loyalty_view->viewCustomer_loyalty_view($_GET["id"]);

?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b> Customer List</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->
          <form>
                <div class="card">
                     <div class="well profile">
                        <div class="col-sm-12">
                            <div class="col-xs-12 col-sm-8">
                            <?php if($row = $rows->fetch()) {                           
                                $count = $customer_loyalty_view->viewCountVisit($row[1])->fetch();
                                ?>
                            <br>
                            <a href="customer-loyalty.php" class="btn btn-sm bg-primary text-white" style="float:right; margin-right:-330px"><i class="fas fa-chevron-left"></i><b> Back</b></a>
                            <a href="loyalty-card.php?id=<?php echo $_GET['id'] ?>" class="btn bg-primary text-white" style="float:right; margin-right:-250px"><i class="fas fa-chevron-left"></i><b> Print Loyalty Card</b></a>
                                <h2><?php echo $row['fname'];?>, <?php echo $row['lname'];?> <?php echo $row['mname'];?>.</h2>
                                <br>
                                <div class="row">
                                <div class="col">
                                    <p><strong>Birthday : </strong><i style="color:blue"></i><?php echo date_format(date_create($row['birthdate']),'F d, Y');?></p> 
                                    <p><strong>Contact: </strong><i style="color:blue"></i><?php echo $row['contact_number'];?></p>
                                    <p><strong>Address : </strong><i style="color:blue"></i><?php echo $row['address'];?></p>
                                    <p><strong>Total Visit : </strong><i style="color:blue"></i><?php echo $count['VisitCount'];?></p>
                                </div>
                                <div class="col">
                                    <p><strong>Age: </strong><i style="color:blue"></i><?php 
                                    $bday = date_create($row['birthdate']);
                                    $datenow = date_create(date('Y-m-d'));
                                    $diff = date_diff($bday,$datenow);
                                    echo $diff->format("%y%");
                                    ?> year old</p>
                                    <p><strong>Contact: </strong><i style="color:blue"></i><?php echo $row['country'];?></p>
                                    <p><strong>Email : </strong><i style="color:blue"></i><?php echo $row['email'];?></p>
                                    <p><strong>Loyalty Guest Since : </strong><i style="color:blue"></i><?php echo date_format(date_create($row['created_at']),'F d, Y');?></p>
                                </div>
                                
                                    
                               
                                </div>  <br>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                <div class="container-fluid mt-3">
                    <div class="row">
                        <div class="col-12 bg-white rounded shadow-sm ml-2"> 
                        <h4 class="text-primary" style="float:right; margin-right:12px" >Total Points: <?php echo $row['points'];?></h4>
                            <h4 class="text-secondary">Visit History </h4>
                        </div>
                    </div>
                </div>
                <?php }?>
                <table class="table table-borderless">
                    <thead class="bg-primary text-white" align="center">
                      <tr>
                        <th scope="col">Visit Check-in</th>
                        <th scope="col" style="text-align:center">Visit Check-out</th>
                        <th scope="col" style="text-align:center">Room</th>
                        <th scope="col" style="text-align:center">Room No.</th>
                        <th scope="col" style="text-align:center">Payment</th>
                        <th scope="col" style="text-align:center">Points.</th>
                      </tr>
                    </thead>
                    <tbody style="text-align:center; font-size:14px">
                        <?php while($infos = $info->fetch()){ ?>
                        <tr style="text-align:center">
                            <td scope="row"><?php echo date_format(date_create($infos['check_in']),"F d ,Y h:i  A");?></td> 
                            <?php if($infos['checkout']!=null){?>
                            <td scope="row"><?php echo date_format(date_create($infos['checkout']),"F d, Y h:i  A");?></td>
                            <?php }else{ ?>
                            <td scope="row">Currently booked</td>
                            <?php } ?>
                            <td scope='row'><?php echo $infos['room'];?></td>
                            <td scope="row"><?php echo $infos['room_no'];?></td>
                            <td scope="row"><?php echo $infos['total'];?></td>
                            <td scope="row"><?php echo $infos['point'] ?></td>               
                        <?php } ?>
                        </tr>
                        
                   </tbody>
            </table>
	  </div>
	</div>
</div>