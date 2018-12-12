<?php
include_once('./connect_database.php');
$name_of_table = "Community";

$communityName = $_GET["communityName"];
$communityDesciption = $_GET["communityDesciption"];

// Check if the table exists in the db.
if (tableExists($db, $name_of_table)) {

	// Prepare a SQL query and bind all 6 variables. 
	$sqlQuery = "INSERT INTO $name_of_table (communityName, communityDesciption) VALUES (:communityName, :communityDesciption)";
	$statement1 = $db->prepare($sqlQuery);
	$statement1->bindValue(':communityName', $communityName, PDO::PARAM_STR);
	$statement1->bindValue(':communityDesciption', $communityDesciption, PDO::PARAM_STR);
	
	// Execute the SQL query using $statement1->execute(); and assign the value
	// that is returned  to $result.
	$result = $statement1->execute();

	if(!$result) {
		// Query fails.
		$body = "Inserting entry for $communityName failed.".$db->errorInfo() ;
	} else {
		// Query is successful.
		$body = "{$communityName} has been successfully created. Go <a href='./community.php'>here</a> and find your community!";
	}
	
	// Closing query connection
		$statement1->closeCursor();	
	
} else {
// Table does not exist in db.
	$body = "Table $name_of_table does not exist in database";
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
		<title>Climate Crowdfunding</title>
	</head>
	<body>
	<!-- Navbar Start --><?php require_once'navbar.php'; ?><!-- Navbar End -->
            
        <!-- Main Content Start -->
        <main role="main">
            <!-- Container Start -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt-5 text-center">
                        <h2>Add Community Process</h2>
                    </div><!-- /.col -->
                    <div class="col-md-12">
                        <p>
                        <?php echo $body; ?>
                        </p>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /. container -->
        </main>
        <!-- Main Content End -->
        
        <!-- Footer Start --><?php require_once'footer.php'; ?><!-- Footer End -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>