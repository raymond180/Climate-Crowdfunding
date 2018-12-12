<?php
include_once('./connect_database.php');
$name_of_table1 = "Community";
$body = "";
$CID = $_GET['CID'];
// Check if the table exists in the db.
if (tableExists($db, $name_of_table1)) { 
	// Prepare a SQL query
	$sqlQuery1 ="SELECT * FROM $name_of_table1 WHERE CID = '{$CID}'";
	$statement1= $db->prepare($sqlQuery1);

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
		$resultRow = $statement1->fetch(PDO::FETCH_ASSOC);
		if($resultRow) {
            // display community info
            $body .= "<div class='col-md-12 pt-5 text-center'>";
            $body .= "  <h2>{$resultRow['communityName']}</h2>";
            $body .= "  <p>{$resultRow['communityDesciption']}</p>";
            $body .= "</div><!-- /.col -->";
            // display add post button
            $body .= "<div class='col-md-12 pt-1'>";
            $body .= "  <form action='add-post.php' method='GET'>";
            $body .= "      <button class='btn btn-primary float-right' type='submit' name='submit' value='{$CID}'>Add Post</button>";
            $body .= "  </form>";
            $body .= "</div><!-- /.col -->";
            // query post that are posted in the community
            $name_of_table2 = "CommunityPosts";
            if (tableExists($db, $name_of_table2)) { 
                $sqlQuery = "SELECT * FROM $name_of_table2 WHERE CID = '{$CID}'";
                $statement2= $db->prepare($sqlQuery);
                $posts = $statement2->execute();
                if (!$posts){
                    $body .= "No post exists yet." .$db->errorInfo();
                }
                else{
                    $postRows = $statement2->fetchAll(PDO::FETCH_ASSOC);
                    // if got at lease one post
                    if($postRows){
                        $body .= "<div class='col-md-12 pt-2'>";
                        $body .= "<table class='table table-striped'>";
                        $body .= "<thead>";
                        $body .= "    <tr>";
                        $body .= "        <th scope='col'>#</th>";
                        $body .= "        <th scope='col'>Title</th>";
                        $body .= "        <th scope='col'>content</th>";
                        $body .= "    </tr>";
                        $body .= "</thead>";
                        $body .= "<tbody>";
                        foreach($postRows as $post){
                            $body .= "    <tr>";
                            $body .= "        <th scope='row'>{$post['postID']}</th>";
                            $body .= "        <td>{$post['title']}</td>";
                            $body .= "        <td>{$post['content']}</td>";
                            $body .= "    </tr>";
                        }
                        $body .= "</tbody>";
                        $body .= "</table>";
                        $body .= "</div><!-- /.col -->";
                    }
                    // if no post exists
                    else{
                        $body .= "<div class='col-md-12 pt-5 text-center'>";
                        $body .= "<p>No post exists in this community yet</p>";
                        $body .= "</div><!-- /.col -->";
                    }
                }
            }
            else {
                // Table does not exist in db.
                $body .= "<p>No post exist</p>";
            }
        } 
        else{
			// Invalid table name and nothing is returned from the SQL query
			$body = "<p>No such community exist</p>";
		}
	}
	// Closing query connection
	$statement1->closeCursor();	
} 
else {
	// Table does not exist in db.
	$body = "<p>No such community exist</p>";
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