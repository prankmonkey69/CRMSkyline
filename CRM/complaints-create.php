<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $object = new View;
  $rows = null;
  //$rows = $object->searchName($_POST['name']);
  
?>
<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b> Creating Guest Complaint</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here??--->
      <?php 
    if(isset($_GET['search'])){
      $rows = $object->searchid($_GET['id']);
      }else{
        $rows = $object->viewCustomer_list();
      }
    
  
  ?>
          
                <div class="card">
                     <div class="well profile">
                        <div class="col-sm-12">
                            <div class="col-xs-12 col-sm-8">
                            <br>
                              <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                  <span>Search Name:</span>
                                  <form action="complaints-create.php" method="GET" > 
                                    <input type="text" name="id" class="form-control" placeholder="Search">
                                    <input type="submit" name="search" hidden>
                                  </form>
                                  <table>
                                  <form action="complaints-create.php" method="POST" > 
                                   <?php
                                   if($rows->rowCount() != 0){
                                   while($row = $rows->fetch()){ 
                                     ?>
                                   <tr>
                                   <input type="text" id = "guest_id"  value="<?php $row['id'];?>">
                                    <td><?php echo ucfirst($row['fname']).', '.ucfirst($row['lname']).' '.ucfirst($row['mname']); ?></td>
                                    <td style="float:right;"> <button onclick="getVal();"> Select </button> </td>
                                   </tr>
                                   </from>
                                   
                                   <?php }
                                   }else{ 
                                     echo"
                                     <br>
                                    <td colspan='2'><h6 class='card-subtitle mb-2 text-muted ' align='center' >No data found</h6></td>
                                    ";  
                                   }
                                    ?>
                                  </table>
                                  </div>
                                  
                                  </div>
                                  <!---->
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                    <span>Search Name:</span>
                                    <form action="complaints-create.php" method="GET" > 
                                      <input type="text" id="id" name="guest_id" class="form-control" >
                                    </div>
                                  </div>
                              </div>
                            <br>
                            </div>
                        </div>
                    </div>
                </div>
                
	  </div>
	</div>
</div>


<script>


function getVal(){
 var guest_id =  document.getElementById('guest_id').value;
 document.getElementById('id').value = guest_id;
}

</script>