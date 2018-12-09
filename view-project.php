<?php
include_once('./connect_database.php');
$name_of_table = "projects";
$body = "";
$projectID = $_GET['projectID'];
// Check if the table exists in the db.
if (tableExists($db, $name_of_table)) { 
	// Prepare a SQL query
	$sqlQuery ="select * from $name_of_table WHERE projectID = {$projectID}";
	$statement1= $db->prepare($sqlQuery);

	// Execute the SQL query using $statement1->execute(); and assign the value
	// that is returned  to $result.
	$result = $statement1->execute();
	if (!$result) {
		// Query fails.
		$body = "Retrieving records failed." .$db->errorInfo();
    } 
    else {
		// Query is successful.
		// Convert sqlQuery result to an array and store it in $numberOfRows using $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
		$numberOfRows = $statement1->fetchAll(PDO::FETCH_ASSOC);
		if($numberOfRows) {
			foreach($numberOfRows as $resultRow) {
                $body .= "<div class='col-md-12 pt-5 text-center'>";
                $body .= "  <h2>Project : {$resultRow['projectName']}</h2>";
                $body .= "</div><!-- /.col -->";
                $body .= "<div class='col-md-12'>";
                $body .= "  <p>Project Description : {$resultRow['projectDescription']}</p>";
                $startDate = substr($resultRow['projectStartDate'],0,10);
                $body .= "  <p>Project Start Date : {$startDate}</p>";
                $body .= "  <p>Project Target Amount : \${$resultRow['targetAmount']}</p>";
                $body .= "  <img src='{$resultRow['projectImage']}' class='img-fluid' alt='project image'";
                $body .= "</div><!-- /.col -->";
            }
        } 
        else{
			// Invalid table name and nothing is returned from the SQL query
			$body = "No such project exist";
		}
	}
	// Closing query connection
	$statement1->closeCursor();	
} 
else {
	// Table does not exist in db.
	$body = "No such project exist";
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
                    <?php echo $body; ?>
                </div><!-- /.row -->
                <hr class="featurette-divider">
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