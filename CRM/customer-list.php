<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $customer_lists = new View;
  $rows = null;
  

?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b>  <i class="fas fa-users"></i> Guest List</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->
  <?php 
    if(isset($_GET['search'])){
      $rows = $customer_lists->searchid($_GET['id']);
      }else{
        $rows = $customer_lists->viewCustomer_list();
      }
    
  
  ?>
          <div class="col-md-12">
            <div class="card shadow-sm">
                  <div class="card-body">
                    <form action="customer-list.php" method="GET" style="width:400px"> 
                            <input type="text" name="id" class="form-control" placeholder="Search">
                            
                            <input type="submit" name='search'hidden>
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

                              <?php 
                              $count=1;
                              while($row = $rows->fetch()) {?>
                              <tr>
                                <td scope="row"><?php echo $count++ ?></td>             
                                <td scope="row"><?php echo $row['fname'];?>, <?php echo $row['lname'];?> <?php echo $row['mname'];?>.</td>
                                <td scope="row"><?php echo $row['email'];?></td>
                                <td><a href="customer-list-view.php?id=<?php echo $row["id"]; ?>" class="button btn-view"><i class="fas fa-eye"></i> View </a></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                         </table>
                  </div>
               </div>
	  </div>
	</div>
</div>