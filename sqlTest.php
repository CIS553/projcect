× close edit hex	TEXT viewer: /waffleoctopus.com/cis553/sqlTest.php

<!DOCTYPE HTML>
<html> 
    <body>

<?php

    include('dbConnect.php');
        
        //this tells if the screen is new, or being posted to by itself.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["sqlSelectText"])) {
            $sql= $_POST["sqlSelectText"];
                        //echo is used to display text on screen
            echo "Executing: <b>". $sql. "<br><br>" ;
                        
                        //
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "SELECT Results:<br>";
                while($row = $result->fetch_assoc()) {
                    echo $row["TEXT"]."<br>";
                }
            } else {
                echo "0 results";
            }
        }
    }

    if (!empty($_POST["sqlInsertText"])) {
        $sql= $_POST["sqlInsertText"];
        echo "Executing: <b>". $sql. "<br><br>" ;
        if ($conn->query($sql) === TRUE) {
            echo "SQL Executed";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        echo "<br><br>Connection Closed.";
    }
    

?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            SQL SELECT to run: <input size = 100 type="text" name="sqlSelectText" />
            <br><br>
            SQL INSERT to run: <input size = 100 type="text" name="sqlInsertText" />
            <br><br>
            <input type="submit" name="submit" value="Submit"> 
        </form>
    </body>
</html>
