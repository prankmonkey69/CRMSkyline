<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $enclosure = new View;
  $count = $enclosure->viewCountEnclose();
  
  
?>
<?php
if(isset($_POST['submitEnclosure'])){
    if($enclosure->insertEnclosure($_POST['travelagent_id'],
    $_POST['no_of_guests'],
    $_POST['reserved_date'],
    $_POST['no_of_days'],
    $_POST['promo_id'],
    $_POST['type_no'])){
       
                
    }
}
?>


<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b> Adding Enclosure</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here??--->          
            <div class="card">
                    <div class="well profile">
                    <div class="col-sm-12">
                        <div class="col-xs-12 col-sm-8">
                            <form action="enclosure-type.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                <input type="text" name="type_no" value="<?php echo $_POST['type_no'];?>">
                                <table class="table table-bordered" id="dynamic_field"> 
                                <br> 
                                    <tr>  
                                    <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>  
                                    </div>
                                    <button type="submit" name="submit" id="submit" class="btn btn-info"  >Submit</button>  
                                    <a href="travelagent-view.php?id=<?php echo $_GET['id'];  ?>" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            </form>
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
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });
    });  
 </script>
   
 
<?php

if(isset($_POST['submit'])){
    $number = count($_POST["name"]);
    if($number>0){
        for($i=0; $i<$number;$i++){
            if($enclosure->insertType($_POST['name'][$i],
                $_POST['type_no'])){
       
                
            }    
        }
    }
}
?>