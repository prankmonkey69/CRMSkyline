<?php
  include '../includes/header.php';
  include '../class/db.php';
  include '../class/controller.php';
  include '../class/view.php';
  include '../includes/navigation.php';
  $enclosure = new View;
  $count = $enclosure->viewCountEnclose();
  $promo = $enclosure->viewPromo();
  
  
?>
<div class="col-12 col-sm-9">
	<div class="card mt-3 shadow-sm">
	  <div class="navigation text-white card-header">
	    <b> Creating Enclosure</b>
	  </div>
	  <div class="card-body">
	  	<!---insert transaction here??--->
                <div class="card">
                     <div class="well profile">
                        <div class="col-sm-12">
                            <div class="col-xs-12 col-sm-8">
                                <form action="enclosurement.php" method="POST" enctype="multipart/form-data">
                                    <!-- INPUTS -->
                                    <div class="form-group">
                                    <br>                                    
                                        <input type="hidden" name="travelagent_id" value="<?php echo $_GET['id'];?>">
                                        <span>Number of Guests</span>
                                        <input type="number" name="no_of_guests" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <span>Reserved Date</span>
                                        <input type="date" data-date="yyyy-mm-dd" name="reserved_date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <span>Number Days</span>
                                        <input type="number" name="no_of_days" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <span>Number of Room</span>
                                        <input type="number" name="no_of_room" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <span>Package</span>
                                        <select name="promo_id" class="form-control" id='id'>
                                        <option selected disabled>--Select Package--</option>
                                    <?php while($promos = $promo->fetch()):; ?>
                                        <option value="<?php echo $promos['id'] ?>"><?php echo $promos['promo'] ?></option>
                                    <?php endwhile ?>
                                        </select>
                                    </div>
                                    
                                    <?php while($counts = $count->fetch()){ ?>
                                        <input type="hidden" name="type_no" value="<?php echo $counts['COU']+1;?>">
                                    <?php }?>
                                    <div class="form-group">
                                        <span>Include(s):</span>
                                    <table id="dynamic_field"> 
                                <br> 
                                    <tr style="height:45px;">  
                                    <td><input type="text" name="name[]" placeholder="Enter include" class="form-control name_list" /></td>  
                                    <td>&nbsp;<button type="button" name="add" id="add" class="btn btn-success">Add More</button></td> 
                                    </tr>
                               </table>  
                               </div>
                                    </div>
                                    <div class="form-group">
                                    &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="submitEnclosure" class="btn btn-success" ?>Submit</button>
                                    <a href="travelagent-view.php?id=<?php echo $_GET['id'];  ?>" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                    </div>
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
           $('#dynamic_field').append('<tr id="row'+i+'" style="height:45px;"><td><input type="text" name="name[]" placeholder="Add include" class="form-control name_list" /></td><td>&nbsp;<button type="button" name="remove" id="'+i+'" class="btn btn-light btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });
    });  

    $(document).ready(function(){
        $("#id").change(function(){
            var adi = $('#id').val();
            $.ajax({
                url: 'enclosure-create.php'
                
            })
        })
    })
 </script>