<?php
    if(!isset($_SESSION)) { 
        session_start(); 
    }
    if(isset($_GET['createPost'])){
        // Get variables
        $CID = $_GET['CID'];
        $title = $_GET['title'];
        $content = $_GET['content'];
        $userID = $_SESSION['userID'];
        // Connect DB
        include_once('./connect_database.php');
        $name_of_table = "CommunityPosts";
        if (tableExists($db, $name_of_table)) {

            // Prepare a SQL query and bind all 6 variables. 
            $sqlQuery = "INSERT INTO $name_of_table (CID, userID, title, content) VALUES (:CID, :userID , :title , :content)";
            $statement1 = $db->prepare($sqlQuery);
            $statement1->bindValue(':CID', $CID, PDO::PARAM_STR);
            $statement1->bindValue(':title', $title, PDO::PARAM_STR);
            $statement1->bindValue(':content', $content, PDO::PARAM_STR);
            $statement1->bindValue(':userID', $userID, PDO::PARAM_STR);
            
            // Execute the SQL query using $statement1->execute(); and assign the value
            // that is returned  to $result.
            $result = $statement1->execute();
        
            if(!$result) {
                // Query fails.
               // $body = "Inserting entry for {$name_of_table} failed.".$db->errorInfo() ;
            } else {
                // Query is successful.
                //$body = "{$communityName} has been successfully created.";
                header("Location: ./view-community.php?CID={$CID}");
            }
            
            // Closing query connection
                $statement1->closeCursor();	
            
        } else {
        // Table does not exist in db.
            $body = "Table $name_of_table does not exist in database";
        }
    }
    else{
        header('Location:./community.php');
    }
?>