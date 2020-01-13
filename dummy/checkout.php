


<?php
  include '../includes/header.php';
  include '../classdummy/db.php';
  include '../classdummy/controller.php';
  include '../classdummy/view.php';
  $customer_list_view = new View;
  $rows = $customer_list_view->viewCustomer_list_view($_GET["id"]);
  $info = $customer_list_view->viewCustomer_list_view($_GET["id"]);
  $data = $customer_list_view->viewCustomer_list_view($_GET["id"])->fetch();
  
  
?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b> Customer Information</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->
          <?php
            if(isset($_POST['submitCheckout'])){
                $gain = $_POST['total']/1000;
                if($customer_list_view->checkount($_POST['total'],$_POST['id'],$gain)){
					echo "
                        <div class='alert alert-success'>
                        <strong>Success!</strong> the guest has been checked out.
                        </div>";
                        
                        if($data[18]==$_GET['id']){
                            $point = $_POST['points']+$gain;
                            if($customer_list_view->points($point,
                                                            $_POST['loyalty_id'])){
                                $rows = $customer_list_view->viewCustomer_list_view($_GET["id"]);
                            }else{
                                echo "
                                    <div class='alert alert-danger'>
                                    <strong>Failed!</strong> Creating failed. ".$_SESSION['errorMessage']."
                                    </div>";
                            }
                           
                    }
                    }else{
					echo "
						<div class='alert alert-danger'>
						<strong>Failed!</strong> Creating failed. ".$_SESSION['errorMessage']."
						</div>";
                }
                
                
            }  
			
                /*if($customer_list_view->checkount($_POST['id'])){
					echo "
						<div class='alert alert-success'>
						<strong>Success!</strong> News Letter has been created.
                        </div>";
                    }else{
					echo "
						<div class='alert alert-danger'>
						<strong>Failed!</strong> Creating failed. ".$_SESSION['errorMessage']."
						</div>";
                }
                */
                
            ?>
          <form>
                <div class="card">
                     <div class="well profile">
                        <div class="col-sm-12">
                            <div class="col-xs-12 col-sm-8">
                            <?php while($row = $rows->fetch()) {
                                   if($row['checkout']==null) {
                                
                                ?>
                            
                            <br>

                            <a href="dummypage.php" class="btn bg-primary text-white" style="float:right; margin-right:-330px"><i class="fas fa-chevron-left"></i><b> Back</b></a>
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
                                    <p><strong>Check in date : </strong><i style="color:blue"></i><?php echo $row['check_in'];?></p>
                                </div>
                                </div>  <br>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br>

            <form action="checkout.php?id=<?php echo $_GET['id']; ?>" method="POST" enctypye="multipart/form-data">
                            <!-- INPUTS -->
                           <?php 
                           $date1 = date_create($row['check_in']);
                            
                           $date2 = date_create($row['checkout']);
                        
                           //$diff = date_diff($date1,$date2);
                           //$point = $diff->format("%a%");
                            
                            ?>  
              <!--  <input type="text" value='<?php // echo $row[9]; ?>' name="id">
                
                <input type="hidden"  value="<?php //echo $row['points']+$point+1;?>"  name="points"> -->
                <input type="hidden"  value="<?php echo $row[18];?>"  name="loyalty_id" >
                <input type="hidden"  value="<?php echo $row[9];?>"  name="id" >
                <input type="text"  value="<?php echo $row['points'];?>"  name="points" >
                <?php if($row['checkout']==null){?>
               Payment: <input type="number" name="total" required>
                <button type="submit" name="submitCheckout" class="btn btn-success" style="float:right;"> Check Out </button>
                <?php }?>
            </form>
            
                
                <?php }
            } ?>
	  </div>
	</div>
</div>