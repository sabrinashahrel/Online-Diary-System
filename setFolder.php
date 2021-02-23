

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
   font-size:150%;
  background-color: black;
}

 {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

.container1 {
  padding: 16px;
  
}

/* Full-width input fields */
input[type=yearid], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=yearid]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}




</style>


<meta charset="utf-8">
<title>Folder</title>
<link rel="stylesheet" href="css/style.css" />

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<?php
	require('yeardiarydb.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['yearid'])){
		
		$yearid = stripslashes($_REQUEST['yearid']);
		$yearid = mysqli_real_escape_string($con,$yearid);
		
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		
        $query = "INSERT into `folname` ( yearid, password) VALUES ('$yearid',  '".sha1($password)."')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='container1' style='font-size:150%; text-align:center;'><h3>Pin is set successfully.</h3><br/>
			Click here to <a href='write.php'> write your diary now!</a></div>";
        }
    }else{
?>



<h1 style="text-align:center; font-size:250%; font-family:verdana"><b>Welcome to Online Diary</b></h1>
<p style="text-align:center; font-size:100%; font-family: Lucida Console, Courier New, monospace;" ><strong><i>Keep your personal memory secretly</i></strong></p><br>


<br>
<p style="font-family:arial; font-size:150%; text-align:center;"><a href="home.php">Homepage</a> | <a href="write.php">Write Diary</a>

<div class="container" style="text-align:left;" >

<form name="write" action="" method="post">

 <label for="yearid">Folder name:</label>
<input type="yearid" name="yearid" size="50" placeholder="Name Folder" required /> 



<label for="password">Pin:</label><br>
<input type="password" name="password" placeholder="Pin" required />


<input type="submit" name="submit" value="Create" />
</form>



<?php } ?></div>
</body>
</html>
