<html>

<title>Employee Information</title>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<!-- Header Banner-->
	<?php
		include('./header.php');
	?>
	<!-- End Header Banner-->	

    <?php

    include('dbConnect.php'); //SQL connection parameters

        //Get list of skills
        $sql_skill = "SELECT DISTINCT sk_skill FROM skills";    
        $select_skill = $conn->query($sql_skill);
    ?>

<h4>Select a skill to view employees</h4>
    <br>
    <form action="skilllist.php" method="post">
        <div class="dataentry">
                <select name="skill">  
                    <?php
                        while($row = $select_skill->fetch_assoc()) {
                            $skskill = $row["sk_skill"];
            
                    ?>
                    <option value="<?php echo $skskill; ?>"><?php echo $skskill; ?></option>
                <?php } ?>
                </select>
 
    
    
<br><br><br>
</div>
<input class="submitbutton" type="submit" value="Search Employees">
</form>

</body>
</html>
