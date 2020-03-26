<?php require('includes/config.php'); ?>
<?php require('includes/header.php'); ?>

<?php 
  

try {
	if($_GET['user_ref']){
	$set = $_GET['user_ref'];

	$sel = "SELECT users.username, users.id, sets.title, sets.defination, sets.term, sets.sets_id, sets.img, sets.id 
     FROM users INNER JOIN sets ON users.id = sets.sets_id and users.id = '$set' 
     ";
    $sel_run = $conn->prepare($sel);
    $sel_run->execute();
    while ($sel_fetch = $sel_run->fetch(PDO::FETCH_ASSOC)) {
    	echo "
	  	  <div class='conatiner'>
	  	       <a href='singel.php?x=$sel_fetch[id]'><h5>$sel_fetch[title]</h5></a>
		  	   <div class='flip-card'>
				  <div class='flip-card-inner'>

				    <div class='flip-card-front'>
				      
				      <p>$sel_fetch[term]</p>

				    </div>
				    <div class='flip-card-back'>
				      <h1>$sel_fetch[defination]</h1> 
				      <img class='img_sets' src='sets_img/".$sel_fetch['img']."' /> 

				    </div>
				  </div>
				</div>
		  </div>";
		

    }
   } 


 }catch(PDOException $e) {
 	echo $e->getMessage();
 }


  	


?>