
<?php

//include("auth.php");

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `users` WHERE CONCAT(`id`, `folder`, `tittle`, `message`, `trn_date`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `users` ORDER BY id desc;";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost","root","Dubai304","yeardiary");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


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
 
}


table {
  font-family: arial, sans-serif;
  border: 1px solid black;
   width: 100%;
 
}

table.center {
  margin-left: 0%; 
  margin-right: 0%;
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 18px;
  margin-left: 50%; 
  margin-right: auto;
}
tr:nth-child(odd) {
  background-color: #FFE4E1;
}


tr:nth-child(even) {
  background-color: #FFE4E1;
}


</style>

<meta charset="utf-8">
<title>Diary Collection</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<h1 style="text-align:center; font-size:250%; font-family:verdana"><b>Welcome to Online Diary</b></h1>
<p style="text-align:center; font-size:100%; font-family: Lucida Console, Courier New, monospace;" ><strong><i>Keep your personal memory secretly</i></strong></p><br>
<br>
<p style="font-family:arial; font-size:150%; text-align:center;"><a href="home.php">Homepage</a> | <a href="write.php">Write Diary</a>

<form action="textsearch.php" method="post">
	<input type="text" name="valueToSearch" placeholder="Search">
	<input type="submit" name="search" value="Find"><br><br>
 </form>
 
<div class="center">

<table class="center" width="50%" border="2" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong> Id </strong></th>
<th><strong> Folder Name </strong></th>
<th><strong> Tittle </strong></th>
<th><strong> About</strong></th>
<th><strong> Date</strong></th>
<th><strong> Edit</strong></th>
<th><strong> Delete</strong></th>
</tr>
</thead>
<tbody>

 <?php 
 $count=1;
 while($row = mysqli_fetch_array($search_result)):?>

<tr>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["folder"]; ?></td>
<td align="center"><?php echo $row["tittle"]; ?></td>
<td align="center"><?php echo  $row["message"]; ?></td>
<td align="center"><?php echo $row["trn_date"]; ?></td>
<td align="center">
<a href="editsearch.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deletesearch.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>

</tr>

    <?php $count++;
	endwhile;?>

</tbody>
</table>
</div>
</body>
</html>