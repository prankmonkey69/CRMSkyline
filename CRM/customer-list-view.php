<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $customer_list_view = new View;
  $rows = $customer_list_view->viewCustomer_list_view($_GET["id"]);
  $info = $customer_list_view->viewCustomer_list_view($_GET["id"]);
  $inf = $customer_list_view->viewCustomer_list_view($_GET["id"]);


  
  
?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b> Customer Information</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->
          <?php
          if(isset($_POST['submit'])){
            if($customer_list_view->promote($_POST['id'])){
                echo "
                    <div class='alert alert-success'>
                    <strong>Success!</strong> The guest has been promoted.
                    </div>";
                    $rows = $customer_list_view->viewCustomer_list_view($_GET["id"]);
                    
            }else{
                echo "
                    <div class='alert alert-danger'>
                    <strong>Failed!</strong> Creating failed. ".$_SESSION['errorMessage']."
                    </div>";
            }
        }
          
          
          ?>
          
                <div class="card">
                     <div class="well profile">
                        <div class="col-sm-12">
                            <div class="col-xs-12 col-sm-8">
                            <?php if($row = $rows->fetch()) {
                                $count = $customer_list_view->viewCountVisit($row[0])->fetch();
                                ?><br>
                            <a href="customer-list.php" class="btn bg-primary text-white" style="float:right; margin-right:-330px"><i class="fas fa-chevron-left"></i><b> Back</b></a>
                            
                                 <?php if($row[16]==null) { 
                                     if($user_type == 'admin'){ ?>
                            <form action="customer-list-view.php?id=<?php echo $_GET['id'];?>" method="POST">
                            <input type="text" name="id" hidden value="<?php echo $_GET['id'];?>" >
                            <button type="submit" name="submit"  class="btn bg-primary text-white" onclick="return confirm('Are you sure?')" style="float:right; margin-right:-250px">Promote as loyalty guest</button>
                            </form>
                                     <?php }
                                } ?>
                                <h2><?php echo $row['fname'];?>, <?php echo $row['lname'];?> <?php echo $row['mname'];?>.</h2>
                                <br>
                                <div class="row">
                                <div class="col">
                                    <p><strong>Birthday : </strong><i style="color:blue"></i><?php echo date_format(date_create($row['birthdate']),"F d, Y");?></p> 
                                    <p><strong>Contact: </strong><i style="color:blue"></i>+63<?php echo $row['contact_number'];?></p>
                                    <p><strong>Address : </strong><i style="color:blue"></i><?php echo $row['address'];?></p>        
                                    <p><strong>Total Visit : </strong><i style="color:blue"></i><?php echo $count['VisitCount'];?></p>       
                                </div>
                                <div class="col">
                                    <p><strong>Age: </strong><i style="color:blue"></i>
                                    <?php 
                                    $bday = date_create($row['birthdate']);
                                    $datenow = date_create(date('Y-m-d'));
                                    $diff = date_diff($bday,$datenow);
                                    echo $diff->format("%y%");
                                    ?> years old</p>
                                    <p><strong>Country: </strong><i style="color:blue"></i><?php echo $row['country'];?></p>
                                    <p><strong>Email : </strong><i style="color:blue"></i><?php echo $row['email'];?></p>
                                    
                                     <?php }
                                     $amount = 0;
                                     while($totals = $inf->fetch()){
                                    $amount = $totals['total']+$amount;
                                    
                                    } ?>
                                    <p><strong>Total Amount: </strong><i style="color:blue"></i><?php echo $amount ?></p>
                                </div>
                                
                                </div>  <!--
                                <a href="complaints-create.php?id=<?php // echo $row[0]; ?>" class="btn bg-primary text-white" style="float:right; margin-right:-330px"><i class="fas fa-file"></i><b> Create Complaint</b></a>
                            --><br>
                            <br>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-3">
                    <div class="row">
                        <div class="col-12 bg-white rounded shadow-sm ml-2">
                            <h4 class="text-secondary">Visit History</h4>
                        </div>
                    </div>
               
            <table class="table table-borderless">
                    <thead class="bg-primary text-white" align="center">
                      <tr>
                        <th scope="col">Visit Check-in</th>
                        <th scope="col" style="text-align:center">Visit Check-out</th>
                        <th scope="col" style="text-align:center">Room</th>
                        <th scope="col" style="text-align:center">Room No.</th>
                        <th scope="col" style="text-align:center">Total Payment</th>
                      </tr>
                    </thead>
                    <tbody style="text-align:center; font-size:14px">
                        <?php while($infos = $info->fetch()){ ?>
                        <tr style="text-align:center">
                            <td scope="row"><?php echo date_format(date_create($infos['check_in']),"F d ,Y h:i A");?></td> 
                            <?php if($infos['check_in']!=null&&$infos['checkout']!=null){?>
                            
                            <td scope="row"><?php echo date_format(date_create($infos['checkout']),"F d, Y h:i A");?></td>
                            <?php }else{ ?>
                            <td scope="row">Currently booked</td>
                            <?php } ?>
                            <td scope="row"><?php echo $infos['room'];?></td>
                            <td scope="row"><?php echo $infos['room_no'];?></td>
                            <td scope="row"><?php echo $infos['total'];?></td>
                            <td></td>                
                        <?php } ?>
                        </tr>
                   </tbody>
            </table>
	  </div>
	</div>
</div>
</div>