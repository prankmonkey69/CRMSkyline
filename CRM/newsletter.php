<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $object = new View;
  $rows = $object->viewNewsLetter();
  require_once '../class/mailcontroller.php';
  require_once '../class/mailview.php';
  $mail = new mailview;

?>

<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	  	<b> <i class="fas fa-mail-bulk"></i> NewsLetter</b>
	  </div>
	  <div class="card-body">

		<?php
			if(isset($_POST['submitNewsLetter'])){
				if($object->insertNewsLetter($_POST['title'],$_POST['description'],$_FILES['file'],$_POST['updated_at'])){
					echo "
						<div class='alert alert-success'>
						<strong>Success!</strong> News Letter has been created.
						</div>";
						$rows = $object->viewNewsLetter();
				}else{
					echo "
						<div class='alert alert-danger'>
						<strong>Failed!</strong> Creating failed. ".$_SESSION['errorMessage']."
						</div>";
				}
			}
		?>
		<?php
			if(isset($_POST['email_data']))			
			{
			$number = count($_POST["email"]);
			echo "
			<div class='alert alert-success'>
			<strong>Success!</strong> Newsletter has been sended.
			</div>";
			if($number>0){
				for($i=0; $i<$number;$i++){
				if($mail->getsendNewsletter($_POST['email'][$i],
				$_POST['title'],$_POST['description'],$_POST['filename'])){
				
				}
				}
			}
			}
		?>
		<?php
			if(isset($_POST['emails']))			
			{
			$number = count($_POST["email"]);
			echo "
			<div class='alert alert-success'>
			<strong>Success!</strong> Newsletter has been sended.
			</div>";
			if($number>0){
				for($i=0; $i<$number;$i++){
				if($mail->getsendNewsletter($_POST['email'][$i],
				$_POST['title'],$_POST['description'],$_POST['filename'])){
				
				}
				}
			}
			}
		?>

	    <!---insert transaction here--->
         <div class="col-md-12">
            <div class="card shadow-sm">
                  <div class="card-body">
				  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#accept" style="float:right;">
                    Create News Letter
                </button>
	                  	<form action="/search" method="GET" style="width:400px"> 
	                          <input type="text" name="title" class="form-control" placeholder="Search">
	                          <input type="submit" hidden>
	                    </form>
	                    <br>
					    <table class="table table-borderless">
					        <thead class="bg-primary text-white">
					          <tr>
					            <th scope="col">#</th>
					            <th scope="col" >Title</th>
					            <th scope="col" style='text-align:left'>Description</th>
					            <th scope="col">Created Date</th>
					            <th scope="col" style="width:100px;">Action</th>
					          </tr>
					        </thead>
					        <tbody>
									<?php $count = 1; ?>
								<?php while($row = $rows->fetch()) {?>
								<tr>
									
									<td scope="row"><?php echo $count; ?></td>
									<td><?php echo $row['title'];?></td>
									<td><?php echo $row['description'];?></td>
									<td><?php echo $row['created_at'];?></td>
									<td><a href="newsletter-view.php?id=<?php echo $row['id']; ?>" class="button btn-view"><i class="fas fa-eye"></i>&nbsp;view</a>
								</tr>
								<?php $count++; ?>
								<?php }?>
								</tbody>
					      </table>
				  </div>
				</div>
			</div>
	  </div>
	</div>
</div>

<form action="newsletter.php" method="POST" enctype="multipart/form-data">
  <div class="modal" tabindex="-1" role="dialog" id="accept">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Create News Letter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <!-- INPUTS -->
				<span>Title</span>
				<input type="text" name="title" class="form-control"required>
			</div>
			<div class="form-group">
				<span>Description</span>
				<textarea name="description" class="form-control"required></textarea>
			</div>
			<div class="form-group">
				<span>Photo</span>
				<input type="file" name="file" class="form-control" style="height:45px;" required>
			</div>
			<div class="form-group">
				<span>Post Until</span>
				<input type="date" name="updated_at" date-format="YYYY-mm-dd" class="form-control"required>
			</div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="submitNewsLetter" class="btn btn-success" onclick="return confirm('Are you sure?')">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
          </div>
  </div>
</form>