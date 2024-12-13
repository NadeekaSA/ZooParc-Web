<html> <head> <title>Selecting MySQL Database</title> </head> <body>
 <?php $dbhost = 'localhost';
  $dbuser = 'root'; 
  $dbpass = '';
  //mysqli_connect It opens a connection to a MySQLi Server
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
       if(!$conn ) { 
   die('Could not connect: ' . mysqli_error($conn));
    }
    echo '<br>';
	echo 'Welcome to ZooParc Community';
	//select the data base
	$db= mysqli_select_db($conn,'zooparcdb');
	
	if(!$db){
	

	 echo ' Select the database first ';
	
	}else
	  echo ' ,You are now member at ZooParc  ';
	
	
	
	  //mysqli_close($conn); ?> 
      </body> </html>
      
  