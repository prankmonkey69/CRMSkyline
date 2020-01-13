<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../classdummy/controller.php';
  include '../classdummy/view.php';
  $customer_lists = new View;
  $rows = $customer_lists->viewCustomer();
  $check = $customer_lists->viewCheck();
  $checksa = $customer_lists->viewCustomer_list();

?>
	  <div class="navigation text-white card-header">
	    <b> Customer Checking</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->
          <?php
			if(isset($_POST['submit'])){
                if($customer_lists->submitCustomer($_POST['fname'],$_POST['mname'],$_POST['lname'],
                                                    $_POST['birthdate'],$_POST['address'],$_POST['country'],
                                                    $_POST['contact_number'],
                                                    $_POST['email'])){
					echo "
						<div class='alert alert-success'>
						<strong>Success!</strong> News Letter has been created.
                        </div>";
                        $rows = $customer_lists->viewCustomer_list();
						
				}else{
					echo "
						<div class='alert alert-danger'>
						<strong>Failed!</strong> Creating failed. ".$_SESSION['errorMessage']."
						</div>";
				}
			}
		?>
    
          <div class="col-md-12">
            <div class="card shadow-sm">
                  <div class="card-body">
                    <form action="dummypage.php" method="POST" enctypye="multipart/form-data">
                    <!-- INPUTS -->
                        <div class="form-group">                                                   
                            <span>Firstname</span>
                            <input type="text" name="fname" class="form-control" required>
                            <span>Middlename</span>
                            <input type="text" name="mname" class="form-control" required>
                            <span>Lastname</span>
                            <input type="text" name="lname" class="form-control" required>
                            <span>Birthdate</span>
                            <input type="date" name="birthdate" class="form-control" data-date="yyyy-mm-dd" required>
                            <span>Address</span>
                            <textarea name="address" class="form-control" required></textarea>
                            <span>Country</span>
                            <input type="text" name="country" class="form-control" required>
                            <span>Email</span>
                            <input type="email" name="email" class="form-control" required>
                            <span>Contact Number</span>
                            <input type="number" name="contact_number" class="form-control" required>
                            <br>
                            <button type="submit" name="submit" class="btn btn-success" >Submit</button>
                        </div>          
                    </form>
                    </div>
                  </div>
               </div>
	  </div>
	</div>
</div>

<!-- list of guest -->
	  <div class="navigation text-white card-header">
	    <b> Customer List</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->
		
          <div class="col-md-12">
            <div class="card shadow-sm">
                  <div class="card-body">
                    <form action="/search" method="GET" style="width:400px"> 
                            <input type="text" name="title" class="form-control" placeholder="Search">
                            <input type="submit" hidden>
                      </form>
                      <br>
                         <table class="table table-borderless">
                           <thead class="bg-primary text-white">
                             <tr>
                               <th scope="col">#</th>
                               <th scope="col">Guest Name</th>
                               <th scope="col">Email</th>
                               <th scope="col">Action</th>
                             </tr>
                           </thead>
                           </thead>
                            <tbody>
                              <?php while($row = $rows->fetch()) { ?>
                              <tr>
                                <td scope="row"><?php echo $row['id'];?></td>             
                                <td scope="row"><?php echo $row['fname'];?>, <?php echo $row['lname'];?> <?php echo $row['mname'];?>.</td>
                                <td scope="row"><?php echo $row['email'];?></td>
                                <td><a href="customer-list-view.php?id=<?php echo $row["id"]; ?>" class="button btn-view"><i class="fas fa-eye"></i> View </a></td>
                                </tr>
                              <?php  }
                               ?>

                            </tbody>
                         </table>
                  </div>
               </div>
	  </div>
	</div>
</div>

<!-- list of check in -->
	  <div class="navigation text-white card-header">
	    <b> Check In</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->
		
          <div class="col-md-12">
            <div class="card shadow-sm">
                  <div class="card-body">
                    <form action="/search" method="GET" style="width:400px"> 
                            <input type="text" name="title" class="form-control" placeholder="Search">
                            <input type="submit" hidden>
                      </form>
                      <br>
                         <table class="table table-borderless">
                           <thead class="bg-primary text-white">
                             <tr>
                               <th scope="col">#</th>
                               <th scope="col">Guest Name</th>
                               <th scope="col">Email</th>
                               <th scope="col">Action</th>
                             </tr>
                           </thead>
                           </thead>
                            <tbody>
                              <?php while($rowss = $check->fetch()) { 
                                  if($rowss['checkout']==null){?>
                              <tr>
                                <td scope="row"><?php echo $rowss['id'];?></td>             
                                <td scope="row"><?php echo $rowss['fname'];?>, <?php echo $rowss['lname'];?> <?php echo $rowss['mname'];?>.</td>
                                <td scope="row"><?php echo $rowss['email'];?></td>
                                <td><a href="new_check.php?id=<?php echo $rowss['customer_id']; ?>" class="button btn-view"><i class="fas fa-eye"></i> View </a>
                                <a href="checkout.php?id=<?php echo $rowss['customer_id']; ?>" class="button bg-white "><i class="fas fa-home"></i> Check out</a></td>
                                </tr>
                              <?php }  }?>

                            </tbody>
                         </table>
                  </div>
               </div>
	  </div>
	</div>
</div>
<!-- list of check out -->
	  <div class="navigation text-white card-header">
	    <b> Check Out</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->
		
          <div class="col-md-12">
            <div class="card shadow-sm">
                  <div class="card-body">
                    <form action="/search" method="GET" style="width:400px"> 
                            <input type="text" name="title" class="form-control" placeholder="Search">
                            <input type="submit" hidden>
                      </form>
                      <br>
                         <table class="table table-borderless">
                           <thead class="bg-primary text-white">
                             <tr>
                               <th scope="col">#</th>
                               <th scope="col">Guest Name</th>
                               <th scope="col">Email</th>
                               <th scope="col">Action</th>
                             </tr>
                           </thead>
                           </thead>
                            <tbody>
                              <?php while($rowsss = $checksa->fetch()) {
                                    
                                  ?>
                              <tr>
                                <td scope="row"><?php echo $rowsss['id'];?></td>             
                                <td scope="row"><?php echo $rowsss['fname'];?>, 
                                <?php echo $rowsss['lname'];?> 
                                <?php echo $rowsss['mname'];?>.</td>
                                <td scope="row"><?php echo $rowsss['email'];?></td>
                                <td><a href="check_in.php?id=<?php echo $rowsss["id"]; ?>" class="button btn-view"><i class="fas fa-eye"></i> View </a></td>
                                </tr>
                                    <?php   
                            }?>

                            </tbody>
                         </table>
                  </div>
               </div>
</div>
</div>