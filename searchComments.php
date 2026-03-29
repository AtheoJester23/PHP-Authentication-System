<?php 
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $username = $_POST["username"];
        
        if(empty($username)) exit();

        try{
            require_once "includes/dbh.inc.php";    

            $query = "SELECT * FROM comments WHERE username = :username";
    
            $stmt = $pdo->prepare($query);

            $stmt->bindParam("username", $username);

            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $pdo = null;
            $stmt = null;
        }catch(PDOException $e){
            error_log("Query Failed: " . $e->getMessage());
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Search Results: </h3>
    
    <?php 
        if(empty($results)){
            echo "<p>No comment/s here...</p>";
        }else{
            foreach($results as $row){
                echo "<div>";
                echo "<h4>" . htmlspecialchars($row["username"]) . "</h4>";
                echo "<p>" . htmlspecialchars($row["comment_text"]) . "</p>";
                echo "<p>" . htmlspecialchars($row["created_at"]) . "</p>";
                echo "</div>";

                echo "<hr>";
            }
        }
    ?>
    
</body>
</html>