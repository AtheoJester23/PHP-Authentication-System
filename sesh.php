<?php
    session_start();

    
    if(!isset($_SESSION["username"])){
        $_SESSION["username"] = "Max Caulfield";
    }

    function unsetSesh(){
        session_unset();
    }

    if(isset($_POST["rmvSeshBtn"])){
        unsetSesh();
    }

    function destroySesh(){
        session_destroy();
    }

    if(isset($_POST["dstrySeshBtn"])){
        destroySesh();
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
    <a href="index.php">Go Home...</a>

    <h2>
        <?php 
            echo $_SESSION["username"] ?? "None";    
        ?>
    </h2>

    <hr>

    <form method="POST">
        <button name="rmvSeshBtn">Unset Sesh</button>
        <small>(Immediately remove all the session)</small>
    </form>

    <br>

    <form method="POST">
        <button name="dstrySeshBtn">Destroy Sesh</button>
        <small>(Immediately remove all the session)</small>
    </form>
</body>
</html>