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
    if (isset($_POST['field1'])){

    //Capture data from post
    $field1 = quoteHandler('field1');
    $value1 = quoteHandler('value1');
    $field2 = quoteHandler('field2');
    $value2 = quoteHandler('value2');
    $field3 = quoteHandler('field3');
    $value3 = quoteHandler('value3');
    $field4 = quoteHandler('field4');
    $value4 = quoteHandler('value4'); 
    $field5 = quoteHandler('field5');
    $value5 = quoteHandler('value5');
        

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

$sql_profile ="CALL search(".$field1.",".$value1.",".$field2.",".$value2.",".$field3.",".$value3.",".$field4.",".$value4.",".$field5.",".$value5.")";

        $select_profile = $conn->query($sql_profile);


?>
	<!-- Header Banner-->
	<?php
		include('./header.php');
	?>
	<!-- End Header Banner-->	

<body>
<br>
    
<h1>Employees matching search criteria</h1>
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
