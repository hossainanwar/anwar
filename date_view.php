<?php include "header.php";?>
<?php include "student.php";?>

	   <div class="panel panel-defaulat">
	   <div class="panel-heading">
	     <h2>
		 
		 <a class="btn btn-info pull-right" href="index.php">Take Attendence</a>
		 
		 </h2>
	   
	   </div>
	   <div class="panel-body">
	       
	      <form action="" method="post">
		   <table class="table table-striped">
		      <tr>
				  <th width="30%">Serial No:</th>
				  <th width="50%">Attendence Date:</th>
				  <th width="20%">Action:</th>
				 
			  </tr>
			  
			  <?php 
			   $stu= new student();
			   $get_data= $stu->getDatelist();
			  if($get_data){
				  $i=0;
				  while($value = $get_data->fetch_assoc()){
					  $i++;
			
			  
			  ?>
			  
			  <tr>
			     <td><?php echo $i;?></td>
			     <td><?php echo $value['att_time'];?></td>
				 <td>
			  <a class="btn btn-primary" href="student_view.php?dt=<?php echo $value['att_time'];?>">View</a>
			    </td>
			  </tr>
	<?php }	  }?>		  
			  
			
		   
		   </table>
		  
		  </form>
	   
	   </div>
	 </div>
  
 <?php include "footer.php";?>