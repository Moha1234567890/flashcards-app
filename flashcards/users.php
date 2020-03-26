<?php 

require "includes/config.php"; 
?>
<?php include_once "includes/header.php"; ?>



<?php 
  

  if (isset($_GET['userss'])) {
  	
    

    $user_name = $_GET['userss']; 
    include_once('includes/header.php');
  	$sql ="SELECT user_img from users where username='$user_name'";
  	$run_sql = $conn->query($sql);
  	while($sql_fetch = $run_sql->fetch(PDO::FETCH_ASSOC)) {
      $my_images = "<img class='img' src='users_img/".$sql_fetch['user_img']."' />";  
      echo $my_images;          
      

    }

 
  			
  	

  


  }

  
  