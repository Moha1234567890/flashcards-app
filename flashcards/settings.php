<?php include_once "includes/config.php" ?>
<?php include_once "includes/header.php" ?>

<?php 
  error_reporting(0);

  //getting the data with get 
  if($_GET['my_settings']) {
  	$id = $_GET['my_settings'];
  	$qu = "SELECT * FROM users where id ='$id'";
  	$qu_run = $conn->query($qu);
    

    //fetching my shit togther
  	while($qu_fetch = $qu_run->fetch(PDO::FETCH_OBJ)) {
  		$name  =  $qu_fetch->username;
  		$email =  $qu_fetch->email; 
  		$password =  $qu_fetch->password; 
  		$mon_pic = "<img class='img_setts' src='users_img/".$qu_fetch->user_img."' />";
  		$id_shit = $qu_fetch->id;


  	}
  	
  }
  if (isset($_POST['Update'])) {
  	$id_up = $_POST['up_id'];
  	$name_up = $_POST['name'];
  	$email_up = $_POST['email'];
  	$pass_up = $_POST['password'];
  	$img_up = $_FILES['img']['name'];

  	$dir = 'users_img/' . $img_up;
  	// you got the img done 
  	// now display it in the header with sessions
            
	   	    //now moving the image to the direction
	if(move_uploaded_file($_FILES['img']['tmp_name'],$dir)) {
	   	    	echo "success";


  	$qu_up = "UPDATE users SET 
  	 username=:username,
  	 email=:email,
  	 password = :password,
  	 user_img = :img
     WHERE id=:ids
  	 ";

  	 
  	 if ($query = $conn->prepare($qu_up)) {
	     $query->execute(array(
  	 	':username' => $name_up,
  	 	':email' => $email_up,
  	 	':password' => $pass_up,
  	 	':img' => $img_up, 
        ':ids' => $id_up
  	    ));

	    //$last = $query->rowCount();
	    $last = $conn->lastInsertId();
	    //var_dump($last); 
	    //my fucking select stmt
	    $sel_up = "SELECT * FROM users where id='$last'";
	    $sel_up_run = $conn->query($sel_up);
	    //fetching it
	    $sel_up_fe = $sel_up_run->fetch(PDO::FETCH_OBJ);
	  
	    
	    
	    	header("Refresh:0");
	    
		echo "<img src='users_img/'".$sel_up_fe->user_img."' />";

		
	    
	    


  	 	
  	 
  	 	
  	 }
  	 
  } else {
  	echo "smth is wrong";
  }




?>

<div class="conatiner">
	 	<form enctype="multipart/form-data" action="" method="POST">
		  <span class="form-group" style="white-space:nowrap" >
		    <label for="exampleInputEmail1" >Name</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title" name="name" value="<?php echo $name; ?>">
		    <small id="emailHelp" class="form-text text-muted"></small>
		  </span>

		  <div class="form-group">
		    <label for="exampleInputEmail1" >email</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Term" name="email" value="<?php echo $email; ?>">
		    <small id="emailHelp" class="form-text text-muted"></small>
		  </div>
		  
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Defination" name="password" value="<?php echo $password; ?>">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Image</label>
            <?php echo $mon_pic;?>
		    <input type="hidden" name = "hidden" class="form-control" id="exampleInputPassword1" size=100000 >
		    
		    <input type="file" class="form-control" id="exampleInputPassword1" name="img" value=""
		    >
		  </div>

		  <input type="hidden" name='up_id' value="<?php echo $id;?>" />

		  <input type="submit" class="btn btn-primary" name="Update" value="update">
		  <br>
		  
		</form>
</div>