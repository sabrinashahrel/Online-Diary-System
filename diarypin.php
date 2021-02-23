
<!DOCTYPE html>
<html>
<head>


<style>
body {
  background-image: url('floral.jpg');
    background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

 {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
	
  padding: 16px;
   
  margin: 24px 0 12px 0;
  background-color: white;
   
}

/* Full-width input fields */
 input[type=password] {
  width: 50%;
  padding: 5px;
  margin: 2px 0 22px 0;position:center;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=password]:focus {
  background-color: #ddd;position:center;
  
  outline: none;
}


</style>


<meta charset="utf-8">
<title>Verify Pin</title>

<link rel="stylesheet" href="css/style.css" />

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>
<?php
	require('yeardiarydb.php');//macam import dlm java
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['password'])){
		
	
		
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	
        $query = "SELECT * FROM `folname` WHERE password='".sha1($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['password'] = $password;
			header("Location: textsearch.php"); 
            }else{
				echo "<div class='form' style='font-size:150%; text-align:center;'><h3>Password is incorrect.</h3><br/>Click here to <a href='home.php'>Homepage</a>
				<br/>Click here to <a href='diarypin.php'>try again</a></div>";
				}
    }else{
?>

<h1 style="text-align:center; font-size:250%; font-family:verdana"><b>Welcome to Online Diary</b></h1>
<p style="text-align:center; font-size:100%; font-family: Lucida Console, Courier New, monospace;" ><strong><i>Keep your personal memory secretly</i></strong></p><br>

<br>
<p style="font-family:arial; font-size:150%; text-align:center;"><a href="home.php">Homepage</a> | <a href="write.php">Write Diary</a>


<div class="container" style="text-align:left;" >
<form name="diarypin" action="" method="post">
<center>
<br>
<label for="password"><b>Please enter a correct pin of your diary:</b></label>
<input type="password" name="password" size="50" placeholder="Pin" required /><br>

<input name="submit" type="submit" value="Verify" />

</center>





<?php } ?></div>

</body>
</html>
