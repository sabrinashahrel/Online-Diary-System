<?php
require('yeardiarydb.php');

$id=$_REQUEST['id'];
$query = "SELECT * from users where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
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
  font-size:150%;
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

.status{
	font-size:150%; text-align:center;
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
<title>Edit Diary</title>
<link rel="stylesheet" href="css/style.css" />

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>


<h1 style="text-align:center; font-size:250%; font-family:verdana"><b>Welcome to Online Diary</b></h1>
<p style="text-align:center; font-size:100%; font-family: Lucida Console, Courier New, monospace;" ><strong><i>Keep your personal memory secretly</i></strong></p><br>

<br>
<p style="font-family:arial; font-size:150%; text-align:center;"><a href="home.php">Homepage</a> | <a href="textsearch.php">Read Diary</a>
<br><br><br>

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d");
$tittle =$_REQUEST['tittle'];
$message =$_REQUEST['message'];
$update="update users set 
trn_date='".$trn_date."',
tittle='".$tittle."', 
message='".$message."'
where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error()); 

$status = "Record Updated Successfully. </br></br>Thank You</br></br>
<a href='textsearch.php'>View Updated Record</a>";
echo '<p style="color:#FF0000; font-size:110%; text-align:center;">'.$status.'</p>'; 
}else {
?>

<div class="container" style="text-align:left;" >

<form name="editsearch" action="" method="post">

<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />

<label for="tittle">Tittle:</label>
<p><input type="tittle" name="tittle" size="50" placeholder="Tittle" required value="<?php echo $row['tittle'];?>" /></p>

<label for="message">Memory:</label>
<p><input type="message" name="message" size="50" placeholder="Memory" required value="<?php echo $row['message'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>

<?php } ?>
</div>
</div>
</body>
</html>