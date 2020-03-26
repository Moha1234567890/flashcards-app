<?php 
  
 include('config.php');
 define('QUERY','query.php');

  
  session_start();

?>


<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">
		<link rel="stylesheet" href="dist/css/bootstrap.min.css" />
        <link href="styles/starter-template.css" rel="stylesheet">
        <link rel="stylesheet" href="styles/style_flip.css" />
		<link rel="stylesheet" href="styles/style.css" />
	</head>
	<body>
	 <div class="container">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		  <a class="navbar-brand" href="index.php">FlashCards</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		 
		      <?php 
		        $form = "<form class='form-inline my-2 my-lg-0' method='POST' action='query.php'>
		 <input class='form-control mr-sm-2' type='text' placeholder='Search' aria-label='Search' name='fucks'>
		 <button class='btn btn-secondary my-2 my-sm-0' type='submit' name='submit'>Search</button>
		 
	   </form> ";
		        if($last = $conn->lastInsertId())
		        {
		        	$_SESSION['my_png'];
		        }      

		        if (isset($_SESSION['user'])) {
		        	echo '<ul class="navbar-nav mr-auto"> <li class="nav-item active">
					        <a class="nav-link bold" href="create.php"><span>Create</span></a>
					      </li>
					      </ul>';
					echo $form;      

		        	 echo "<li class='nav-item dropdown'><div>

		                   <a class='nav-link dropdown-toggle' href='#' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>".	          
		                      $_SESSION['my_img'] . $_SESSION['user']."</a>
			               <div class='dropdown-menu' aria-labelledby='dropdown01'>
			                   <a class='dropdown-item' href='user.php?user_ref=$_SESSION[id]'>My Sets</a>
			                   <a class='dropdown-item' href='settings.php?my_settings=$_SESSION[id]		 
			                   '>Settings</a>
			                   <a class='dropdown-item' href='logout.php'>Logout</a>
			        </div>
		      </li>
		      
		          ";
		          
		        }else if (!isset($_SESSION['user'])) {
		        	echo ' <div class="collapse navbar-collapse" id="navbarsExampleDefault">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link bold" href="login.php">Signin <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link bold" href="register.php"><span class="text-">Register</span></a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link bold" href="create.php"><span>Create</span></a>
		      </li>
		      </div>
		      ';

		      echo $form; 
		        }

		        //fucks
		      

		         



		        ?>
		        
		     
       
		    
		   
		  
	    </nav>

	 </div>

	

<?php require("footer.php");?>	
 


