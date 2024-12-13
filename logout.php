<html>
   <head>
      <title>Community Logout</title>
      <link rel="stylesheet" href="animalstyle.css">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
   </head>
<body background="memberbg.png">
<?php
		session_start();
   
   if(session_destroy()) {
	   
	   echo '<h1 class="top-heading">You have been successfully logout</h1>">'; 
      echo '<br>';
      echo '<a href="home.html" class="enquire-button"> Go to Home </a>';
   }		
?>
</body>
</html>