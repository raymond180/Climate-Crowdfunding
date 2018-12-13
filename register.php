<?php 
include_once("./connect_database.php");

if(isset($_SESSION['email'])){
  header('Location: ./index.php');
}

if (isset($_POST['submit'])) {
  // Retrieves the information entered in the form
  $userName = $_POST['userName'];
  $userEmail = $_POST['userEmail'];
  $userPassword = $_POST['userPassword'];

  $name_of_table = "users";
  if (tableExists($db, $name_of_table)){
    // Prepare a SQL query
    $sqlQuery ="INSERT INTO $name_of_table (name, email, password) VALUES (:name, :email, :password)";

    $statement1 = $db->prepare($sqlQuery);
    $statement1->bindValue(':name', $userName, PDO::PARAM_STR);
    $statement1->bindValue(':email', $userEmail, PDO::PARAM_STR);
    $statement1->bindValue(':password', $userPassword, PDO::PARAM_STR);

    // Execute the SQL query using $statement1->execute(); and assign the value
    // that is returned  to $result.
    $result = $statement1->execute();
    if(!$result) {
      // Query fails.
      // $body = "Inserting entry for {$name_of_table} failed.".$db->errorInfo() ;
    }
    else {
      // Query is successful.
      // $body = "{$communityName} has been successfully created.";
      header("Location: ./index.php");
    }
  // Closing query connection
  $statement1->closeCursor();
  }
  else {
    // Table does not exist in db.
    $body = "No such table exist in DB";
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

  <body class="text-center">
        <form action="register.php" method="POST" class="form-signin">
          <a class="navbar-brand mb-0 h1" href="./index.php">
            <img src="./images/logo.jpg" width="30" height="30" class="d-inline-block align-bottom" alt="logo">
            Climate Crowdfunding
          </a>
          <img class="img-fluid" src="./images/logo.jpg">
          <h1 class="h3 mb-3 font-weight-normal">Create account</h1>
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" name="userEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="userPassword" id="inputPassword" class="form-control" placeholder="Create Password" required>
          
          <!-- First name --->
          <label for="userName" class="sr-only">User Name</label>
          <input type="text" name="userName" id="inputFirstName" class="form-control" placeholder="Name" required>

          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
            <br>
            <a href="./sign-in.php">Already registered?</a>
            <br>
          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="add Record">Register</button>
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
