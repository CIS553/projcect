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

<body>
<br>
    
<h1>Employee ID <font color='red'>
    <?php echo $_GET["id"]; ?>
    </font> added!</h1>
    
<!--use instructions-->
<br>
<h4>Select an option above to continue</h4>
<ul>
    <li><b>Add Employee</b> : Enter information for a new employee record</li>
    <li><b>Skillset Lookup</b> : Locate employees with specific skills</li>
    <li><b>Search</b> : Search employee information</li>
</ul>
<br>
To update an existing employee, first search for the employee, then select the employee record and update
<!--end use instructions-->
    
</body>
</html>
