<?php require('includes/config.php'); ?>
<?php require('includes/header.php'); ?>


<?php 
  
		
		            	
	 


  //making sure if user signin to create careds
  if(isset($_SESSION['user'])) {
  	
  	


  	if (isset($_POST['submit'])) {

	   	//the img shit

	   	//getting the name img
	   	$img_name = $_FILES['img']['name'];

	    //getting the dir
	   	$dir = 'sets_img/' . basename($img_name);
	    

	    //writing the query
	   	$sets = "INSERT INTO sets (title,term,defination,img,sets_id) VALUES (:title,:term,:defination,:img,:sets_id)";

	    //quering the query
	    $sets_run = $conn->prepare($sets);
 
	    //executing it
	    $sets_run->execute(array (
	     ':title'      => $_POST['title'],
	     ':term'       => $_POST['term'],
	     ':defination' => $_POST['defination'],
	     ':img'        => $_FILES['img']['name'],
	     ':sets_id'    => $_SESSION['id']

	    ));
        
	    //moving the img

		    if(move_uploaded_file($_FILES['img']['tmp_name'], $dir)) {
		    	echo "done";
		    } else {
		    	echo "err: ";
		    }
	

	   } else if (!isset($_SESSION['my_img']) OR isset($_POST['submit'])) {

	  	    
	  	 	//header("location:login.php");
	   	echo 'not a member';
	  	 

	  }

  } 
  
   
   //now insertig data into sets
  

   

   


?>




	 <div class="conatiner">
	 	<form enctype="multipart/form-data" action="" method="POST">
		  <span class="form-group" style="white-space:nowrap" >
		    <label for="exampleInputEmail1" >Title</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title" name="title">
		    <small id="emailHelp" class="form-text text-muted"></small>
		  </span>

		  <div class="form-group">
		    <label for="exampleInputEmail1" >Term</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Term" name="term">
		    <small id="emailHelp" class="form-text text-muted"></small>
		  </div>
		  
		  <div class="form-group">
		    <label for="exampleInputPassword1">Defination</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Defination" name="defination">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">IMG</label>
		    <input type="hidden" name = "hidden" class="form-control" id="exampleInputPassword1" size=100000>
		    <input type="file" class="form-control" id="exampleInputPassword1" name="img">
		  </div>

		  <input type="submit" class="btn btn-primary" name="submit">
		  <br>
		  
		</form>
	 </div>
		

