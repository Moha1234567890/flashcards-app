<?php require('includes/config.php'); ?>
<?php require('includes/header.php'); ?>


<?php 
 
  try {


  	if (isset($_GET["x"])) {
  		$id=$_GET['x'];
	  	 if( $z = "SELECT term,defination,img FROM sets WHERE id='$id'" AND
  	     $x = $conn->query($z)) 
	  	 {
	  	 	$sets_fetch = $x->fetch(PDO::FETCH_ASSOC);
	  	 	 			var_dump($x);      
				 echo "
				  	  <div class='conatiner'>
				  	       
					  	   <div class='flip-card'>
							  <div class='flip-card-inner'>

							    <div class='flip-card-front'>
							      
							      <p>$sets_fetch[term]</p>
							      
							    </div>
							    <div class='flip-card-back'>
							      <h1>$sets_fetch[defination]</h1> 
							      <img class='img_sets' src='sets_img/".$sets_fetch['img']."' /> 

							    </div>
							  </div>
							</div>
					  </div>

				


		  	";
		  	echo "<div class='conatiner'>
					<div class='alert alert-primary' role='alert'>
					  <p class='outline'>$sets_fetch[term]</p>
					  <p class='inline'>$sets_fetch[defination]</p>

					</div>
					
					         </div>
		  	                         ";  

		  	  echo "<br>";
	  	 }else {
	  	 	echo "wrong path";
	  	 }

	  	


    }
}catch(PDOException $e){
	echo $e->getMessage();
}

  
  


?>