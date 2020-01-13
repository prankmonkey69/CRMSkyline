<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $customer_loyalty = new View;
  $rows = null
?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b><i class="fas fa-id-card"></i>&nbsp; Guest Loyalty List</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here--->
      <?php 
    if(isset($_GET['search'])){
        $rows = $customer_loyalty->loyaltySearch($_GET['id']);
      }else{  
        $rows = $customer_loyalty->viewCustomer_loyalty();

      }
    ?>
  
          <div class="col-md-12">
            <div class="card shadow-sm">
                  <div class="card-body">
                    <form action="customer-loyalty.php" method="GET" style="width:400px"> 
                            <input type="text" name="id" class="form-control" placeholder="Search">
                            <input type="submit" name="search" hidden>
                    </form>
                    <br>
                     <table class="table table-borderless">
                           <thead class="bg-primary text-white">
                             <tr>
                               <th scope="col">#</th>
                               <th scope="col">Name</th>
                               <th scope="col">Email</th>
                               <th scope="col">Action</th>
                             </tr>
                           </thead>
                           <tbody>
                           <?php $count = 1; ?>
                           <?php 
                           if($rows->rowCount() != 0){
                             while($row = $rows->fetch()) {?>
                              <tr>
                                <td scope="row"><?php echo $count++;?></td>             
                                <td scope="row"><?php echo ucfirst($row['lname']).', '.ucfirst($row['fname']);?></td>
                                <td scope="row"><?php echo $row['email'];?></td>
                                <td><a href='customer-loyalty-view.php?id=<?php echo $row[0]; ?>' class="button btn-view"><i class="fas fa-eye"></i> View </a></td>
                                </tr>
                              <?php } ?>
                              
                            <?php }else{ echo"
                              <td colspan='4'><h6 class='card-subtitle mb-2 text-muted ' align='center' >No data found</h6></td>
                              ";} ?>
                            </tbody>
                         </table>
                  </div>
               </div>
	 	 </div>
	</div>
</div>