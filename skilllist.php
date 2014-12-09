<!DOCTYPE HTML>

<html>

<title>Employee Information</title>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php

//Add quotes to non-null fields for sql procedure
function quoteHandler($postField) {
    ($_POST[$postField]=="" ? $myString='null' : $myString="'".$_POST[$postField]."'");
    return $myString;
}
    //Handle form data when submitted
    if (isset($_POST['skill'])){

    //Capture data from post
    $value1 = quoteHandler('skill');

    }
    
    
    //Connect and call stored procedure
    include('dbConnect.php'); //SQL connection parameters
    
        //Test sql connection 
        if($conn == true)
        {
        } else {
            die(print_r(sqlsrv_errors(), true)); 
        }
  
        //Setup sql procedure call

$sql_profile ="SELECT emp_name, id FROM employee
INNER JOIN skills
ON id = sk_id
WHERE sk_skill = $value1";

        $select_profile = $conn->query($sql_profile);


?>
	<!-- Header Banner-->
	<?php
		include('./header.php');
	?>
	<!-- End Header Banner-->	

<body>
<br>
    
<h1>Employees with selected skill</h1>
 <div class="dataentry">

    <?php
            //Build results table
            if ($select_profile->num_rows > 0) {
                
                echo '<table class="emplist">
                        <tr>
                            <td>Name</td>
                            <td>Employee ID</td>
                        </tr>';
                
                //One row per selected employee
                while($row = $select_profile->fetch_assoc()) {
                    $empname = $row["emp_name"];
                    $empid = $row["id"];
            
                ?>
                    <tr>
                        <td>
                            <a href="./empdetail.php?id=<?php echo $empid; ?>">
                                <div style="height:100%;width:100%">
                                    <?php echo $empname; ?>
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="./empdetail.php?id=<?php echo $empid; ?>">
                                <div style="height:100%;width:100%">
                                    <?php echo $empid; ?>
                                </div>
                            </a>
                        </td>
                    </tr> 
    
                <?php
                
                } //End while (one row per selected employee)

                //End table html
                echo '</table>
                      </div>
                        <!--use instructions-->
                        <br>
                        <h4>Select an employee to view detailed information</h4>
                        <!--end use instructions-->                  
                    ';
            
            //If no records matched the search criteria, display instead of table
            } else { 
               echo "No Employees Found<br><br></div>
               <h4>Select an option above to continue</h4>";
            } ?>
  
 </body> 
</html>
