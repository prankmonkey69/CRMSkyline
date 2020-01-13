<?php
  include '../includes/header.php';
  include '../classdummy/db.php';
  include '../classdummy/controller.php';
  include '../classdummy/view.php';
  $customer_list_view = new View;
  $row = $customer_list_view->viewCustomer_list_view($_GET["id"])->fetch();
  $info = $customer_list_view->viewCustomer_list_view($_GET["id"]);

  
  
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
                if($customer_list_view->submitCheck($_POST['id'],$_POST['room_no'],$_POST['room']
                )){
					echo "
						<div class='alert alert-success'>
						<strong>Success!</strong> News Letter has been created.
                        </div>";
                        $rows = $customer_list_view->viewCustomer_list_view($_GET["id"]);
						$info = $customer_list_view->viewCustomer_list_view($_GET["id"]);
				}else{
					echo "
						<div class='alert alert-danger'>
						<strong>Failed!</strong> Creating failed. ".$_SESSION['errorMessage']."
						</div>";
				}
			}?>
          <form>
                <div class="card">
                     <div class="well profile">
                        <div class="col-sm-12">
                            <div class="col-xs-12 col-sm-8">
                            <br>
                            <a href="dummypage.php" class="btn bg-primary text-white" style="float:right; margin-right:-330px"><i class="fas fa-chevron-left"></i><b> Back</b></a><br><br>
                            <?php if($row['checkout']!=null) {?>
                            <a href="customer-list-view.php?id=<?php echo $_GET['id']?>" class="btn bg-primary text-white" style="float:right; margin-right:-330px"><i class="fas fa-chevron-left"></i><b> Check In</b></a>
                            <?php } ?>
                                <h2><?php echo $row['fname'];?>, <?php echo $row['lname'];?> <?php echo $row['mname'];?>.</h2>
                                <br>
                                <div class="row">
                                <div class="col">
                                    <p><strong>Birthday : </strong><i style="color:blue"></i><?php echo $row['birthdate'];?></p> 
                                    <p><strong>Contact: </strong><i style="color:blue"></i>+63<?php echo $row['contact_number'];?></p>
                                    <p><strong>Address : </strong><i style="color:blue"></i><?php echo $row['address'];?></p>               
                                </div>
                                <div class="col">
                                    <p><strong>Contact: </strong><i style="color:blue"></i><?php echo $row['country'];?></p>
                                    <p><strong>Email : </strong><i style="color:blue"></i><?php echo $row['email'];?></p>
                                   
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
                            <h4 class="text-secondary">Visit history</h4>
            <table class="table table-borderless">
                    <thead class="bg-primary text-white" align="center">
                      <tr>
                        <th scope="col">Visit Check-in</th>
                        <th scope="col" style="text-align:center">Check out</th>
                        <th scope="col" style="text-align:center">Room</th>
                        <th scope="col" style="text-align:center">Room No.</th>
                      </tr>
                    </thead>
                    <tbody style="text-align:center; font-size:14px">
                        <?php while($infos = $info->fetch()){ ?>
                        <tr style="text-align:center">
                            <td scope="row"><?php echo $infos['check_in'];?></td>
                            <td scope="row"><?php echo $infos['checkout'];?></td>
                            <td scope="row"><?php echo $infos['room'];?></td>
                            <td scope="row"><?php echo $infos['room_no'];?></td>
                                            
                        <?php } ?>
                        </tr>
                        
                   </tbody>
            </table>
                        </div>
                    </div>
                </div>
            
	  </div>
	</div>
</div>