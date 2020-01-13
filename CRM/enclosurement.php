<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $object = new View;
  $rows = $object->viewEnclosementlist();

?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	  	<b><i class="fas fa-user"></i> Travel Agent Enclosurement</b>
	  </div>
	  <div class="card-body">
	    <!---insert transaction here--->
		          
<?php
if(isset($_POST['submitEnclosure'])){
    if($object->insertEnclosure($_POST['travelagent_id'],
    $_POST['no_of_guests'],
    $_POST['reserved_date'],
    $_POST['no_of_days'],
    $_POST['promo_id'],
    $_POST['type_no'],
    $_POST['no_of_room'])){
        echo "
        <div class='alert alert-success'>
        <strong>Successfully Added!</strong>.
        </div>";
        $rows = $object->viewEnclosementlist();
        }
        else{
        echo "
        <div class='alert alert-danger'>
        <strong>Failed!</strong> Creating failed. ".$_SESSION['errorMessage']."
        </div>";
        }
              
        }
    
if(isset($_POST['submitEnclosure'])){
    $number = count($_POST["name"]);
    if($number>0){
        for($i=0; $i<$number;$i++){
            if($object->insertType($_POST['name'][$i],
                $_POST['type_no'])){
        
                
            }    
        }
    }
}

?>
         <div class="col-md-12">
            <div class="card shadow-sm">
                  <div class="card-body">
				  <a class="btn btn-primary" href="travelagent.php" style="float:right;">
					Travel Agent
					</a>
	                  	<form action="/search" method="GET" style="width:400px"> 
	                          <input type="text" name="title" class="form-control" placeholder="Search">
	                          <input type="submit" hidden>
	                    </form>
						
	                    <br>
					    <table class="table table-borderless">
					        <thead class="bg-primary text-white">
					          <tr>
					            <th scope="col">#</th>
					            <th scope="col">Agent Name</th>
					            <th scope="col">No. of Guests</th>
					            <th scope="col">Created Date</th>
					            <th scope="col">Action</th>
					          </tr>
					        </thead>
					        <tbody>
									<?php $count = 1; 
									if($rows->rowCount()!=0){ ?>
								<?php while($row = $rows->fetch()) {?>
								<tr>
									<td scope="row"><?php echo $count++; ?></td>
									<td><?php echo ucfirst($row['lastname']).", ".ucfirst($row['firstname']); ?> </td>
									<td><?php echo $row['no_of_guests'];?></td>
									
									<td><?php echo $row['created_at'];?></td>
									<td><a href="enclosurement-view.php?id=<?php echo $row[9]; ?>"class="button btn-view"><i class="fas fa-eye"></i>&nbsp;view</a>
								</tr>
								
								<?php }
								}else{
								?>
								<tr>
									<td colspan='5'><h6 class="card-subtitle mb-2 text-muted " align='center' >No data found</h6></td>
								</tr>
								<?php	
								}
								?>
								</tbody>
					      </table>
				  </div>
				</div>
			</div>
	  </div>
	</div>
</div>