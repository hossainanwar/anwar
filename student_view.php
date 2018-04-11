<?php include "header.php";?>
<?php include "student.php";?>

		 <?php 
		  error_reporting(0);
	      $stu= new student();
	       $dt=$_GET['dt'];

		  if($_SERVER['REQUEST_METHOD']=='POST'){
		   $attend=$_POST['attend'];
		  $att_update=$stu->updateAttendance($dt,$attend);
	   }
	?>

	<?php
	 if(isset($att_update)){
		 echo $att_update;
	 }
	?>



	   <div class="panel panel-defaulat">
	   <div class="panel-heading">
	     <h2>
		 
		 <a class="btn btn-info pull-right" href="date_view.php">back</a>
		 
		 </h2>
	   
	   </div>
	   <div class="panel-body">
	     <div class="well text-center" style="font-size:18px;">
		      <strong>Date:</strong><?php  echo $dt;?>
		   </div>
	       
	      <form action="" method="post">
		   <table class="table table-striped">
		      <tr>
				  <th width="25%">Serial No:</th>
				  <th width="25%">Employee Name:</th>
				  <th width="25%">Employee ID:</th>
				  <th width="25%">Attendence:</th>
			  </tr>
			 
			   <?php 
			
			   $get_student= $stu->getAlldata($dt);
			     if( $get_student){
				  $i=0;
				  while($value = $get_student->fetch_assoc()){
					  $i++;
			
			  
			  ?>
			   
			 <tr>
			     <td><?php echo $i;?></td>
			     <td><?php echo $value['name'];?></td>
			     <td><?php echo $value['roll'];?></td>
			     <td>
				 <input type="radio" name="attend[<?php echo $value['roll'];?>]" value="present"<?php if($value['attend']=="present"){echo "Chaked";}?>>P
			     <input type="radio" name="attend[<?php echo $value['roll'];?>]" value="absent"<?php if($value['attend']=="absent"){echo "Chaked";}?>>A
				 </td>
			  
			 </tr>
	<?php }	  }?>	
                 <tr>
			   <td>
			   <input type="submit" name="submit" value="Update" class="btn btn-success">
			   </td>
			   
			   </tr>	
			  
			
		   
		   </table>
		  
		  </form>
	   
	   </div>
	 </div>
  
 <?php include "footer.php";?>