

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
  background-color: white;
}

/* Full-width input fields */
input[type=folder], input[type=tittle], input[type=message], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=folder]:focus, input[type=tittle]:focus, input[type=message]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>


<meta charset="utf-8">
<title>Send Message</title>
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
    if (isset($_REQUEST['folder'])){
		
		$folder = stripslashes($_REQUEST['folder']);
		$folder = mysqli_real_escape_string($con,$folder);
		$tittle = stripslashes($_REQUEST['tittle']);
		$tittle = mysqli_real_escape_string($con,$tittle);
		$message = stripslashes($_REQUEST['message']);
		$message = mysqli_real_escape_string($con,$message);
		

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` ( folder, tittle, message, trn_date) VALUES ('$folder', '$tittle',  '$message', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form' style='font-size:150%; text-align:center;'><h3>Added successfully.</h3><br/>
			Click here will go to<a href='home.php'> Homepage</a></div>";
        }
    }else{
?>

<h1 style="text-align:center; font-size:250%; font-family:verdana"><b>Welcome to Online Diary</b></h1>
<p style="text-align:center; font-size:100%; font-family: Lucida Console, Courier New, monospace;" ><strong><i>Keep your personal memory secretly</i></strong></p><br>


<br>
<p style="font-family:arial; font-size:150%; text-align:center;"><a href="home.php">Homepage</a> | <a href="setFolder.php">Create Folder</a>

<div class="container" style="text-align:left;" >

<form name="write" action="" method="post">

 <label for="folder">Folder Name:</label>
<input type="folder" name="folder" size="50" placeholder="Folder Name" required /> 

<label for="tittle">Tittle:</label><br />
<input type="tittle" name="tittle" size="50" placeholder="Tittle" required /> 

<label for="message">Memory:</label><br />
<input type="message" name="message" size="50" placeholder="Memory" required />




<input type="submit" name="submit" value="Add" />
</form>



<?php } ?></div>
</body>
</html>
