<?php
include_once("./connect_database.php");
session_start();

if(isset($_SESSION['email'])){
  header('Location: ./index.php');
}

if (isset($_POST['submit'])){
  $usernameFromForm = $_POST['email'];
  $passwordFromForm = $_POST['password'];
  $name_of_table = "users";
  if (tableExists($db, $name_of_table)) {
    // Prepare a SQL query
    $sqlQuery ="SELECT * FROM $name_of_table WHERE email = '{$usernameFromForm}'";
    $statement1= $db->prepare($sqlQuery);
  
    // Execute the SQL query using $statement1->execute(); and assign the value
    // that is returned  to $result.
    $result = $statement1->execute();
      if (!$result) {
      // Query fails.
      $body = "Retrieving records failed.";
      } 
      else {
      // Query is successful.
      // Convert sqlQuery result to an array and store it in $numberOfRows using $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
      $userInfo = $statement1->fetch(PDO::FETCH_ASSOC);
      if($userInfo) {
        if($userInfo['email'] == $usernameFromForm AND $userInfo['password']  == $passwordFromForm){
          $_SESSION['email'] = $usernameFromForm;
          // get customerID too
          $_SESSION['userID'] = $userInfo['userID'];
          header('Location: ./index.php ');
        }
        else {
          $errorMessage = "Invalid Email or Password";
        }
      }
    }
    // Closing query connection
    $statement1->closeCursor();	
  }
  else {
    // Table does not exist in db.
    $body = "No such user exist";
  }
}
?>

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/sign-in.css">
		<title>Climate Crowdfunding</title>
	</head>

<!-- Body starts -->
	<body class="text-center">
      <form action="sign-in.php" method = "POST" class="form-signin">
          <a class="navbar-brand mb-0 h1" href="./index.php">
            <img src="./images/logo.jpg" width="30" height="30" class="d-inline-block align-bottom" alt="logo">
            Climate Crowdfunding
          </a>
          <img class="img-fluid"src="./images/logo.jpg">
          <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
          <?php 
             if(isset($errorMessage))
              echo "<p>" .$errorMessage. "</p>";
          ?>
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
            <br>
            <a href="./register.php"> Don't have an account? </a>
            <br>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
           
          <p class="mt-5 mb-3 text-muted"> Climate Crowdfunding</p>
          <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
        </form>
       
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
