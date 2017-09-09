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
</div>

<?php
$user_id= $_GET["id"];
echo "<h1>".$user_id."</h1>";
  $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=" . $user_id);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
 echo $userRow['userName']; 
            ?>
         
   
</body>
</html>
<?php ob_end_flush(); ?>