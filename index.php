<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Third Party App</title>
</head>
<body>

<?php
  if($_GET['error']){
    echo $_GET['error'].'<br><br>';
  }
  if(!isset($_SESSION['uid'])){
?>
Connect to oauth:
<form action="http://localhost:10000/phpchkauth.php" method="post">
  <input type="hidden" name="cid" value="L1WdM5uzWN01FpYk6Cmu92oaDryDru " /><br>
  <input type="hidden" name="csk" value="327304e1152d24fbb6023ca1aa2a1ea4">
  <button>OAUTH2 Connection</button>
</form>

<?php }
  else{
?>

<h1>Seems you are connected already</h1>
<?php
  #print_r($_SESSION)
  //echo "Welcome to thirdparty.com<br>You just gave us access to the following information:<br><br>";
  //echo "Username: <span style='color:red;'>";
  if (isset($_SESSION['user_data'])){
     echo "username: ";
     echo $_SESSION['user_data']['username'];
     echo "<br>";
     echo "firstname: ";
     echo $_SESSION['user_data']['firstname'];
     echo "<br>";
     echo "lastname: ";
     echo $_SESSION['user_data']['lastname'];
     echo "<br>";
     echo "<a href='http://localhost:8000/signout.php'>Sign out</a>";
   }
   else{
     echo "8 mile";
   }
?>

<?php  }
 ?>
</body>
</html>
