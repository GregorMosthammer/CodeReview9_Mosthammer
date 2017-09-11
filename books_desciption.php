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


<?php echo  "<br>" . "<a href='Account.php?id=" . 
           $userRow["userId"] . 
           "'>". "Account Details"  . "</a>"?>

</div>
</div>

<?php
echo "<div class='container-fluid'>";

$books_id= $_GET["id"];

  $res=mysqli_query($conn, "SELECT * FROM books WHERE booksId=" . $books_id);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

echo "<div class='row'>" . 
"<div class='col-md-3'>" . "</div>" . "<div class='col-md-6'>" ."<div class='table'>" . "<table class='table'>" ."<tbody>" . "<tr>" . "<td>"
  ."Titel: " . $userRow['title'] .
  "</td>" . "<td>" . " Author: " . $userRow['author'] .
  "</td>" . "<td>" . " ISBN: " . $userRow['isbn'] .
  "</td>" . "<td>" . "Description: " .$userRow['description'] .
  "</td>" . "<td>" ." Status: " .$userRow['status'] . "</td>" . "<td>" .
"<img style='width:100px; height:150px' src='" . $userRow["img"] . "'>"  . "</td>" . "</tr>" . "</tbody>". "</table>". "</div>" . "</div>" . "<div class='col-md-3'>" . "</div>" . "</div>";



 
            ?>
         
   
</body>
</html>
<?php ob_end_flush(); ?>