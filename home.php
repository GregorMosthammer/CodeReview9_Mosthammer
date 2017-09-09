<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select logged-in users detail
 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>

	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="styles.css">

<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
</head>
<body>
<div class="acc">

            Hi' <?php echo $userRow['userEmail']; ?>
            

<div style="float:right;">

            <a href="logout.php?logout">Sign Out</a>
</div>

<?php echo  "<br>" . "<a href='Account.php?id=" . 
		       $userRow["userId"] . 
		       "'>". "Account Details"  . "</a>"?>

</div>

<?php

echo "<div class=container>";
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()){
       echo "<div class='row'>" . 


       "<div class='col-md-1'>" . "</div>" . "<div class='col-md-10 classA'>" ."<div class='table'>" . "<table class='table'>" ."<tbody>" . "<tr>" . "<td>" ."Titel: " . $row["title"] . "</td>" . "<td>" . " Author: " . $row["author"] . "</td>" . "<td>" . " ISBN: " . $row["isbn"] . "</td>" . "<td>" . "Description: " .  $row["description"] . "</td>" . "<td>" ." Status: " . $row["status"] . "</td>" . "<td>" . "<img style='width:100px; height:100px' src='" . $row["img"] . "'>" . "</td>" . "</tr>" . "</tbody>". "</table>". "</div>" . "</div>" . "<div class='col-md-1'>" . "</div>" . "</div>";
 }
}else {
	echo "0 results";
}

?>

   
         
   
</body>
</html>
<?php ob_end_flush(); ?>