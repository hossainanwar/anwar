<?php include "header.php";?>
<?php include "student.php";?>
<?php 
  error_reporting (0);
  $stu= new student();
  $date=date("Y-m-d");

      if($_SERVER['REQUEST_METHOD']=='POST'){
	   $attend=$_POST['attend'];
	   $inserattend=$stu->insertAttendance($date,$attend);
   }
?>

<?php
 if(isset($inserattend)){
	 echo $inserattend;
 }
?>
	   <div class="panel panel-defaulat">
	   <div class="panel-heading">
	     <h2>
		 <a class="btn btn-success" href="add.php">Add Employee</a>
		 <a class="btn btn-info pull-right" href="date_view.php">View All</a>
		 
		 </h2>
	   
	   </div>
	   <div class="panel-body">
	       <div class="well text-center" style="font-size:18px;">
		      <strong>Date: </strong><?php  echo $date;?>
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
			  $get_student= $stu->getStudent();
			  if($get_student){
				  $i=0;
				  while($value = $get_student->fetch_assoc()){
					  $i++;
			
			  
			  ?>
			  
			  <tr>
			     <td><?php echo $i;?></td>
			     <td><?php echo $value['name'];?></td>
			     <td><?php echo $value['roll'];?></td>
			     <td><input type="radio" name="attend[<?php echo $value['roll'];?>]" value="present">P</td>
			     <td><input type="radio" name="attend[<?php echo $value['roll'];?>]" value="absent">A</td>
			  
			  </tr>
	<?php }	  }?>		  
			  
			   
			  
			   <tr>
			   <td>
			   <input type="submit" name="submit" value="submit" class="btn btn-success">
			   </td>
			   
			   </tr>
		   
		   </table>
		  
		  </form>
	   
	   </div>
	 </div>
  
 <?php include "footer.php";?>